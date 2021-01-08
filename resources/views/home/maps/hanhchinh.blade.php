@extends('home.layouts.map')
@section('global_js')
    <script type="text/javascript">
        var wellAjaxUri = "{{ route('wells.well.ajax')}}";
        var wellAjaxContentUri = "{{ route('wells.well.ajax_content')}}";
    </script>
@endsection
@section('content')

    <div class="easyui-layout map-container">
        <div class="easyui-panel" id="feature-info"
             data-options="region:'east',split:true,hideCollapsedContent:false" title="Thông tin/Dữ liệu"
             style="width:500px;">
        </div>
        <div class="easyui-panel" id="layer-switcher" data-options="region:'west',split:true,hideCollapsedContent:false"
             title="Lớp bản đồ" style="width:250px;">
        </div>
        <div class="easyui-panel map-container" data-options="region:'center'">
            <div class="easyui-layout" data-options="fit:true">
                <div id="map-panel" data-options="region:'center'">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $("document").ready(function () {
            map.updateSize();
        });
        $(function () {
            $('#map-panel').panel({
                onResize: function (w, h) {
                    setTimeout(function () {
                        map.updateSize();
                    }, 200);
                }
            });
        });
    </script>
    <script type="text/javascript">
        var format = 'image/png';
        const diaphantinhWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:vn_adm1_3857',
                title: "Địa phận tỉnh",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });

        const diaphanhuyenWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:vn_adm2_3857',
                title: "Địa phận huyện",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });

        const diaphanxaWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:vn_adm3_3857',
                title: "Địa phận xã",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });

        const ubndxaWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:ubndxa_3857',
                title: "Uỷ ban ND xã",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const ubndhuyenWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:ubndhuyen_3857',
                title: "Uỷ ban nhân dân huyện",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const ubndtinhWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:ubndtinh_3857',
                title: "Uỷ ban nhân dân tỉnh",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const duongsatWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:DoanDuongSat_3857',
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const quocloWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:QuocLo_3857',
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const benhvienWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:BenhVien_3857',
                title: "Bệnh viện",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const truonghocWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:TruongHoc_3857',
                title: "Trường học",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const basedLayers = new ol.layer.Group({
            title: 'Bản đồ nền',
            openInLayerSwitcher: true,
            layers:
                [
                    // new ol.layer.Tile({
                    //     title: "Google Terrain",
                    //     baseLayer: true,
                    //     source: new ol.source.TileImage({url: 'http://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}'})
                    // }),
                    new ol.layer.Tile({
                        title: "Open Street Map",
                        baseLayer: true,
                        source: new ol.source.OSM()
                    })

                ]
        });
        const hanhchinhLayers = new ol.layer.Group({
            title: 'Hành chính',
            openInLayerSwitcher: true,
            layers:
                [
                    new ol.layer.Tile({
                        title: "Địa phận tỉnh",
                        source: diaphantinhWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Địa phận huyện",
                        source: diaphanhuyenWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Địa phận xã",
                        source: diaphanxaWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Đường sắt",
                        source: duongsatWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Quốc lộ",
                        source: quocloWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Trường học",
                        source: truonghocWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Bệnh viện",
                        source: benhvienWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Uỷ ban nhân dân xã",
                        source: ubndxaWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Uỷ ban nhân dân huyện",
                        source: ubndhuyenWMSSource
                    }),
                    new ol.layer.Tile({
                        title: "Uỷ ban nhân dân tỉnh",
                        source: ubndtinhWMSSource
                    }),
                ]
        });

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
        var switcher = new ol.control.LayerSwitcher(
            {
                target: $("#layer-switcher").get(0),
                // displayInLayerSwitcher: function (l) { return false; },
                show_progress: true
            });
        const map = new ol.Map({
            controls: controlSet,
            layers: [basedLayers, hanhchinhLayers],
            target: 'map',
            view: view
        });
        map.addControl(switcher);


        map.on('singleclick', function (evt) {
            const layList = [diaphanxaWMSSource, diaphanhuyenWMSSource, diaphantinhWMSSource, ubndxaWMSSource, truonghocWMSSource, benhvienWMSSource];
            getFeatureMultiLayers(layList, evt);
        });
    </script>
@endsection
