@csrf
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" value="{{ old('nombre') ?? $anfitrion->nombre }}">
        </div>
        <div class="form-group col-md-4">
          <label for="paterno">Ap. Paterno</label>
          <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" value="{{ old('paterno') ?? $anfitrion->paterno  ?? $anfitrion->apellido_paterno}}">
        </div>
        <div class="form-group col-md-4">
          <label for="materno">Ap. Materno</label>
          <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" value="{{ old('materno') ?? $anfitrion->apellido_materno ?? $anfitrion->materno }}">
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="calle">Direccion</label>
              <input type="text" class="form-control" id="calle" name="calle" placeholder="1234 Main St" value="{{ old('calle') ?? $anfitrion->calle }}">
          </div>
          <div class="form-group col-md-2">
              <label for="num_ext">Num.Ext</label>
              <input type="text" class="form-control" id="num_ext" name="num_ext" placeholder="S/N" value="{{ old('num_ext') ?? $anfitrion->num_exterior }}">
          </div>
          <div class="form-group col-md-4">
              <label for="colonia">Colonia</label>
              <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="{{ old('colonia') ?? $anfitrion->colonia }}">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-3">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{ old('email') ?? $anfitrion->email }}">
          </div>
          <div class="form-group col-md-2">
              <label for="inputAddress">Telefono</label>
              <input type="text" class="form-control" id="celular" name="celular" placeholder="9828282828" value="{{ old('celular') ?? $anfitrion->celular }}">
          </div>
          <div class="form-group col-md-3">
              <label for="facebook">Facebook</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control"  id="facebook" name="facebook" placeholder="Username" aria-label="Username" value="{{ old('facebook') ?? $anfitrion->facebook }}">
              </div>
          </div>
          <div class="form-group col-md-2">
              <label for="seccion">Seccion</label>
              <select id="seccion" name="seccion" class="form-control selectpicker" title="Seccion...">
                @foreach ($secciones as $item)
                <option  value="{{  old('seccion') ??  $item->seccion }}"
                    @if($anfitrion->seccion == $item->seccion )
                        selected
                    @endif>
                    {{ $item->seccion }}
                </option>
                    @endforeach
              </select>
          </div>
          <div class="form-group col-md-2">
              <label for="manzana">Mazana</label>
              <select id="manzana" name="manzana" class="form-control selectpicker" title="Manzana...">
                <option selected value="{{ $anfitrion->manzana }}"
                    @if($anfitrion->manzana)
                        selected
                    @endif>
                    {{ $anfitrion->manzana }}
                </option>
              </select>
            </div>
      </div>
      <h5>Identificacion al Anfitrion</h5>
      <div class="form-row">
        <input type="text" class="form-control" id="identificacion" name="identificacion"  value="{{ old('identificacion') ?? $anfitrion->identificacion }}">
      </div><br>
      </div>
<a href="{{url()->previous()}}" class="btn btn btn-outline-danger">Cancelar</a>
<button type="submit" class="btn btn-success">{{ $btnText }}</button>

</div>
