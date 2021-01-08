
<div class="form-group row {{ $errors->has('map_id') ? 'has-error' : '' }}">
    <label for="map_id" class="col-md-4 col-form-label required text-right">{{ trans('layer_groups.map_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="map_id" name="map_id">
        	    <option value="" style="display: none;" {{ old('map_id', optional($layerGroup)->map_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('layer_groups.map_id__placeholder') }}</option>
        	@foreach ($maps as $key => $map)
			    <option value="{{ $key }}" {{ old('map_id', optional($layerGroup)->map_id) == $key ? 'selected' : '' }}>
			    	{{ $map }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('map_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('group_name') ? 'has-error' : '' }}">
    <label for="group_name" class="col-md-4 col-form-label required text-right">{{ trans('layer_groups.group_name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="group_name" type="text" id="group_name" value="{{ old('group_name', optional($layerGroup)->group_name) }}" minlength="1" placeholder="{{ trans('layer_groups.group_name__placeholder') }}">
        {!! $errors->first('group_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-4 col-form-label required text-right">{{ trans('layer_groups.description') }}</label>
    <div class="col-md-6">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($layerGroup)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('delete_at') ? 'has-error' : '' }}">
    <label for="delete_at" class="col-md-4 col-form-label required text-right">{{ trans('layer_groups.delete_at') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="delete_at" type="text" id="delete_at" value="{{ old('delete_at', optional($layerGroup)->delete_at) }}" placeholder="{{ trans('layer_groups.delete_at__placeholder') }}">
        {!! $errors->first('delete_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>

