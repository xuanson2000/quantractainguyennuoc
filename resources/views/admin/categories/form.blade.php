
<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-4 col-form-label required text-right">{{ trans('categories.name') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($category)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('categories.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-4 col-form-label required text-right">{{ trans('categories.slug') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($category)->slug) }}" minlength="1" placeholder="{{ trans('categories.slug__placeholder') }}">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('parent_id') ? 'has-error' : '' }}">
    <label for="parent_id" class="col-md-4 col-form-label required text-right">{{ trans('categories.parent_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="parent_id" name="parent_id">
        	    <option value="" style="display: none;" {{ old('parent_id', optional($category)->parent_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('categories.parent_id__placeholder') }}</option>
                <option value="0">Không xác định</option>
        	@foreach ($parents as $key => $parent)
			    <option value="{{ $key }}" {{ old('parent_id', optional($category)->parent_id) == $key ? 'selected' : '' }}>
			    	{{ $parent }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('cat_order') ? 'has-error' : '' }}">
    <label for="cat_order" class="col-md-4 col-form-label required text-right">{{ trans('categories.cat_order') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cat_order" type="text" id="cat_order" value="{{ old('cat_order', optional($category)->cat_order) }}" minlength="1" placeholder="{{ trans('categories.cat_order__placeholder') }}">
        {!! $errors->first('cat_order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

