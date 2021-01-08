@extends('home.layouts.map')
@section('global_js')
    <script type="text/javascript">
        var wellAjaxUri = "{{ route('wells.well.ajax')}}";
    </script>
@endsection
@section('content')
    <div class="map-container">
        <div id="map" class="map-container"></div>
    </div>

    <div class="modal fade" id="wellInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var map=L.map('map');
        var mbAttr = 'Bản đồ nền &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> ' +
            'Mạng quan trắc TNN © <a href="http://www.nawapi.gov.vn/">NAWAPI</a>';
        //var osmLayer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        //map.addLayer(osmLayer);
        var Mornitoring_network = L.tileLayer.wms('http://123.16.176.41:8088/geoserver/quantrac/wms', {
            layers: 'quantrac:monitoring_network',
            attribution: mbAttr,
            transparent: true,
            opacity:0.36,
            format: 'image/png'
        }).addTo(map);

        var Mornitoring_well = L.tileLayer.wellInfo('http://123.16.176.41:8088/geoserver/quantrac/wms', {
            layers: 'quantrac:monitoring_well',
            attribution: mbAttr,
            transparent: true,
            format: 'image/png'
        }).addTo(map);
        map.zoomControl.setPosition('bottomright');
        map.setView({lat:21.046730,lng:105.672091}, 12);
    </script>
@endsection
