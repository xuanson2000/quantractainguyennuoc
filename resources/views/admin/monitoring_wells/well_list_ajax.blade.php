<div class="list-group">
    <div class="card m-b-30">
        <div class="card-body">
            <input type="text" id="input-well-name" class="form-control typeahead" data-provide="typeahead"
                   placeholder="Nhập tên Công trình">
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
                            <td>{{ $well->id_monitoring_network }}</td>
                            <td>{{ $well->water_layer }}</td>
                            {{--<td>--}}
                            {{--<div class="btn-group btn-group-xs btn-sm pull-right" role="group">--}}
                            {{--<a href="{{ route('wells.well.show', $well->id ) }}"--}}
                            {{--class="btn btn-outline-info"--}}
                            {{--title="{{ trans('wells.detail') }}">--}}
                            {{--<i class="fa fa-eye"--}}
                            {{--aria-hidden="true"></i>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            {{--</td>--}}
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