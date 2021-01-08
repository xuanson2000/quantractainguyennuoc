
<div class="form-group row {{ $errors->has('gid') ? 'has-error' : '' }}">
    <label for="gid" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.gid') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="gid" type="text" id="gid" value="{{ old('gid', optional($meteorologyStation)->gid) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('meteorology_stations.gid__placeholder') }}">
        {!! $errors->first('gid', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('matram') ? 'has-error' : '' }}">
    <label for="matram" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.matram') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="matram" type="text" id="matram" value="{{ old('matram', optional($meteorologyStation)->matram) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('meteorology_stations.matram__placeholder') }}">
        {!! $errors->first('matram', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tentram') ? 'has-error' : '' }}">
    <label for="tentram" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.tentram') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tentram" type="text" id="tentram" value="{{ old('tentram', optional($meteorologyStation)->tentram) }}" minlength="1" placeholder="{{ trans('meteorology_stations.tentram__placeholder') }}">
        {!! $errors->first('tentram', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('diadanh') ? 'has-error' : '' }}">
    <label for="diadanh" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.diadanh') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="diadanh" type="text" id="diadanh" value="{{ old('diadanh', optional($meteorologyStation)->diadanh) }}" minlength="1" placeholder="{{ trans('meteorology_stations.diadanh__placeholder') }}">
        {!! $errors->first('diadanh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tentinh') ? 'has-error' : '' }}">
    <label for="tentinh" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.tentinh') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tentinh" type="text" id="tentinh" value="{{ old('tentinh', optional($meteorologyStation)->tentinh) }}" minlength="1" placeholder="{{ trans('meteorology_stations.tentinh__placeholder') }}">
        {!! $errors->first('tentinh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('loai') ? 'has-error' : '' }}">
    <label for="loai" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.loai') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="loai" type="text" id="loai" value="{{ old('loai', optional($meteorologyStation)->loai) }}" minlength="1" placeholder="{{ trans('meteorology_stations.loai__placeholder') }}">
        {!! $errors->first('loai', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('bucxa') ? 'has-error' : '' }}">
    <label for="bucxa" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.bucxa') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="bucxa" type="text" id="bucxa" value="{{ old('bucxa', optional($meteorologyStation)->bucxa) }}" minlength="1" placeholder="{{ trans('meteorology_stations.bucxa__placeholder') }}">
        {!! $errors->first('bucxa', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('ktnn') ? 'has-error' : '' }}">
    <label for="ktnn" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.ktnn') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ktnn" type="text" id="ktnn" value="{{ old('ktnn', optional($meteorologyStation)->ktnn) }}" minlength="1" placeholder="{{ trans('meteorology_stations.ktnn__placeholder') }}">
        {!! $errors->first('ktnn', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('giamsatbdk') ? 'has-error' : '' }}">
    <label for="giamsatbdk" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.giamsatbdk') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="giamsatbdk" type="text" id="giamsatbdk" value="{{ old('giamsatbdk', optional($meteorologyStation)->giamsatbdk) }}" minlength="1" placeholder="{{ trans('meteorology_stations.giamsatbdk__placeholder') }}">
        {!! $errors->first('giamsatbdk', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('qtkttc') ? 'has-error' : '' }}">
    <label for="qtkttc" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.qtkttc') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="qtkttc" type="text" id="qtkttc" value="{{ old('qtkttc', optional($meteorologyStation)->qtkttc) }}" minlength="1" placeholder="{{ trans('meteorology_stations.qtkttc__placeholder') }}">
        {!! $errors->first('qtkttc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tkvt') ? 'has-error' : '' }}">
    <label for="tkvt" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.tkvt') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tkvt" type="text" id="tkvt" value="{{ old('tkvt', optional($meteorologyStation)->tkvt) }}" minlength="1" placeholder="{{ trans('meteorology_stations.tkvt__placeholder') }}">
        {!! $errors->first('tkvt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('pilotdogiotrencao') ? 'has-error' : '' }}">
    <label for="pilotdogiotrencao" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.pilotdogiotrencao') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="pilotdogiotrencao" type="text" id="pilotdogiotrencao" value="{{ old('pilotdogiotrencao', optional($meteorologyStation)->pilotdogiotrencao) }}" minlength="1" placeholder="{{ trans('meteorology_stations.pilotdogiotrencao__placeholder') }}">
        {!! $errors->first('pilotdogiotrencao', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('ozonbxct') ? 'has-error' : '' }}">
    <label for="ozonbxct" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.ozonbxct') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ozonbxct" type="text" id="ozonbxct" value="{{ old('ozonbxct', optional($meteorologyStation)->ozonbxct) }}" minlength="1" placeholder="{{ trans('meteorology_stations.ozonbxct__placeholder') }}">
        {!! $errors->first('ozonbxct', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('radathoitiet') ? 'has-error' : '' }}">
    <label for="radathoitiet" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.radathoitiet') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="radathoitiet" type="text" id="radathoitiet" value="{{ old('radathoitiet', optional($meteorologyStation)->radathoitiet) }}" minlength="1" placeholder="{{ trans('meteorology_stations.radathoitiet__placeholder') }}">
        {!! $errors->first('radathoitiet', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('dinhviset') ? 'has-error' : '' }}">
    <label for="dinhviset" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.dinhviset') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dinhviset" type="text" id="dinhviset" value="{{ old('dinhviset', optional($meteorologyStation)->dinhviset) }}" minlength="1" placeholder="{{ trans('meteorology_stations.dinhviset__placeholder') }}">
        {!! $errors->first('dinhviset', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('dogiocatlop') ? 'has-error' : '' }}">
    <label for="dogiocatlop" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.dogiocatlop') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dogiocatlop" type="text" id="dogiocatlop" value="{{ old('dogiocatlop', optional($meteorologyStation)->dogiocatlop) }}" minlength="1" placeholder="{{ trans('meteorology_stations.dogiocatlop__placeholder') }}">
        {!! $errors->first('dogiocatlop', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('qtmthienco') ? 'has-error' : '' }}">
    <label for="qtmthienco" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.qtmthienco') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="qtmthienco" type="text" id="qtmthienco" value="{{ old('qtmthienco', optional($meteorologyStation)->qtmthienco) }}" minlength="1" placeholder="{{ trans('meteorology_stations.qtmthienco__placeholder') }}">
        {!! $errors->first('qtmthienco', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('qtmtquyhoach') ? 'has-error' : '' }}">
    <label for="qtmtquyhoach" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.qtmtquyhoach') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="qtmtquyhoach" type="text" id="qtmtquyhoach" value="{{ old('qtmtquyhoach', optional($meteorologyStation)->qtmtquyhoach) }}" minlength="1" placeholder="{{ trans('meteorology_stations.qtmtquyhoach__placeholder') }}">
        {!! $errors->first('qtmtquyhoach', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('daco') ? 'has-error' : '' }}">
    <label for="daco" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.daco') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="daco" type="text" id="daco" value="{{ old('daco', optional($meteorologyStation)->daco) }}" minlength="1" placeholder="{{ trans('meteorology_stations.daco__placeholder') }}">
        {!! $errors->first('daco', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('quyhoach') ? 'has-error' : '' }}">
    <label for="quyhoach" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.quyhoach') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="quyhoach" type="text" id="quyhoach" value="{{ old('quyhoach', optional($meteorologyStation)->quyhoach) }}" minlength="1" placeholder="{{ trans('meteorology_stations.quyhoach__placeholder') }}">
        {!! $errors->first('quyhoach', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('geom') ? 'has-error' : '' }}">
    <label for="geom" class="col-md-4 col-form-label required text-right">{{ trans('meteorology_stations.geom') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="geom" type="text" id="geom" value="{{ old('geom', optional($meteorologyStation)->geom) }}" minlength="1" placeholder="{{ trans('meteorology_stations.geom__placeholder') }}">
        {!! $errors->first('geom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

