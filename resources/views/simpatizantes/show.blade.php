@extends('layouts.app')
@section('title', 'Informacion Simpatizante')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
         <h5 class="card-title">
             <h4>Simpatizante <span class="badge badge-info">info</span></h4>
         </h5>
         <table class="table">
            <tr>
                <th>Nombre:</th>
                <td>{{ $simpatizante->nombre }} {{ $simpatizante->paterno }} {{ $simpatizante->materno }}</td>
            </tr>
            <tr>
                <th>Colonia:</th>
                <td>{{ $simpatizante->colonia }}</td>
                <th>Calle:</th>
                <td>{{ $simpatizante->calle }}</td>
                <th>Num.Exterior:</th>
                <td>{{ $simpatizante->num_exterior }}</td>
            </tr>
            <tr>
                <th>Seccion:</th>
                <td>{{ $simpatizante->seccion }}</td>
                <th>Manzana:</th>
                <td>{{ $simpatizante->manzana }}</td>
            </tr>
            <tr>
                <th>Correo:</th>
                <td>{{ $simpatizante->email }}</td>
                <th>Telefono:</th>
                <td>{{ $simpatizante->celular }}</td>
                <th>Facebook:</th>
                <td>{{ $simpatizante->facebook }}</td>
            </tr>
            <tr>
                <th>Anfitrion</th>
                <td>{{ $simpatizante->anfitrion_id }}</td>
                <th>Identificacion</th>
                <td>{{ $simpatizante->identificacion }}</td>

            </tr>
         </table>
         @can('delete-simpatizantes')
         <form style="display:inline"
             method="POST"
             action="{{ route('simpatizantes.destroy', $simpatizante->id) }}">
             {!! csrf_field() !!}
             {!! method_field('DELETE') !!}
             <button class="btn btn-outline-danger" type="submit"> <i class="far fa-trash-alt"></i> Eliminar</button>
         @endcan
         @can('update-simpatizantes')
        <a href="{{ route('simpatizantes.edit', $simpatizante->id) }}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>
         @endcan

        </div>

    </div>
 </div>

@endsection
