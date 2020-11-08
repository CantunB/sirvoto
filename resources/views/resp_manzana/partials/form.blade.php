{{ csrf_field() }}
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nombre">Nombre</label>
          <input @if( !empty($responsable->nombre)) readonly  @endif  type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" value="{{ old('nombre') ?? $responsable->nombre }}" autofocus  required>
          <input type="hidden"  name="user_id" id="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group col-md-4">
          <label for="paterno">Ap. Paterno</label>
          <input @if( !empty($responsable->apellido_paterno)) readonly  @endif  type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" value="{{ old('paterno') ?? $responsable->apellido_paterno ?? $responsable->paterno}}" required>
        </div>
        <div class="form-group col-md-4">
          <label for="materno">Ap. Materno</label>
          <input @if( !empty($responsable->apellido_materno)) readonly  @endif  type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" value="{{ old('materno') ?? $responsable->apellido_materno ?? $responsable->materno}}">
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="calle">Direccion</label>
              <input @if( !empty($responsable->calle)) readonly  @endif type="text" class="form-control" id="calle" name="calle" placeholder="1234 Main St" value="{{ old('calle') ?? $responsable->calle }}" required>
          </div>
          <div class="form-group col-md-2">
              <label for="num_ext">Num.Ext</label>
              <input @if( !empty($responsable->num_exterior)) readonly  @endif type="text" class="form-control" id="num_ext" name="num_ext" placeholder="S/N" value="{{ old('num_ext') ?? $responsable->num_exterior }}">
          </div>
          <div class="form-group col-md-4">
              <label for="colonia">Colonia</label>
              <input @if( !empty($responsable->colonia)) readonly  @endif type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="{{ old('colonia') ?? $responsable->colonia }}" required>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-3">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{  old('email') ?? $responsable->email }}">
          </div>
          <div class="form-group col-md-2">
              <label for="inputAddress">Telefono</label>
              <input type="text" class="form-control" id="celular" name="celular" placeholder="9828282828" value="{{  old('celular') ??  $responsable->celular }}">
          </div>
          <div class="form-group col-md-3">
              <label for="facebook">Facebook</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control"  id="facebook" name="facebook" placeholder="Facebook" aria-label="Username" value="{{ old('facebook') ??  $responsable->facebook }}">
              </div>
          </div>
          <div class="form-group col-md-2">
              <label for="seccion">Seccion</label>
              @if( !empty($responsable->seccion))
              <input  readonly type="text" class="form-control" id="seccion" name="seccion"  value="{{ $responsable->seccion }}">
              @else
            <select id="seccion" name="seccion" class="form-control" title="Seccion..." data-container="body"  >
                @foreach ($secciones as $item)
                <option  value="{{  old('seccion') ??  $item->seccion }}"
                    @if($responsable->seccion == $item->seccion )
                        selected
                    @endif>
                    {{ $item->seccion }}
                </option>
                @endforeach
            </select>
            @endif
          </div>
          <div class="form-group col-md-2">
              <label for="manzana">Mazana</label>
              @if( !empty($responsable->manzana))
              <input  readonly type="text" class="form-control" id="manzana" name="manzana"  value="{{ $responsable->manzana }}">
              @else
              <select id="manzana" name="manzana" class="form-control" title="Manzana..." data-container="body" >
                <option value="{{  old('manzana') ?? $responsable->manzana }}"
                    @if($responsable->manzana)
                        selected
                    @endif>
                    {{ $responsable->manzana }}
                </option>
              </select>
              @endif
            </div>
      </div>
      <h4>Asignado</h4>
      <div class="form-row">
              <div class="form-group col-md-2">
                  <label for="seccion_electoral">Seccion</label>
                  <select id="seccion_electoral" name="seccion_electoral" class="form-control selectpicker" data-container="body" required>
                    @foreach ($secciones as $item)
                        <option value="{{  old('seccion_electoral') ?? $item->seccion }}"
                            @if($responsable->seccion_electoral == $item->manzana)

                            @endif
                            >
                            {{ $item->seccion }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-4">
                  <label for="manzanas">Mazanas</label>
                  <select id="manzanas" name="manzanas[]" class="form-control selectpicker" title="Manzanas..." multiple data-actions-box="true" data-container="body">
                    <option value="{{  old('manzanas') ?? $responsable->manzanas }}"
                        @if($responsable->manzanas)
                            selected
                        @endif>
                        {{ $responsable->manzanas }}
                    </option>
                  </select>
              </div>
      </div>
      <a href="{{url()->previous()}}" class="btn btn btn-outline-danger">Cancelar</a>
      <button type="submit" class="btn btn-success">{{ $btnText }}</button>

</div>
