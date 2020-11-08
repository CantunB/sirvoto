@csrf
@if (empty($responsable))
<div class="container">
    <div class="form-group">
        <div class="col-md-8 mb-3">
        <label for="validationTooltip01">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$responsable->nombre }}" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-8 mb-3">
        <label for="validationTooltip02">Ap. Paterno</label>
        <input type="text" class="form-control" id="paterno" name="paterno" value="{{ $responsable->apellido_paterno }}" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-8 mb-3">
        <label for="validationTooltipUsername">Ap. Materno</label>
        <div class="input-group">
            <input type="text" class="form-control" id="materno" name="materno" placeholder="Mil" value="{{ $responsable->apellido_materno }}" required>
            <div class="invalid-tooltip">
            Please choose a unique and valid username.
            </div>
        </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="validationTooltip04">Calle</label>
          <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="{{ $responsable->calle }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="num_exterior">Num. Exterior</label>
          <input type="text" class="form-control" id="num_exterior" name="num_exterior" placeholder="Numero Exterior" value="{{ $responsable->num_exterior }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationTooltip04">Colonia</label>
          <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="{{ $responsable->colonia }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="seccion">Seccion</label>
          <select id="seccion" name="seccion" class="selectpicker"
          title="Secciones...">
             @foreach ($secciones as $sec)
                <option value="{{ $sec->seccion }}"
                    @if($responsable->seccion == $sec->seccion )
                        selected
                    @endif>
                 {{ $sec->seccion }}
                </option>
            @endforeach
           </select>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="manzana">Manzana</label>
          <input type="text" class="form-control" id="manzana" name="manzana" placeholder="Manzana" value="{{ $responsable->manzana }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationTooltip05">Celular</label>
          <input type="tel" class="form-control" id="celular" name="celular" placeholder="Telefono" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="{{ old('celular') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-md-6 mb-6">
          <label for="validationTooltip05">Correo</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Correo" value="{{ old('email') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-md-6 mb-6">
          <i class="fab fa-facebook"></i><label for="validationTooltip05">Facebook</label>
          <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="{{ old('facebook') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>


        <div class="col-md-3 mb-3">
          <label for="seccion_electoral">Seccion Electoral</label>
          <select id="seccion_electoral" name="seccion_electoral" class="selectpicker"
          title="Secciones...">
             @foreach ($secciones as $sec)
             <option data-subtext="Seccion" value="{{ $sec->seccion }}">{{ $sec->seccion }}</option>
             @endforeach
           </select>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-md-6 mb-6">
          <label for="tipo_seccion">Tipo de Seccion</label>
          <input type="text" class="form-control" id="tipo_seccion" name="tipo_seccion" placeholder="Tipo de Seccion" value="{{ old('tipo_seccion') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-md-6 mb-6">
          <label for="validationTooltip05">Ubicacion de Casilla</label>
          <input type="text" class="form-control" id="ubicacion_casilla" name="ubicacion_casilla" placeholder="Ubicación" value="{{ old('ubicacion_casilla') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
      </div>
      <div>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
@else
<div class="container">
    <div class="form-group">
        <div class="col-md-8 mb-3">
        <label for="validationTooltip01">Nombre</label>
        <input type="text" class="form-control" id="nombr" name="nombre" placeholder="Nombre" value="{{ old('nombre') ?? ''}}" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-8 mb-3">
        <label for="validationTooltip02">Ap. Paterno</label>
        <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" value="{{ old('paterno') ?? '' }}" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-8 mb-3">
        <label for="validationTooltipUsername">Ap. Materno</label>
        <div class="input-group">
            <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" value="{{ old('materno') ?? '' }}" required>
            <div class="invalid-tooltip">
            Please choose a unique and valid username.
            </div>
        </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="validationTooltip04">Calle</label>
          <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="{{ old('calle') ?? '' }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="num_exterior">Num. Exterior</label>
          <input type="text" class="form-control" id="num_exterior" name="num_exterior" placeholder="Numero Exterior" value="{{ old('num_exterior') ?? '' }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationTooltip04">Colonia</label>
          <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="{{ old('colonia') ?? '' }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="seccion">Seccion</label>
          <select id="seccion" name="seccion" class="selectpicker"
          title="Secciones...">
             @foreach ($secciones as $sec)
                <option data-subtext="Seccion" value="{{ $sec->seccion }}">
                 {{ $sec->seccion }}
                </option>
            @endforeach
           </select>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="manzana">Manzana</label>
          <input type="text" class="form-control" id="manzana" name="manzana" placeholder="Manzana" value="{{ old('manzana') ?? '' }}" required>
          <div class="invalid-tooltip">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="validationTooltip05">Celular</label>
          <input type="tel" class="form-control" id="celular" name="celular" placeholder="Telefono" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="{{ old('celular') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-md-6 mb-6">
          <label for="validationTooltip05">Correo</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Correo" value="{{ old('email') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-md-6 mb-6">
          <i class="fab fa-facebook"></i><label for="validationTooltip05">Facebook</label>
          <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="{{ old('facebook') }}" required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>

        <div class="container">
            <div class=" row col-md-3 mb-3">
                <label for="seccion_electoral">Seccion Electoral</label>
                <select id="seccion_electoral" class="selectpiker" name="seccion_electoral"
                title="Secciones...">
                   @foreach ($secciones as $sec)
                   <option data-subtext="Seccion" value="{{ $sec->seccion }}">{{ $sec->seccion }}</option>
                   @endforeach
                </select>
                <div class="invalid-tooltip">
                  Please provide a valid zip.
                </div>
              </div>
              <div class="col-md-6 mb-6">
                <label for="tipo_seccion">Tipo de Seccion</label>
                <input type="text" class="form-control" id="tipo_seccion" name="tipo_seccion" placeholder="Tipo de Seccion" value="{{ old('tipo_seccion') }}" required>
                <div class="invalid-tooltip">
                  Please provide a valid zip.
                </div>
              </div>
              <div class="col-md-6 mb-6">
                <label for="validationTooltip05">Ubicacion de Casilla</label>
                <input type="text" class="form-control" id="ubicacion_casilla" name="ubicacion_casilla" placeholder="Ubicación" value="{{ old('ubicacion_casilla') }}" required>
                <div class="invalid-tooltip">
                  Please provide a valid zip.
                </div>
              </div>
        </div>

      </div>
      <div>
        <input type="submit" class="btn btn-primary" value="Registrar">
    </div>
</div>

@endif


<script>
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    $('select').selectpicker();

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $(document).ready(function () {
                $('#seccion').on('change',function(e) {
                    var seccion = e.target.value;
            $.ajax({
                url:"{{ route('rm.getManzanas') }}",
                type:"POST",
                data: {
                    seccion: seccion
                    },
            success:function (data) {
            $('#manzana').empty();
            $.each(data.manzanas,function(index,manzana){
            $('#manzana').append('<option value="'+manzana.manzana+'">'+manzana.manzana+'</option>');
                })
            $("#manzana").html(manzana.manzana).selectpicker('refresh');

                },

                error: function( error )
                {
                    alert( error );
                }
        })
    });
});
</script>
