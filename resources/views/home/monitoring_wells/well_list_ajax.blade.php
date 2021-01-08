<div class="list-group">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-default">
                    <tr>
                        <th>{{ trans('wells.well_name') }}</th>
                        <th>{{ trans('wells.province') }}</th>
                        <th>{{ trans('wells.district') }}</th>
                        <th>{{ trans('wells.commune') }}</th>
                        <th>{{ trans('wells.monitoring_region') }}</th>
                        <th>{{ trans('wells.water_layer') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listWells as $well)
                        <tr>
                            <td><a href="#" value="{{$well->well_code}}"
                                   onclick="showGetFeatureInfo('{{$well->well_code}}')">{{ $well->well_code }}</a></td>
                            <td>{{ $well->province }}</td>
                            <td>{{ $well->district }}</td>
                            <td>{{ $well->commune }}</td>
                            <td>{{ $well->regionName->network_name}}</td>
                            <td>{{ $well->water_layer }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="card-footer">--}}
        {{--{!! $listWells->render() !!}--}}
        {{--</div>--}}
    </div>
</div>
