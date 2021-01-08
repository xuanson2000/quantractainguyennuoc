
<div class="form-group row {{ $errors->has('gid') ? 'has-error' : '' }}">
    <label for="gid" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.gid') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="gid" type="text" id="gid" value="{{ old('gid', optional($surfacewaterStation)->gid) }}" placeholder="{{ trans('surfacewater_stations.gid__placeholder') }}">
        {!! $errors->first('gid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('matram') ? 'has-error' : '' }}">
    <label for="matram" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.matram') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="matram" type="text" id="matram" value="{{ old('matram', optional($surfacewaterStation)->matram) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.matram__placeholder') }}">
        {!! $errors->first('matram', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tentram') ? 'has-error' : '' }}">
    <label for="tentram" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.tentram') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tentram" type="text" id="tentram" value="{{ old('tentram', optional($surfacewaterStation)->tentram) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.tentram__placeholder') }}">
        {!! $errors->first('tentram', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tensong') ? 'has-error' : '' }}">
    <label for="tensong" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.tensong') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tensong" type="text" id="tensong" value="{{ old('tensong', optional($surfacewaterStation)->tensong) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.tensong__placeholder') }}">
        {!! $errors->first('tensong', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('luuvucsong') ? 'has-error' : '' }}">
    <label for="luuvucsong" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.luuvucsong') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="luuvucsong" type="text" id="luuvucsong" value="{{ old('luuvucsong', optional($surfacewaterStation)->luuvucsong) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.luuvucsong__placeholder') }}">
        {!! $errors->first('luuvucsong', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('xa') ? 'has-error' : '' }}">
    <label for="xa" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.xa') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="xa" type="text" id="xa" value="{{ old('xa', optional($surfacewaterStation)->xa) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.xa__placeholder') }}">
        {!! $errors->first('xa', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('huyen') ? 'has-error' : '' }}">
    <label for="huyen" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.huyen') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="huyen" type="text" id="huyen" value="{{ old('huyen', optional($surfacewaterStation)->huyen) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.huyen__placeholder') }}">
        {!! $errors->first('huyen', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tinh') ? 'has-error' : '' }}">
    <label for="tinh" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.tinh') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tinh" type="text" id="tinh" value="{{ old('tinh', optional($surfacewaterStation)->tinh) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.tinh__placeholder') }}">
        {!! $errors->first('tinh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('toadox') ? 'has-error' : '' }}">
    <label for="toadox" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.toadox') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="toadox" type="text" id="toadox" value="{{ old('toadox', optional($surfacewaterStation)->toadox) }}" min="-9" max="9" placeholder="{{ trans('surfacewater_stations.toadox__placeholder') }}">
        {!! $errors->first('toadox', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('toadoy') ? 'has-error' : '' }}">
    <label for="toadoy" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.toadoy') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="toadoy" type="text" id="toadoy" value="{{ old('toadoy', optional($surfacewaterStation)->toadoy) }}" min="-9" max="9" placeholder="{{ trans('surfacewater_stations.toadoy__placeholder') }}">
        {!! $errors->first('toadoy', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('dientichtn') ? 'has-error' : '' }}">
    <label for="dientichtn" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.dientichtn') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dientichtn" type="text" id="dientichtn" value="{{ old('dientichtn', optional($surfacewaterStation)->dientichtn) }}" min="-9" max="9" placeholder="{{ trans('surfacewater_stations.dientichtn__placeholder') }}">
        {!! $errors->first('dientichtn', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('thongsoqt') ? 'has-error' : '' }}">
    <label for="thongsoqt" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.thongsoqt') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="thongsoqt" type="text" id="thongsoqt" value="{{ old('thongsoqt', optional($surfacewaterStation)->thongsoqt) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.thongsoqt__placeholder') }}">
        {!! $errors->first('thongsoqt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('geom') ? 'has-error' : '' }}">
    <label for="geom" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.geom') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="geom" type="text" id="geom" value="{{ old('geom', optional($surfacewaterStation)->geom) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.geom__placeholder') }}">
        {!! $errors->first('geom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('ngayqt') ? 'has-error' : '' }}">
    <label for="ngayqt" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.ngayqt') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ngayqt" type="text" id="ngayqt" value="{{ old('ngayqt', optional($surfacewaterStation)->ngayqt) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.ngayqt__placeholder') }}">
        {!! $errors->first('ngayqt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('capquanly') ? 'has-error' : '' }}">
    <label for="capquanly" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.capquanly') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="capquanly" type="text" id="capquanly" value="{{ old('capquanly', optional($surfacewaterStation)->capquanly) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.capquanly__placeholder') }}">
        {!! $errors->first('capquanly', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('mota') ? 'has-error' : '' }}">
    <label for="mota" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.mota') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="mota" type="text" id="mota" value="{{ old('mota', optional($surfacewaterStation)->mota) }}" minlength="1" placeholder="{{ trans('surfacewater_stations.mota__placeholder') }}">
        {!! $errors->first('mota', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('docaoz') ? 'has-error' : '' }}">
    <label for="docaoz" class="col-md-4 col-form-label required text-right">{{ trans('surfacewater_stations.docaoz') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="docaoz" type="text" id="docaoz" value="{{ old('docaoz', optional($surfacewaterStation)->docaoz) }}" placeholder="{{ trans('surfacewater_stations.docaoz__placeholder') }}">
        {!! $errors->first('docaoz', '<p class="help-block">:message</p>') !!}
    </div>
</div>

