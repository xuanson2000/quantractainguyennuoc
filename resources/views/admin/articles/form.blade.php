
<div class="form-group row {{ $errors->has('author') ? 'has-error' : '' }}">
    <label for="author" class="col-md-4 col-form-label required text-right">{{ trans('articles.author') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="author" type="text" id="author" value="{{ old('author', optional($article)->author) }}" minlength="1" maxlength="255" placeholder="{{ trans('articles.author__placeholder') }}">
        {!! $errors->first('author', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-4 col-form-label required text-right">{{ trans('articles.category_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="category_id" name="category_id">
        	    <option value="" style="display: none;" {{ old('category_id', optional($article)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('articles.category_id__placeholder') }}</option>
        	@foreach ($categories as $key => $category)
			    <option value="{{ $key }}" {{ old('category_id', optional($article)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('network_id') ? 'has-error' : '' }}">
    <label for="network_id" class="col-md-4 col-form-label required text-right">{{ trans('articles.network_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="network_id" name="network_id">
            <option value="" style="display: none;" {{ old('network_id', optional($article)->network_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('articles.network_id__placeholder') }}</option>
            @foreach ($networks as $key => $network)
                <option value="{{ $key }}" {{ old('network_id', optional($article)->network_id) == $key ? 'selected' : '' }}>
                    {{ $network }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('network_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('basin_id') ? 'has-error' : '' }}">
    <label for="basin_id" class="col-md-4 col-form-label required text-right">{{ trans('articles.basin_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="basin_id" name="basin_id">
            <option value="" style="display: none;" {{ old('basin_id', optional($article)->basin_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('articles.basin_id__placeholder') }}</option>
            @foreach ($basins as $key => $basin)
                <option value="{{ $key }}" {{ old('basin_id', optional($article)->basin_id) == $key ? 'selected' : '' }}>
                    {{ $basin }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('basin_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-4 col-form-label required text-right">{{ trans('articles.title') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($article)->title) }}" minlength="1" maxlength="255" placeholder="{{ trans('articles.title__placeholder') }}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('seo_title') ? 'has-error' : '' }}">
    <label for="seo_title" class="col-md-4 col-form-label required text-right">{{ trans('articles.seo_title') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="seo_title" type="text" id="seo_title" value="{{ old('seo_title', optional($article)->seo_title) }}" minlength="1" placeholder="{{ trans('articles.seo_title__placeholder') }}">
        {!! $errors->first('seo_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('excerpt') ? 'has-error' : '' }}">
    <label for="excerpt" class="col-md-4 col-form-label required text-right">{{ trans('articles.excerpt') }}</label>
    <div class="col-md-6">
        <textarea class="form-control mce-content" name="excerpt" cols="50" rows="5" id="excerpt" minlength="1" placeholder="{{ trans('articles.excerpt__placeholder') }}">{{ old('excerpt', optional($article)->excerpt) }}</textarea>
        {!! $errors->first('excerpt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="content" class="col-md-4 col-form-label required text-right">{{ trans('articles.content') }}</label>
    <div class="col-md-6">
        <textarea class="form-control mce-content" name="content" cols="50" rows="10" id="content" minlength="1" placeholder="{{ trans('articles.content__placeholder') }}">{{ old('content', optional($article)->content) }}</textarea>
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-4 col-form-label required text-right">{{ trans('articles.image') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="image" type="text" id="image" value="{{ old('image', optional($article)->image) }}" placeholder="{{ trans('articles.image__placeholder') }}">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-4 col-form-label required text-right">{{ trans('articles.slug') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($article)->slug) }}" minlength="1" placeholder="{{ trans('articles.slug__placeholder') }}">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('meta_description') ? 'has-error' : '' }}">
    <label for="meta_description" class="col-md-4 col-form-label required text-right">{{ trans('articles.meta_description') }}</label>
    <div class="col-md-6">
        <textarea class="form-control" name="meta_description" cols="50" rows="10" id="meta_description" minlength="1" placeholder="{{ trans('articles.meta_description__placeholder') }}">{{ old('meta_description', optional($article)->meta_description) }}</textarea>
        {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
    <label for="meta_keywords" class="col-md-4 col-form-label required text-right">{{ trans('articles.meta_keywords') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="meta_keywords" type="text" id="meta_keywords" value="{{ old('meta_keywords', optional($article)->meta_keywords) }}" minlength="1" placeholder="{{ trans('articles.meta_keywords__placeholder') }}">
        {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('article_status') ? 'has-error' : '' }}">
    <label for="article_status" class="col-md-4 col-form-label required text-right">{{ trans('articles.article_status') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="article_status" name="article_status">
        	    <option value="" style="display: none;" {{ old('article_status', optional($article)->article_status ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('articles.article_status__placeholder') }}</option>
        	@foreach (['PUBLISHED' => trans('articles.article_status_published'),
'DRAFT' => trans('articles.article_status_draft'),
'PENDING' => trans('articles.article_status_pending')] as $key => $text)
			    <option value="{{ $key }}" {{ old('article_status', optional($article)->article_status) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('article_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('featured') ? 'has-error' : '' }}">
    <label for="featured" class="col-md-4 col-form-label required text-right">{{ trans('articles.featured') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="featured" name="featured">
        	    <option value="" style="display: none;" {{ old('featured', optional($article)->featured ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('articles.featured__placeholder') }}</option>
        	@foreach (['true' => trans('articles.featured_true'),
'false' => trans('articles.featured_false')] as $key => $text)
			    <option value="{{ $key }}" {{ old('featured', optional($article)->featured) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('featured', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('delete_at') ? 'has-error' : '' }}">
    <label for="delete_at" class="col-md-4 col-form-label required text-right">{{ trans('articles.delete_at') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="delete_at" type="text" id="delete_at" value="{{ old('delete_at', optional($article)->delete_at) }}" placeholder="{{ trans('articles.delete_at__placeholder') }}">
        {!! $errors->first('delete_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>

