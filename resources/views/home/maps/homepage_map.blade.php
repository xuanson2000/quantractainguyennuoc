
<div id="homepage-map" class="h-700"></div>

<script type="text/javascript">
    var format = 'image/png';

    const wellWMSSource = new ol.source.TileWMS({
        url: 'http://123.16.176.41:8088/geoserver/quantrac/wms',
        params: {
            'FORMAT': format,
            'VERSION': '1.1.1',
            tiled: true,
            STYLES: '',
            LAYERS: 'quantrac:monitoring_well',
            tilesOrigin: 185100.3262864739 + "," + 939575.001675438
        }
    });

    const swStationWMSSource = new ol.source.TileWMS({
        url: 'http://123.16.176.41:8088/geoserver/quantrac/wms',
        params: {
            'FORMAT': format,
            'VERSION': '1.1.1',
            tiled: true,
            STYLES: '',
            LAYERS: 'quantrac:surfacewater_station',
            tilesOrigin: 185100.3262864739 + "," + 939575.001675438
        }
    });

    const swForecastingPointsWMSSource = new ol.source.TileWMS({
        url: 'http://123.16.176.41:8088/geoserver/quantrac/wms',
        params: {
            'FORMAT': format,
            'VERSION': '1.1.1',
            tiled: true,
            STYLES: '',
            LAYERS: 'quantrac:sw_forecasting_points',
            tilesOrigin: 185100.3262864739 + "," + 939575.001675438
        }
    });

    const HoangsaTruongsa = new ol.source.TileWMS({
        url: 'http://123.16.176.41:8088/geoserver/trahang/wms',
        params: {
            'FORMAT': format,
            'VERSION': '1.1.1',
            tiled: true,
            STYLES: '',
            LAYERS: 'trahang:TruongSa_HoangSa',
            //tilesOrigin: 185100.3262864739 + "," + 939575.001675438
        }
    });
    
    const layers = [
        new ol.layer.Tile({
            title: "Google Terrain & Roads",
            source: new ol.source.TileImage({url: 'http://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}'})
        }),
        //new ol.layer.Tile({
        //source: new ol.source.OSM()
        //}),
        new ol.layer.Tile({
            source: new ol.source.TileWMS({
                url: 'http://123.16.176.41:8088/geoserver/quantrac/wms',
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
            source: new ol.source.TileWMS({
                url: 'http://123.16.176.41:8088/geoserver/quantrac/wms',
                params: {
                    'FORMAT': format,
                    'VERSION': '1.1.1',
                    tiled: true,
                    STYLES: '',
                    LAYERS: 'quantrac:river_basins',
                    tilesOrigin: 185100.3262864739 + "," + 939575.001675438
                }
            }),
            opacity: 0.36
        }),
        
        new ol.layer.Tile({
            source: wellWMSSource
        }),
        new ol.layer.Tile({
            source: swStationWMSSource
        }),
        new ol.layer.Tile({
            source: swForecastingPointsWMSSource
        }),
        new ol.layer.Tile({
            source: HoangsaTruongsa
        })
    ];

    const view = new ol.View({
        center: ol.proj.transform([105.672091, 16.146730], 'EPSG:4326', new ol.source.OSM().getProjection()),
        zoom: 6
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
        target: 'homepage-map',
        view: view
    });

</script>