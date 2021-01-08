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

    <script src="http://10.2.15.48/mapkhoangsan/data/HanhChinhHuyen_1.js"></script>
    <script src="http://10.2.15.48/mapkhoangsan/data/HanhChinhTinh_0.js"></script>

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
        const dangmuaWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/nuocmua/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'nuocmua:dang_mua_3857',
                title: "Đường đẳng mưa",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const dosauWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/diachat/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'diachat:nendosau_3857',
                title: "Nền độ sâu",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const tramdomuaWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/quantrac/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'quantrac:tramdomua',
                title: "Trạm đo mưa",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const songmotnetWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:SongSuoi_Duong_3857',
                title: "Sông một nét",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const songvungWMSSource = new ol.source.TileWMS({
            url: 'http://123.16.176.41:8088/geoserver/hanhchinh/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                tiled: true,
                STYLES: '',
                LAYERS: 'hanhchinh:SongSuoi_Vung_3857',
                title: "Sông lớn",
                tilesOrigin: 185100.3262864739 + "," + 939575.001675438
            }
        });
        const basedLayers = new ol.layer.Group({
            title: 'Bản đồ nền',
            openInLayerSwitcher: true,
            layers:
                [
                    new ol.layer.Tile({
                        title: "Google Terrain",
                        baseLayer: true,
                        source: new ol.source.TileImage({url: 'http://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}'})
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
                ]
        });
        const diahinhLayers = new ol.layer.Group({
            title: 'Tài nguyên nước mưa',
            openInLayerSwitcher: true,
            layers: [
                new ol.layer.Tile({
                    title: "Đường đẳng mưa",
                    source: dangmuaWMSSource
                }),
                new ol.layer.Tile({
                    title: "Nền độ sâu",
                    source: dosauWMSSource
                }),
                new ol.layer.Tile({
                    title: "Sông suối nhỏ",
                    source: songmotnetWMSSource
                }),
                new ol.layer.Tile({
                    title: "Sông lớn",
                    source: songvungWMSSource
                }),
                new ol.layer.Tile({
                    title: "Trạm đo mưa",
                    source: tramdomuaWMSSource
                })

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
            layers: [basedLayers, hanhchinhLayers, diahinhLayers],
            target: 'map',
            view: view
        });
        map.addControl(switcher);

        map.on('singleclick', function (evt) {
            const layList = [diaphanxaWMSSource, diaphanhuyenWMSSource, diaphantinhWMSSource, tramdomuaWMSSource, dangmuaWMSSource, songmotnetWMSSource, songvungWMSSource];
            getFeatureMultiLayers(layList, evt);
        });
    </script>
@endsection
