
<div id="nav-map" class="h-300"></div>
<script type="text/javascript">
    var format = 'image/png';

    const nav_layers = [
        new ol.layer.Tile({
            title: "Google Terrain & Roads",
            source: new ol.source.TileImage({url: 'http://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}'})
        })
    ];

    const nav_view = new ol.View({
        center: ol.proj.transform([105.672091, 21.046730], 'EPSG:4326', new ol.source.OSM().getProjection()),
        zoom: 8
    });

    const nav_controlSet = ol.control.defaults({
        attributionOptions: {
            collapsible: false
        }
    }).extend([
        new ol.control.OverviewMap()
    ]);

    const nav_map = new ol.Map({
        controls: nav_controlSet,
        layers: nav_layers,
        target: 'nav-map',
        view: nav_view
    });

</script>