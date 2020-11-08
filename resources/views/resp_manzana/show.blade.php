@extends('layouts.app')
@section('title', 'Informacion Usuario')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
         <h5 class="card-title">
             <h4>Responsable de Manzana <span class="badge badge-info">info</span></h4>
         </h5>
         <table class="table">
            <tr>
                <th>Nombre:</th>
                <td>{{ $responsable->nombre }} {{ $responsable->paterno }} {{ $responsable->materno }}</td>
            </tr>
            <tr>
                <th>Colonia:</th>
                <td>{{ $responsable->colonia }}</td>
                <th>Calle:</th>
                <td>{{ $responsable->calle }}</td>
                <th>Num.Exterior:</th>
                <td>{{ $responsable->num_exterior }}</td>
            </tr>
            <tr>
                <th>Seccion:</th>
                <td>{{ $responsable->seccion }}</td>
                <th>Manzana:</th>
                <td>{{ $responsable->manzana }}</td>
            </tr>
            <tr>
                <th>Correo:</th>
                <td>{{ $responsable->email }}</td>
                <th>Telefono:</th>
                <td>{{ $responsable->celular }}</td>
                <th>Facebook:</th>
                <td>{{ $responsable->facebook }}</td>
            </tr>
            <tr><td><h4>Responsable de seccion</h4></td></tr>
            <tr>
                <th>Seccion Electoral</th>
                <td>{{ $responsable->seccion_electoral }}</td>
                <th>Manzanas</th>
                <td>{{ $responsable->manzanas }}</td>

            </tr>
         </table>
         @can('delete-resp_manzana')
         <form style="display:inline"
             method="POST"
             action="{{ route('rm.destroy', $responsable->id) }}">
             {!! csrf_field() !!}
             {!! method_field('DELETE') !!}
             <button class="btn btn-outline-danger" type="submit"> <i class="far fa-trash-alt"></i> Eliminar</button>
         @endcan
         @can('update-resp_manzana')
        <a href="{{ route('rm.edit', $responsable->id) }}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>
         @endcan

        </div>

    </div>
 </div>

@endsection
