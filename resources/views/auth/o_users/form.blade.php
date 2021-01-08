
<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-4 col-form-label required text-right">{{ trans('users.name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('users.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-4 col-form-label required text-right">{{ trans('users.email') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($user)->email) }}" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-4 col-form-label required text-right">{{ trans('users.password') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($user)->password) }}" placeholder="{{ trans('users.password__placeholder') }}">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('remember_token') ? 'has-error' : '' }}">
    <label for="remember_token" class="col-md-4 col-form-label required text-right">{{ trans('users.remember_token') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="remember_token" type="text" id="remember_token" value="{{ old('remember_token', optional($user)->remember_token) }}" minlength="1" placeholder="{{ trans('users.remember_token__placeholder') }}">
        {!! $errors->first('remember_token', '<p class="help-block">:message</p>') !!}
    </div>
</div>

