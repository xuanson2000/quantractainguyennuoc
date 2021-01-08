@foreach($permissions as $permission)
    <div class="col-md-3 form-group form-check">
        <input class="form-check-input" type="checkbox" id="role_permission_{{$permission->id}}" name="role_permission[]" value="{{$permission->id}}">
        <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
    </div>
@endforeach