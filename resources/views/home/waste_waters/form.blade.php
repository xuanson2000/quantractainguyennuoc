
<div class="form-group row {{ $errors->has('xt_id') ? 'has-error' : '' }}">
    <label for="xt_id" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.xt_id') }}</label>
    <div class="col-md-6">
        <select class="form-control" id="xt_id" name="xt_id" required="true">
        	    <option value="" style="display: none;" {{ old('xt_id', optional($wasteWater)->xt_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('waste_waters.xt_id__placeholder') }}</option>
        	@foreach ($xts as $key => $xt)
			    <option value="{{ $key }}" {{ old('xt_id', optional($wasteWater)->xt_id) == $key ? 'selected' : '' }}>
			    	{{ $xt }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('xt_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('id_dks') ? 'has-error' : '' }}">
    <label for="id_dks" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.id_dks') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_dks" type="text" id="id_dks" value="{{ old('id_dks', optional($wasteWater)->id_dks) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('waste_waters.id_dks__placeholder') }}">
        {!! $errors->first('id_dks', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('tennguonthai') ? 'has-error' : '' }}">
    <label for="tennguonthai" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.tennguonthai') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tennguonthai" type="text" id="tennguonthai" value="{{ old('tennguonthai', optional($wasteWater)->tennguonthai) }}" minlength="1" placeholder="{{ trans('waste_waters.tennguonthai__placeholder') }}">
        {!! $errors->first('tennguonthai', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('luuluong') ? 'has-error' : '' }}">
    <label for="luuluong" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.luuluong') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="luuluong" type="text" id="luuluong" value="{{ old('luuluong', optional($wasteWater)->luuluong) }}" min="-9" max="9" placeholder="{{ trans('waste_waters.luuluong__placeholder') }}">
        {!! $errors->first('luuluong', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('xt_tructiep') ? 'has-error' : '' }}">
    <label for="xt_tructiep" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.xt_tructiep') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="xt_tructiep" type="text" id="xt_tructiep" value="{{ old('xt_tructiep', optional($wasteWater)->xt_tructiep) }}" placeholder="{{ trans('waste_waters.xt_tructiep__placeholder') }}">
        {!! $errors->first('xt_tructiep', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('xt_daxuly') ? 'has-error' : '' }}">
    <label for="xt_daxuly" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.xt_daxuly') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="xt_daxuly" type="text" id="xt_daxuly" value="{{ old('xt_daxuly', optional($wasteWater)->xt_daxuly) }}" placeholder="{{ trans('waste_waters.xt_daxuly__placeholder') }}">
        {!! $errors->first('xt_daxuly', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('noitiepnhan') ? 'has-error' : '' }}">
    <label for="noitiepnhan" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.noitiepnhan') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="noitiepnhan" type="text" id="noitiepnhan" value="{{ old('noitiepnhan', optional($wasteWater)->noitiepnhan) }}" minlength="1" placeholder="{{ trans('waste_waters.noitiepnhan__placeholder') }}">
        {!! $errors->first('noitiepnhan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('dotrong') ? 'has-error' : '' }}">
    <label for="dotrong" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.dotrong') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="dotrong" type="text" id="dotrong" value="{{ old('dotrong', optional($wasteWater)->dotrong) }}" placeholder="{{ trans('waste_waters.dotrong__placeholder') }}">
        {!! $errors->first('dotrong', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('mau') ? 'has-error' : '' }}">
    <label for="mau" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.mau') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="mau" type="text" id="mau" value="{{ old('mau', optional($wasteWater)->mau) }}" minlength="1" placeholder="{{ trans('waste_waters.mau__placeholder') }}">
        {!! $errors->first('mau', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('mui') ? 'has-error' : '' }}">
    <label for="mui" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.mui') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="mui" type="text" id="mui" value="{{ old('mui', optional($wasteWater)->mui) }}" minlength="1" placeholder="{{ trans('waste_waters.mui__placeholder') }}">
        {!! $errors->first('mui', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('loaihinh') ? 'has-error' : '' }}">
    <label for="loaihinh" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.loaihinh') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="loaihinh" type="text" id="loaihinh" value="{{ old('loaihinh', optional($wasteWater)->loaihinh) }}" minlength="1" placeholder="{{ trans('waste_waters.loaihinh__placeholder') }}">
        {!! $errors->first('loaihinh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('sohieu_dks') ? 'has-error' : '' }}">
    <label for="sohieu_dks" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.sohieu_dks') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sohieu_dks" type="text" id="sohieu_dks" value="{{ old('sohieu_dks', optional($wasteWater)->sohieu_dks) }}" minlength="1" placeholder="{{ trans('waste_waters.sohieu_dks__placeholder') }}">
        {!! $errors->first('sohieu_dks', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('geom') ? 'has-error' : '' }}">
    <label for="geom" class="col-md-4 col-form-label required text-right">{{ trans('waste_waters.geom') }}</label>
    <div class="col-md-6">
        <input class="form-control" name="geom" type="text" id="geom" value="{{ old('geom', optional($wasteWater)->geom) }}" minlength="1" placeholder="{{ trans('waste_waters.geom__placeholder') }}">
        {!! $errors->first('geom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

