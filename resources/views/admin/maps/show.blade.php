@extends('home.layouts.map')
@section('global_js')
    <script type="text/javascript">
        var wellAjaxUri = "{{ route('wells.well.ajax')}}";
        var wellAjaxContentUri = "{{ route('wells.well.ajax_content')}}";
        var wellAjaxWaterLevelUri = "{{ route('wells.well.ajax_wl')}}";
        var wellAjaxWaterTemperatureUri = "{{ route('wells.well.ajax_wt')}}";
        var wellAjaxListUri = "{{ route('wells.well.ajax_well_list')}}";
        var wellAjaxSearchListUri = "{{ route('wells.well.ajax_well_search')}}";
        var wellAjaxLocationUri = "{{ route('wells.well.ajax_well_location')}}";

    </script>
@endsection
@section('content')

    @include('home.maps.sidepanel')
    <div class="dashboard map-container">
        <div id="map" class="map-container"></div>
    </div>

    <div class="modal fade" id="wellInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-clg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('wells.well_data') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="wellInfoModalBody">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('messages.but_label_close') }}</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var format = 'image/png';

        const wellWMSSource = new ol.source.TileWMS({
            url: 'http://localhost:8080/geoserver/quantrac/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'quantrac:monitoring_well',
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });

        const layers = [
            new ol.layer.Tile({
                title: "Google Terrain & Roads",
                source: new ol.source.TileImage({ url: 'http://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}' })
            }),
            //new ol.layer.Tile({
            //source: new ol.source.OSM()
            //}),
            new ol.layer.Tile({
                source: new ol.source.TileWMS({
                    url: 'http://localhost:8080/geoserver/quantrac/wms',
                    params: {
                        'FORMAT': format,
                        'VERSION': '1.1.1',
                        tiled: true,
                        STYLES: '',
                        LAYERS: 'quantrac:monitoring_network',
                        tilesOrigin: 185100.3262864739 + "," + 939575.001675438
                    }
                }),
                opacity: 0.36
            }),
            new ol.layer.Tile({
                source: wellWMSSource
            })
        ];

        const view = new ol.View({
            center: ol.proj.transform([105.672091, 21.046730], 'EPSG:4326', new ol.source.OSM().getProjection()),
            zoom: 8
        });

        const controlSet = ol.control.defaults({
            attributionOptions: {
                collapsible: false
            }
        }).extend([
            new ol.control.OverviewMap()
        ]);

        const map = new ol.Map({
            controls: controlSet,
            layers: layers,
            target: 'map',
            view: view
        });

        map.on('singleclick', function (evt) {
            document.getElementById('wellInfoModalBody').innerHTML = '';
            const viewResolution = (view.getResolution());
            const url = wellWMSSource.getGetFeatureInfoUrl(
                evt.coordinate, viewResolution, 'EPSG:3857',
                {
                    'INFO_FORMAT': 'application/json',
                    'FEATURE_COUNT': 100
                });

            var showResults = this.showGetFeatureInfo;
            if (url) {
                $.ajax({
                    url: url,
                    success: function (data, status, xhr) {
                        var well_code = [];
                        if (data.features.length > 0) {
                            for (i = 0; i < data.features.length; i++) {
                                well_code[i] = data.features[i].properties.well_code;
                            }
                            showGetFeatureInfo(well_code);
                        }
                    },
                    error: function (xhr, status, error) {
                        showResults(error);
                    }
                });
                //document.getElementById('wellInfoModalBody').innerHTML = url;
                //$('#wellInfoModal').modal('show');
            }
        });

        map.on('pointermove', function (evt) {
            if (evt.dragging) {
                return;
            }
            const pixel = map.getEventPixel(evt.originalEvent);
            const hit = map.forEachLayerAtPixel(pixel, function () {
                return true;
            });
            map.getTargetElement().style.cursor = hit ? 'pointer' : '';
        });

        function showGetFeatureInfo(well_code) {

            $.ajax({
                type: 'GET',
                url: wellAjaxUri,
                data: {'well_code': well_code},
                dataType: 'html',
                success: function (result) {
                    document.getElementById("wellInfoModalBody").innerHTML = result;
                    // Otherwise show the content in a popup, or something.
                    $('#wellInfoModal').modal('show');
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });

        };
        function zoomToWell(well_code) {
            $.ajax({
                type: 'GET',
                url: wellAjaxLocationUri,
                data: {'well_code': well_code},
                dataType: 'json',
                success: function (result) {
                    var coord=[result[0].st_x,result[0].st_y];
                    map.setView(new ol.View({
                        center: coord,
                        zoom: 16
                    }));
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        };
    </script>

    <script type="text/javascript">
        $('#wellInfoModal').on('shown.bs.modal', function () {
            $("#wellCodeSelector").off("change"); // unbind first to avoid duplicating the event
            $("#wellCodeSelector").on("change", function () {
                $.ajax({
                    url: wellAjaxContentUri,
                    data: {'well_code': $("#wellCodeSelector").val()},
                    dataType: 'html',
                    success: function (result) {
                        document.getElementById("well-content").innerHTML = result;
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
                $('#water-level-tab').removeClass('active');
                $('#water-temperature-tab').removeClass('active');
                $('#chemistry-tab').removeClass('active');
                $('#well-info-tab').addClass('active');
            });
            $('#wellCodeSelector').trigger('change');
        });
        $('#wellInfoModal').on('shown.bs.tab', function () {
            $('#wellWlYearSelector').trigger('change');
            $('#wellWtYearSelector').trigger('change');
        });
    </script>

    <script type="text/javascript">
        $("#wl-by-year").on("change", function () {
            alert($('input[name=optDataView]:checked').val());
            if ($(this).is(":checked")) {
                $('#wellWlFromYearSelector').attr('disabled', true);
                $('#wellWlToYearSelector').attr('disabled', true);
                $('#drawWlFromToChart').attr('disabled', true);
            }
        });

        $("#wl-from-to-year").change(function () {
            // OR
            if ($(this).is(":checked")) {
                $('#wellWlYearSelector').attr('disabled', true);
            }
        });
    </script>
    <script type="text/javascript">
        function preData(jsonData, para) {
            // empty array for storing the chart data
            var data = [];
            if (para == 'wl') {
                for (var iw in jsonData) {
                    data.push([Date.parse(jsonData[iw].timestamp), parseFloat(jsonData[iw].water_level)]);
                }
                return data;
            }
            if (para == 'wt') {
                for (var iw in jsonData) {
                    data.push([Date.parse(jsonData[iw].timestamp), parseFloat(jsonData[iw].temperature)]);
                }
                return data;
            }

        }

        function changeWlYearData() {
            $.ajax({
                url: wellAjaxWaterLevelUri,
                data: {'from_to': '0', 'well_code': $("#wellCodeSelector").val(), 'data_year': $("#wellWlYearSelector").val()},
                dataType: 'json',
                success: function (result) {
                    var wlseries = preData(result, 'wl');
                    $('#water-level-chart').highcharts({
                        series: [{
                            name: 'Mực nước',
                            data: wlseries
                        }],
                        chart: {
                            type: 'spline',
                            zoomType: 'x'
                        },
                        title: {
                            text: ''
                        },
                        credits: {
                            enabled: false
                        },
                        xAxis: {
                            type: 'datetime',
                            labels: {
                                style: {
                                    fontSize: '12px'
                                }
                            },
                            dateTimeLabelFormats: {
                                second: '%Y-%m-%d<br/>%H:%M:%S',
                                minute: '%Y-%m-%d<br/>%H:%M',
                                hour: '%Y-%m-%d<br/>%H:%M',
                                day: '%Y<br/>%m-%d',
                                week: '%Y<br/>%m-%d',
                                month: '%Y-%m',
                                year: '%Y'
                            }
                        },
                        yAxis: {
                            labels: {
                                formatter: function () {
                                    return Highcharts.numberFormat(this.value, 2);
                                },
                                style: {
                                    fontSize: '12px'
                                }
                            },
                            title: {
                                text: 'Mực nước',
                                style: {
                                    fontWeight: 'bold',
                                    fontSize: '15px'
                                }
                            }
                        },

                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'top',
                            x: 0,
                            y: 48
                        },

                    });
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        };
        function wlFromTo() {
            $.ajax({
                url: wellAjaxWaterLevelUri,
                data: {'from_to': '1', 'well_code': $("#wellCodeSelector").val(), 'data_year_from': $("#wellWlFromYearSelector").val(), 'data_year_to': $("#wellWlToYearSelector").val()},
                dataType: 'json',
                success: function (result) {
                    var wlseries = preData(result, 'wl');
                    $('#water-level-chart').highcharts({
                        series: [{
                            name: 'Mực nước',
                            data: wlseries
                        }],
                        chart: {
                            type: 'spline',
                            zoomType: 'x'
                        },
                        title: {
                            text: ''
                        },
                        credits: {
                            enabled: false
                        },
                        xAxis: {
                            type: 'datetime',
                            labels: {
                                style: {
                                    fontSize: '12px'
                                }
                            },
                            dateTimeLabelFormats: {
                                second: '%Y-%m-%d<br/>%H:%M:%S',
                                minute: '%Y-%m-%d<br/>%H:%M',
                                hour: '%Y-%m-%d<br/>%H:%M',
                                day: '%Y<br/>%m-%d',
                                week: '%Y<br/>%m-%d',
                                month: '%Y-%m',
                                year: '%Y'
                            }
                        },
                        yAxis: {
                            labels: {
                                formatter: function () {
                                    return Highcharts.numberFormat(this.value, 2);
                                },
                                style: {
                                    fontSize: '12px'
                                }
                            },
                            title: {
                                text: 'Mực nước',
                                style: {
                                    fontWeight: 'bold',
                                    fontSize: '15px'
                                }
                            }
                        },

                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'top',
                            x: 0,
                            y: 48
                        },

                    });
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        };
        function changeWtYearData() {
            $.ajax({
                url: wellAjaxWaterTemperatureUri,
                data: {'well_code': $("#wellCodeSelector").val(), 'data_year': $("#wellWtYearSelector").val()},
                dataType: 'json',
                success: function (result) {
                    var wtseries = preData(result, 'wt');
                    $('#water-temperature-chart').highcharts({
                        series: [{
                            name: 'Nhiệt độ nước',
                            data: wtseries
                        }],
                        chart: {
                            type: 'spline',
                            zoomType: 'x'
                        },
                        title: {
                            text: ''
                        },
                        credits: {
                            enabled: false
                        },
                        xAxis: {
                            type: 'datetime',
                            labels: {
                                style: {
                                    fontSize: '12px'
                                }
                            },
                            dateTimeLabelFormats: {
                                second: '%Y-%m-%d<br/>%H:%M:%S',
                                minute: '%Y-%m-%d<br/>%H:%M',
                                hour: '%Y-%m-%d<br/>%H:%M',
                                day: '%Y<br/>%m-%d',
                                week: '%Y<br/>%m-%d',
                                month: '%Y-%m',
                                year: '%Y'
                            }
                        },
                        yAxis: {
                            labels: {
                                formatter: function () {
                                    return Highcharts.numberFormat(this.value, 2);
                                },
                                style: {
                                    fontSize: '12px'
                                }
                            },
                            title: {
                                text: 'Nhiệt độ',
                                style: {
                                    fontWeight: 'bold',
                                    fontSize: '15px'
                                }
                            }
                        },

                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'top',
                            x: 0,
                            y: 48
                        },

                    });
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }

    </script>
@endsection
