<div class="form-group col-md-6 col-lg-6">
  <label for="">Rol <strong class="text-danger">*</strong></label>
  <select class="form-control {{ $errors->has('rol_id') ? 'is-invalid' : '' }}" name="rol_id">
    <option hidden value="{{ $user->rol_id or old('rol_id') }}">-- Seleccionar Rol --</option>
    @foreach ($roles as $role)
      <option value="{{ $role->id }}">{{ $role->role }}</option>
    @endforeach
  </select>
  <strong class="invalid-feedback">{{ $errors->first('rol_id') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  <label for="">Nombres <strong class="text-danger">*</strong></label>
  <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $user->name or old('name') }}">
  <strong class="invalid-feedback">{{ $errors->first('name') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  <label for="">Apellidos <strong class="text-danger">*</strong></label>
  <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" value="{{ $user->last_name or old('last_name') }}">
  <strong class="invalid-feedback">{{ $errors->first('last_name') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  <label for="">Correo Electrónico <strong class="text-danger">*</strong></label>
  <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ $user->email or old('email') }}">
  <strong class="invalid-feedback">{{ $errors->first('email') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  <label for="">Contraseña <strong class="text-danger">*</strong></label>
  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">
  <strong class="invalid-feedback">{{ $errors->first('password') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  <label for="">Confirmar Contraseña <strong class="text-danger">*</strong></label>
  <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation">
  <strong class="invalid-feedback">{{ $errors->first('password_confirmation') }}</strong>
</div>

<div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
