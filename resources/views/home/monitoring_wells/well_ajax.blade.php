<div class="col-xl-12">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item align-left">
            <div class="form-group row">
                <label class="col-sm-6 col-form-label">Công trình:</label>
                <div class="col-sm-6">
                    <select class="form-control" style="width: auto;" id="wellCodeSelector">
                        @foreach($well_codes as $well_code)
                            <option>{{$well_code}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </li>
        <li class="nav-item ml-auto">
            <a id="well-info-tab" class="nav-link active show" data-toggle="tab" href="#well-info" role="tab" aria-selected="true">
                <i class="fa fa-info-circle"></i> Thông tin chung
            </a>
        </li>
        <li class="nav-item">
            <a id="water-level-tab" class="nav-link" data-toggle="tab" href="#water-level" role="tab" aria-selected="false">
                <i class="fa fa-line-chart"></i> Mực nước
            </a>
        </li>
        <li class="nav-item">
            <a id="water-temperature-tab" class="nav-link" data-toggle="tab" href="#water-temperature"
               role="tab" aria-selected="false"><i class="fa fa-thermometer-2"></i> Nhiệt độ nước</a>
        </li>
    </ul>
    <div class="tab-content" id="well-content">

    </div>


</div>
