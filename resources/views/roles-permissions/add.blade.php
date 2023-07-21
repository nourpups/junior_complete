@extends('layouts.forms.nested-resource-controller.add', [
      'title' => 'Permissions',
      'preRouteName' => 'roles.permissions',
      'routeParameters' => $role])

@section('css')
    <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script> Codebase.helpersOnLoad('jq-select2') </script>
@endsection

@section('form')
    <div class="my-2">
        <label class="form-label">Permissions</label>
        <select class="js-select2 form-select @error('permission_names') is-invalid @enderror " name="permission_names[]" style="width: 100%;" data-container="#modal-block-select2" data-placeholder="Choose many.." multiple>
            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
            @foreach($permissions as $permission)
                <option value="{{$permission->name}}"
                    @foreach($rolePermissions as $rolePermission)
                        {{$rolePermission->id == $permission->id ? 'disabled' : ''}}
                    @endforeach
                />
                {{$permission->name}}
                </option>
            @endforeach
        </select>
        @error('permission_names')
            <div class="invalid-feedback animated fadeIn">{{ $message }}</div>
        @enderror
    </div>
@endsection
