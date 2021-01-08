
<div class="form-group row {{ $errors->has('map_id') ? 'has-error' : '' }}">
    <label for="map_id" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.map_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="map_id" name="map_id">
        	    <option value="" style="display: none;" {{ old('map_id', optional($ollayer)->map_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ollayers.map_id__placeholder') }}</option>
        	@foreach ($map_ids as $key => $map_id)
			    <option value="{{ $key }}" {{ old('map_id', optional($ollayer)->map_id) == $key ? 'selected' : '' }}>
			    	{{ $map_id }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('map_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('group_id') ? 'has-error' : '' }}">
    <label for="group_id" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.group_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="group_id" name="group_id">
        	    <option value="" style="display: none;" {{ old('group_id', optional($ollayer)->group_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ollayers.group_id__placeholder') }}</option>
        	@foreach ($group_ids as $key => $group_id)
			    <option value="{{ $key }}" {{ old('group_id', optional($ollayer)->group_id) == $key ? 'selected' : '' }}>
			    	{{ $group_id }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('layer_name') ? 'has-error' : '' }}">
    <label for="layer_name" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.layer_name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="layer_name" type="text" id="layer_name" value="{{ old('layer_name', optional($ollayer)->layer_name) }}" minlength="1" placeholder="{{ trans('ollayers.layer_name__placeholder') }}">
        {!! $errors->first('layer_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('layer_title') ? 'has-error' : '' }}">
    <label for="layer_title" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.layer_title') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="layer_title" type="text" id="layer_title" value="{{ old('layer_title', optional($ollayer)->layer_title) }}" minlength="1" placeholder="{{ trans('ollayers.layer_title__placeholder') }}">
        {!! $errors->first('layer_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.description') }}</label>
    <div class="col-md-6">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($ollayer)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('opacity') ? 'has-error' : '' }}">
    <label for="opacity" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.opacity') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="opacity" type="text" id="opacity" value="{{ old('opacity', optional($ollayer)->opacity) }}" min="-9" max="9" placeholder="{{ trans('ollayers.opacity__placeholder') }}">
        {!! $errors->first('opacity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('source') ? 'has-error' : '' }}">
    <label for="source" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.source') }}</label>
    <div class="col-md-6">
        <textarea class="form-control" name="source" cols="50" rows="10" id="source" placeholder="{{ trans('ollayers.source__placeholder') }}">{{ old('source', optional($ollayer)->source) }}</textarea>
        {!! $errors->first('source', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('visible') ? 'has-error' : '' }}">
    <label for="visible" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.visible') }}</label>
    <div class="col-md-6">
        <div class="checkbox">
            <label for="visible_1">
            	<input id="visible_1" class="" name="visible" type="checkbox" value="1" {{ old('visible', optional($ollayer)->visible) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('visible', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('minxextent') ? 'has-error' : '' }}">
    <label for="minxextent" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.minxextent') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="minxextent" type="text" id="minxextent" value="{{ old('minxextent', optional($ollayer)->minxextent) }}" min="-9" max="9" placeholder="{{ trans('ollayers.minxextent__placeholder') }}">
        {!! $errors->first('minxextent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('minyextent') ? 'has-error' : '' }}">
    <label for="minyextent" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.minyextent') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="minyextent" type="text" id="minyextent" value="{{ old('minyextent', optional($ollayer)->minyextent) }}" min="-9" max="9" placeholder="{{ trans('ollayers.minyextent__placeholder') }}">
        {!! $errors->first('minyextent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('maxxextent') ? 'has-error' : '' }}">
    <label for="maxxextent" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.maxxextent') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="maxxextent" type="text" id="maxxextent" value="{{ old('maxxextent', optional($ollayer)->maxxextent) }}" min="-9" max="9" placeholder="{{ trans('ollayers.maxxextent__placeholder') }}">
        {!! $errors->first('maxxextent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('maxyextent') ? 'has-error' : '' }}">
    <label for="maxyextent" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.maxyextent') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="maxyextent" type="text" id="maxyextent" value="{{ old('maxyextent', optional($ollayer)->maxyextent) }}" min="-9" max="9" placeholder="{{ trans('ollayers.maxyextent__placeholder') }}">
        {!! $errors->first('maxyextent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('zindex') ? 'has-error' : '' }}">
    <label for="zindex" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.zindex') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="zindex" type="text" id="zindex" value="{{ old('zindex', optional($ollayer)->zindex) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('ollayers.zindex__placeholder') }}">
        {!! $errors->first('zindex', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('minresolution') ? 'has-error' : '' }}">
    <label for="minresolution" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.minresolution') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="minresolution" type="text" id="minresolution" value="{{ old('minresolution', optional($ollayer)->minresolution) }}" min="-9" max="9" placeholder="{{ trans('ollayers.minresolution__placeholder') }}">
        {!! $errors->first('minresolution', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('maxresolution') ? 'has-error' : '' }}">
    <label for="maxresolution" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.maxresolution') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="maxresolution" type="text" id="maxresolution" value="{{ old('maxresolution', optional($ollayer)->maxresolution) }}" min="-9" max="9" placeholder="{{ trans('ollayers.maxresolution__placeholder') }}">
        {!! $errors->first('maxresolution', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('delete_at') ? 'has-error' : '' }}">
    <label for="delete_at" class="col-md-4 col-form-label required text-right">{{ trans('ollayers.delete_at') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="delete_at" type="text" id="delete_at" value="{{ old('delete_at', optional($ollayer)->delete_at) }}" placeholder="{{ trans('ollayers.delete_at__placeholder') }}">
        {!! $errors->first('delete_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>

