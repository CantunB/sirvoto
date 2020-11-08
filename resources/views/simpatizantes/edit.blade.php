@extends('layouts.app')
@section('title','Editar Simpatizante')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
         <h5 class="card-title">
             <h4>Simpatizante <span class="badge badge-warning">Editar</span></h4>
         </h5>
         <form id="form-rm"  class="form-group" action="{{ route('simpatizantes.update', $simpatizante->id) }}" method="POST">
             {{ method_field('PUT') }}
                 @include('simpatizantes.partials.form-edit',
                 [
                     'simpatizante',
                     'secciones',
                     'manzanas',
                     'anfitriones',
                     'btnText' => 'Actualizar Responsable'
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
             url:"{{ route('simpatizantes.getSecMan') }}",
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
