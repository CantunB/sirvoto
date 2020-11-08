{{ csrf_field() }}
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nombre">Nombre</label>
          <input  @if( !empty($search->nombre)) readonly  @endif type="text" class="form-control" id="nombre" name="nombre"
          placeholder="Nombre(s)" value="{{ old('nombre') ?? $search->nombre }}">
          <input type="hidden"  name="user_id" id="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group col-md-4">
          <label for="paterno">Ap. Paterno</label>
          <input @if( !empty($search->apellido_paterno)) readonly  @endif  type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" value="{{ old('nombre') ?? $search->apellido_paterno  }}">
        </div>
        <div class="form-group col-md-4">
          <label for="materno">Ap. Materno</label>
          <input @if( !empty($search->apellido_materno)) readonly  @endif type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" value="{{ old('nombre') ?? $search->apellido_materno }}">
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="calle">Direccion</label>
              <input @if( !empty($search->calle)) readonly  @endif type="text" class="form-control" id="calle" name="calle" placeholder="1234 Main St" value="{{ old('calle') ?? $search->calle }}">
          </div>
          <div class="form-group col-md-2">
              <label for="num_ext">Num.Ext</label>
              <input @if( !empty($search->num_exterior)) readonly  @endif type="text" class="form-control" id="num_ext" name="num_ext" placeholder="S/N" value="{{ old('num_ext') ?? $search->num_exterior }}">
          </div>
          <div class="form-group col-md-4">
              <label for="colonia">Colonia</label>
              <input @if( !empty($search->colonia)) readonly  @endif  type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="{{ old('colonia') ?? $search->colonia }}">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-3">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{ old('email') ?? $search->email }}">
          </div>
          <div class="form-group col-md-2">
              <label for="inputAddress">Telefono</label>
              <input type="text" class="form-control" id="celular" name="celular" placeholder="9828282828" value="{{ old('celular') ?? $search->celular }}">
          </div>
          <div class="form-group col-md-3">
              <label for="facebook">Facebook</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control"  id="facebook" name="facebook" placeholder="Username" aria-label="Username" value="{{ old('facebook') ?? $search->facebook }}">
              </div>
          </div>
          <div class="form-group col-md-2">
              @if( !empty($search->seccion))
              <input type="hidden"  readonly type="text" class="form-control" id="seccion" name="seccion"  value="{{ $search->seccion }}">
              @else
              <label for="seccion">Seccion</label>

              <select id="seccion" name="seccion" class="form-control selectpicker" data-container="body" title="Seccion...">
                <option value="">Seccion</option>
                @foreach ($secciones as $item)
                <option  value="{{  old('seccion') ??  $item->seccion }}"
                    @if($search->seccion == $item->seccion )
                        selected
                    @endif>
                    {{ $item->seccion }}
                </option>
                @endforeach
              </select>
              @endif
          </div>
          <div class="form-group col-md-2">
              @if(!empty($search->manzana))
              <input type="hidden"   readonly type="text" class="form-control" id="manzana" name="manzana"  value="{{ $search->manzana }}">
              @else
              <label for="manzana">Mazana</label>
              <select  id="manzana" name="manzana" class="form-control" title="Manzana">
                <option value="{{  old('manzana') ?? $search->manzana }}"
                    @if($search->manzana)
                        selected
                    @endif>
                    {{ $search->manzana }}
                </option>
              </select>
              @endif
            </div>
      </div>
      <h4>Asignado</h4>
      <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="seccion">Seccion Electoral</label>
                  <select  id="seccion_electoral" name="seccion_electoral" class="form-control selectpicker" title="Seccion Electoral"  data-container="body" required>
                    <option value="">Seccion Electoral</option>
                    @foreach ($secciones as $item)
                    <option value="{{  old('seccion_electoral') ?? $item->seccion}}"
                        @if($search->seccion_electoral == $item->seccion)
                            selected
                        @endif
                    >
                        {{ $item->seccion }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-2">
                <label for="tipo_seccion">Tipo de Seccion</label>
              <input type="text" class="form-control" id="tipo_seccion" name="tipo_seccion" value="{{ $search->tipo_seccion }}">
            </div>
      </div>
      <a href="{{url()->previous()}}" class="btn btn btn-outline-danger">Cancelar</a>
      <button type="submit" class="btn {{ $btnColor }}">{{ $btnText }}</button>
</div>
