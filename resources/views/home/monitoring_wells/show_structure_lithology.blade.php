@extends('home.monitoring_wells.show')
@section('show_content')
    <ul class="nav nav-tabs nav-top-border" role="tablist">
        <li class="nav-item">
            <a id="well-structure-tab" class="nav-link active show" data-toggle="tab" href="#well-structure"
               role="tab" aria-selected="true">
                <i class="fa fa-sort-amount-asc"></i> {{ trans('wells.well_structure') }}
            </a>
        </li>
        <li class="nav-item">
            <a id="well-lithology-tab" class="nav-link" data-toggle="tab" href="#well-lithology"
               role="tab" aria-selected="false">
                <i class="fa fa-sort-amount-asc"></i> {{ trans('wells.well_lithology') }}
            </a>
        </li>
    </ul>
    <div class="tab-content" id="well-structure-lithology">
        <div class="tab-pane active p-3" id="well-structure" role="tabpanel" data-ride="carousel">
            <div class="table-responsive mb-30">
                <table class="table table-hover table-vertical-middle">
                    <thead>
                        <tr>
                            <th class="fw-30">Stt</th>
                            <th>Từ</th>
                            <th>Đến</th>
                            <th>Loại ống</th>
                            <th>Đường kính</th>
                            <th>Mô tả ống</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($well_structure) > 0)
                        @php ($stt = 1)
                        @foreach($well_structure as $well_structure_item)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$well_structure_item->ctfrom}}</td>
                                <td>{{$well_structure_item->ctto}}</td>
                                <td>{{$well_structure_item->tube_type}}</td>
                                <td>{{$well_structure_item->diametre}}</td>
                                <td>{{$well_structure_item->description}}</td>
                            </tr>
                            @php ($stt++)
                        @endforeach
                    @else
                        <tr>
                            <td>Không có dữ liệu cấu trúc công trình</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane p-3" id="well-lithology" role="tabpanel">
            <div class="table-responsive mb-30">
                <table class="table table-hover table-vertical-middle">
                    <thead>
                    <tr>
                        <th class="fw-30">Stt</th>
                        <th>Từ</th>
                        <th>Đến</th>
                        <th>Tuổi địa chất</th>
                        <th>Ký hiệu địa tầng</th>
                        <th>Mô tả</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($well_lithology) > 0)
                        @php ($stt = 1)
                        @foreach($well_lithology as $well_lithology_item)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$well_lithology_item->dtfrom}}</td>
                                <td>{{$well_lithology_item->dtto}}</td>
                                <td>{{$well_lithology_item->geoage}}</td>
                                <td>{{$well_lithology_item->magma_code}}</td>
                                <td>{{$well_lithology_item->description}}</td>
                            </tr>
                            @php ($stt++)
                        @endforeach
                    @else
                        <tr>
                            <td>Không có dữ liệu địa tầng</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection