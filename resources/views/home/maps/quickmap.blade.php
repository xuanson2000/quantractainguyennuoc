@section('global_js')
    <script type="text/javascript" src="{{ asset('components/leaflet/leaflet.js') }}"></script>
@endsection
@section('css')
    <link href="{{ asset('components/leaflet/leaflet.css') }}" rel="stylesheet" type="text/css" />
@endsection
    <div class="">
        <div id="quick-map" style="height: 300px;" class=""></div>
    </div>
    <script>
        var map=L.map('quick-map');
        var mbAttr = 'Bản đồ nền &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> ' +
            'Mạng quan trắc TNN © <a href="http://www.nawapi.gov.vn/">NAWAPI</a>';
        var osmLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(osmLayer);
        var Mornitoring_network = L.tileLayer.wms('http://123.16.176.41:8088/geoserver/quantrac/wms', {
            layers: 'quantrac:monitoring_network',
            attribution: mbAttr,
            transparent: true,
            opacity:0.36,
            format: 'image/png'
        }).addTo(map);
        function toLatLng(x, y, map) {
            var projected = L.point(y, x).divideBy(6378137);
            return map.options.crs.projection.unproject(projected);
        }
        map.zoomControl.setPosition('bottomright');
        var point = new L.Point({{$point->gx}},{{$point->gy}});
        var latlng = L.Projection.SphericalMercator.unproject(point);
        map.setView({lat:latlng.lat,lng:latlng.lng}, 16);
    </script>
@yield('add_map_layer')
