@extends('layouts.app')
@section('title', 'Registro Responsable de Manzana')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">
            <h4>Responsable de Manzana <span class="badge badge-info">Buscar o Crear</span></h4>
        </h5>
        <br>
        <div class="container">
                <!--    INICA CARD PARA EL FORMULARIO -->
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <form class="form-inline" action="{{route('rm.create')}}" method="GET">
                                {{ method_field('GET') }}
                                {{ csrf_field() }}
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                    <label for="nombre">Nombre(s):&nbsp;&nbsp;</label>
                                        <input id="nombre" type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required autofocus >&nbsp;&nbsp;
                                    </div>
                                    <div class="col-auto">
                                    <label for="paterno" >Apellido Paterno:&nbsp;&nbsp;</label>
                                        <input id="paterno" type="text" name="paterno" class="form-control" value="{{old('nombre')}}" required>&nbsp;&nbsp;
                                    </div>
                                    <div class="col-auto">
                                    <label for="materno">Apellido Materno:&nbsp;&nbsp;</label>
                                        <input id="materno" type="text" name="materno" class="form-control" value="{{old('nombre')}}">&nbsp;&nbsp;&nbsp;
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <span><i class="fas fa-search"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--    TERMINA CARD PARA EL FORMULARIO -->
            <br>
                <!--    INICA CARD PARA EL RESULTADO  -->
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        @if( !empty($responsable->nombre))
                            @include('resp_manzana.search',
                            ['responsable']
                            )
                        @else
                            @include('resp_manzana.create',
                            ['responsable']
                            )
                        @endif
                    </div>
                </div>
            </div>
                <!--INICA CARD PARA EL RESULTADO -->
        </div>

    </div>
    </div>
</div>
<script>
      $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    $('select').selectpicker();

/***********INICIA VALIDACION PARA SECCION-MANZANA*************/
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                $(document).ready(function () {
                $('#seccion').on('change',function(e) {
                var seccion = e.target.value;
                $.ajax({
                url:"{{ route('rm.getSecMan') }}",
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
/***********TERMINA VALIDACION PARA SECCION-MANZANA*************/


/***********INICIA VALIDACION PARA SECCION-MANZANA*************/
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#seccion_electoral').on('change',function(e) {
                var seccion = e.target.value;
        $.ajax({
                url:"{{ route('rm.getManzanas') }}",
                type:"POST",
                data: {
                seccion: seccion
                },
                success:function (data) {
                $('#manzanas').empty();
                $.each(data.manzanas,function(index,manzana){
                $('#manzanas').append('<option  value="'+manzana.manzana+'">'+manzana.manzana+'</option>');

                })
                $("#manzanas").html(manzana.manzana).selectpicker('refresh');

                },
                error: function( error )
                {
                    alert( error );
                }
        })
    });
});
/***********TERMINA VALIDACION PARA SECCION-MANZANA*************/


/***********INICA LIMPIAR FORMULARIO*************/

/***********TERMINA LIMPIAR FORMULARIO*************/



</script>
@endsection
