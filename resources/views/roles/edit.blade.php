@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <h2 style="text-transform:uppercase;"><strong>Role {{$roles->name}}</strong></h2>

                    <form action="{{ action('RolesController@update', $roles->id) }}" method="POST" class="form-group">
                        {{--  <form action="{{ route('roles.store') }}" method="POST" class="form-group">  --}}
                        @method('PUT')
                        @include('roles.partials.form',
                         ['btnText' => 'Actualizar']
                         )
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
