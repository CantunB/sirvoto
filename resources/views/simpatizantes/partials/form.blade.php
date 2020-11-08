{{ csrf_field() }}
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nombre">Nombre</label>
          <input   @if( !empty($simpatizante->nombre)) readonly @endif type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" value="{{ old('nombre') ?? $simpatizante->nombre }}">
          <input type="hidden"  name="user_id" id="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group col-md-4">
          <label for="paterno">Ap. Paterno</label>
          <input  @if( !empty($simpatizante->apellido_paterno)) readonly @endif type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" value="{{old('paterno') ?? $simpatizante->paterno ?? $simpatizante->apellido_paterno }}">
        </div>
        <div class="form-group col-md-4">
          <label for="materno">Ap. Materno</label>
          <input @if( !empty($simpatizante->apellido_materno)) readonly @endif type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" value="{{ old('materno') ?? $simpatizante->materno ?? $simpatizante->apellido_materno }}">
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="calle">Direccion</label>
              <input @if( !empty($simpatizante->calle)) readonly @endif type="text" class="form-control" id="calle" name="calle" placeholder="1234 Main St" value="{{ old('calle') ??  $simpatizante->calle }}" required>
          </div>
          <div class="form-group col-md-2">
              <label for="num_ext">Num.Ext</label>
              <input @if( !empty($simpatizante->num_exterior)) readonly @endif type="text" class="form-control" id="num_ext" name="num_ext" placeholder="S/N" value="{{ old('num_ext') ??  $simpatizante->num_exterior }}" required>
          </div>
          <div class="form-group col-md-4">
              <label for="colonia">Colonia</label>
              <input @if( !empty($simpatizante->colonia)) readonly @endif type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="{{ old('colonia') ??  $simpatizante->colonia }}" required>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-3">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{ old('email') ??  $simpatizante->email }}">
          </div>
          <div class="form-group col-md-2">
              <label for="inputAddress">Telefono</label>
              <input type="text" class="form-control" id="celular" name="celular" placeholder="9828282828" value="{{  old('celular') ?? $simpatizante->celular }}">
          </div>
          <div class="form-group col-md-3">
              <label for="facebook">Facebook</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control"  id="facebook" name="facebook" placeholder="Username" aria-label="Username" value="{{  old('facebook') ??  $simpatizante->facebook }}">
              </div>
          </div>
          <div class="form-group col-md-2">
            @if( !empty($simpatizante->seccion))
            <input type="hidden"  readonly type="text" class="form-control" id="seccion" name="seccion"  value="{{ $simpatizante->seccion }}">
            @else
              <label for="seccion">Seccion</label>
              <select id="seccion" name="seccion" class="form-control selectpicker" title="Seccion...">
                @foreach ($secciones as $item)
                <option  value="{{  old('seccion') ??  $item->seccion }}"
                    @if($simpatizante->seccion == $item->seccion )
                        selected
                    @endif>
                    {{ $item->seccion }}
                </option>
                @endforeach
              </select>
              @endif
          </div>
          <div class="form-group col-md-2">
            @if( !empty($simpatizante->manzana))
            <input type="hidden"  readonly type="text" class="form-control" id="manzana" name="manzana"  value="{{ $simpatizante->manzana }}">
            @else
            <label for="manzana">Mazana</label>
            <select id="manzana" name="manzana" class="form-control" title="Manzana">
              <option value="{{  old('manzana') ?? $simpatizante->manzana }}"
                  @if($simpatizante->manzana)
                      selected
                  @endif>
                  {{ $simpatizante->manzana }}
              </option>
            </select>
            @endif
          </div>
      </div>
      <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="anfitrion_id">Anfitrion</label>
                  <select id="anfitrion_id" name="anfitrion_id" class="form-control selectpicker" title="Anfitriones...">
                      <option value="">Ningun anfitrion</option>
                    @foreach ($anfitriones as $item)
                    <option value="{{ $item->id }}"data-subtext="{!! $item->nombre ." ".  $item->paterno !!}"
                        @if($simpatizante->anfitrion_id == $item->id )
                        selected
                        @endif>
                    {{  $item->identificacion   }}
                </option>
                    @endforeach
                </select>
            </div>
        <div class="form-group col-md-4">
                <label for="identificacion">Identificacion</label>
                <select id="identificacion" name="identificacion" class="form-control selectpicker" title="Identificacion">
                    <option value="">Ninguna identificacion</option>
                    <option value="Partido">Partido</option>
                    <option value="Simpatizante">Simpatizante</option>
                </select>
            </div>
        </div>
    <a href="{{url()->previous()}}" class="btn btn btn-outline-danger">Cancelar</a>
    <button type="submit" class="btn btn-success">{{ $btnText }}</button>
</div>
