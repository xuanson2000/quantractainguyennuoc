
<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-4 col-form-label required text-right">{{ trans('roles.name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($role)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('roles.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('guard_name') ? 'has-error' : '' }}">
    <label for="guard_name" class="col-md-4 col-form-label required text-right">{{ trans('roles.guard_name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="guard_name" type="text" id="guard_name" value="{{ old('guard_name', optional($role)->guard_name) }}" minlength="1" placeholder="{{ trans('roles.guard_name__placeholder') }}">
        {!! $errors->first('guard_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

