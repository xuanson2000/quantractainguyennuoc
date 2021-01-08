
<div class="form-group row {{ $errors->has('gid') ? 'has-error' : '' }}">
    <label for="gid" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.gid') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="gid" type="text" id="gid" value="{{ old('gid', optional($tramdomua)->gid) }}" minlength="1" required="true" placeholder="{{ trans('tramdomuas.gid__placeholder') }}">
        {!! $errors->first('gid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tt') ? 'has-error' : '' }}">
    <label for="tt" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.tt') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tt" type="text" id="tt" value="{{ old('tt', optional($tramdomua)->tt) }}" minlength="1" placeholder="{{ trans('tramdomuas.tt__placeholder') }}">
        {!! $errors->first('tt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tentram') ? 'has-error' : '' }}">
    <label for="tentram" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.tentram') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tentram" type="text" id="tentram" value="{{ old('tentram', optional($tramdomua)->tentram) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('tramdomuas.tentram__placeholder') }}">
        {!! $errors->first('tentram', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('diadanh') ? 'has-error' : '' }}">
    <label for="diadanh" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.diadanh') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="diadanh" type="text" id="diadanh" value="{{ old('diadanh', optional($tramdomua)->diadanh) }}" minlength="1" placeholder="{{ trans('tramdomuas.diadanh__placeholder') }}">
        {!! $errors->first('diadanh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('x') ? 'has-error' : '' }}">
    <label for="x" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.x') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="x" type="text" id="x" value="{{ old('x', optional($tramdomua)->x) }}" min="-9" max="9" placeholder="{{ trans('tramdomuas.x__placeholder') }}">
        {!! $errors->first('x', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('y') ? 'has-error' : '' }}">
    <label for="y" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.y') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="y" type="text" id="y" value="{{ old('y', optional($tramdomua)->y) }}" min="-9" max="9" placeholder="{{ trans('tramdomuas.y__placeholder') }}">
        {!! $errors->first('y', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('geom') ? 'has-error' : '' }}">
    <label for="geom" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.geom') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="geom" type="text" id="geom" value="{{ old('geom', optional($tramdomua)->geom) }}" minlength="1" placeholder="{{ trans('tramdomuas.geom__placeholder') }}">
        {!! $errors->first('geom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tinh') ? 'has-error' : '' }}">
    <label for="tinh" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.tinh') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tinh" type="text" id="tinh" value="{{ old('tinh', optional($tramdomua)->tinh) }}" minlength="1" placeholder="{{ trans('tramdomuas.tinh__placeholder') }}">
        {!! $errors->first('tinh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('huyen') ? 'has-error' : '' }}">
    <label for="huyen" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.huyen') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="huyen" type="text" id="huyen" value="{{ old('huyen', optional($tramdomua)->huyen) }}" minlength="1" placeholder="{{ trans('tramdomuas.huyen__placeholder') }}">
        {!! $errors->first('huyen', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('xa') ? 'has-error' : '' }}">
    <label for="xa" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.xa') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="xa" type="text" id="xa" value="{{ old('xa', optional($tramdomua)->xa) }}" minlength="1" placeholder="{{ trans('tramdomuas.xa__placeholder') }}">
        {!! $errors->first('xa', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('ghichu') ? 'has-error' : '' }}">
    <label for="ghichu" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.ghichu') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ghichu" type="text" id="ghichu" value="{{ old('ghichu', optional($tramdomua)->ghichu) }}" minlength="1" placeholder="{{ trans('tramdomuas.ghichu__placeholder') }}">
        {!! $errors->first('ghichu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('sohieu') ? 'has-error' : '' }}">
    <label for="sohieu" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.sohieu') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sohieu" type="text" id="sohieu" value="{{ old('sohieu', optional($tramdomua)->sohieu) }}" minlength="1" placeholder="{{ trans('tramdomuas.sohieu__placeholder') }}">
        {!! $errors->first('sohieu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('mota') ? 'has-error' : '' }}">
    <label for="mota" class="col-md-4 col-form-label required text-right">{{ trans('tramdomuas.mota') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="mota" type="text" id="mota" value="{{ old('mota', optional($tramdomua)->mota) }}" minlength="1" placeholder="{{ trans('tramdomuas.mota__placeholder') }}">
        {!! $errors->first('mota', '<p class="help-block">:message</p>') !!}
    </div>
</div>

