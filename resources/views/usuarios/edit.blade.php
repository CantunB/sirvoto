@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
         <h5 class="card-title">
             <h4>Usuario <span class="badge badge-warning">Editar</span></h4>
         </h5>
         <form id="form-rm"  class="form-group" action="{{ route('usuarios.update', $user->id) }}" method="POST">
             {{ method_field('PUT') }}
                 @include('usuarios.partials.form',
                 [
                     'user',
                     'btnText' => 'Actualizar',
                     'btnColor' => 'btn-success'
                 ]
                 )
         </form>
        </div>
    </div>
 </div>
 <script>
     $('select').selectpicker();
     $.fn.selectpicker.Constructor.BootstrapVersion = '4';

 </script>
@endsection
