{{ csrf_field() }}
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="name">Nombre</label>
          <input  type="text" class="form-control" id="name" name="name"
          value="{{ old('name') ?? $user->name  }}">
          {!! $errors->first('name','<span class=error>:message</span>') !!}
        </div>
        <div class="form-group col-md-4">
          <label for="email">Correo</label>
          <input  type="text" class="form-control" id="email" name="email" value="{{ old('email') ?? $user->email }}">
          {!! $errors->first('email','<span class=error>:message</span>') !!}
        </div>
        <div class="form-group col-md-6">
            <label for="roles">Asignar Role(s)</label>
            <select name="roles[]" id="roles" class="selectpicker" title="Roles..." multiple>
            <option value="">Selecciona un rol</option>
            @foreach ($roles as $rol)
            <option data-icon="far fa-id-badge" value="{{ $rol->id }}">{{ $rol->name }}</option>
            @endforeach
        </select>
        </div>
    </div>
      <a href="{{url()->previous()}}" class="btn btn btn-outline-danger"> <i class="fas fa-undo-alt"></i> Cancelar</a>
      <button type="submit" class="btn {{ $btnColor }}"> <i class="fas fa-edit"></i> {{ $btnText }}</button>
</div>
