@extends('layouts.app')
@section('title', 'Editar Responsable de Manzanas')
@section('content')
    <div class="container">
       <div class="card">
           <div class="card-body">
            <h5 class="card-title">
                <h4>Anfitrion <span class="badge badge-warning">Editar</span></h4>
            </h5>
            <form id="form-rm"  class="form-group" action="{{ route('anfitriones.update', $anfitrion->id) }}" method="POST">
                {{ method_field('PUT') }}
                    @include('anfitriones.partials.form',
                    [
                        'anfitrion',
                        'secciones',
                        'manzanas',
                        'btnText' => 'Actualizar Anfitrion',
                        'btnColor' => 'btn-success'
                    ]
                    )
            </form>
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
                    url:"{{ route('anfitriones.getSecMan') }}",
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
</script>
@endsection
