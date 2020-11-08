@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container">
                    <h2>Usuarios</h2>
                    <table id="roles-table" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Usuario</th>
                          <th>Correo</th>
                          <th>Role</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
      $('#roles-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('usuarios.index') !!}',
        columns:[
            {data: 'model_id', name : 'model_id'},
            {data: 'correo', name : 'correo'},
            {data: 'role_id', name : 'role_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false , width : "5%"}
        ]
      } );
    } );

</script>
@endsection
