@extends('layouts.app')
@section('title', 'Informacion Usuario')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
         <h5 class="card-title">
             <h4>Usuario <span class="badge badge-info">info</span></h4>
         </h5>
         <table class="table">
             <tr>
                 <th>Nombre:</th>
                 <td>{{ $user->name }}</td>
             </tr>
             <tr>
                 <th>Correo:</th>
                 <td>{{ $user->email }}</td>
             </tr>
         @can('edit', $user)
             <tr>
                 <th>Rol:</th>
                 <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </td>
             </tr>
         @endcan

         </table>
         @can('delete-roles')
         <form style="display:inline"
             method="POST"
             action="{{ route('usuarios.destroy', $user->id) }}">
             {!! csrf_field() !!}
             {!! method_field('DELETE') !!}
             <button class="btn btn-outline-danger" type="submit"> <i class="far fa-trash-alt"></i> Eliminar</button>
         @endcan
         @can('edit', $user)
        <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning"> <i class="far fa-edit"></i> Editar</a>
         @endcan

        </div>

    </div>
 </div>

@endsection
