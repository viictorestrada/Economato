<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('role', 'Rol') }}
  {{ Form::select('rol_id', $roles, null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('name', 'Nombres') }}
  {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('last_name', 'Apellidos') }}
  {{ Form::text('last_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('email', 'Correo Electrónico') }}
  {{ Form::email('email', null, array('class' => 'form-control')) }} {{ $errors->has('email') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('email') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('number_document', 'N° Documento') }}
  {{ Form::text('number_document', null, array('class' => 'form-control')) }} {{ $errors->has('number_document') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('number_document') }}</strong>
</div>


<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('password', 'Contraseña') }}
  {{ Form::password('password', array('class' => 'form-control', 'id' => 'password')) }}
</div>

<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('password_confirmation', 'Confirmar Contraseña') }}
  {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
</div>

<div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
  <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
