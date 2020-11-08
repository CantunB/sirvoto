@extends('layouts.app')
@section('title', 'Roles')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container">
                    <h2>Roles</h2>
                    <table id="roles-table" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Creado</th>
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
        ajax: '{!! route('roles.index') !!}',
        columns:[
            {data: 'id', name : 'id'},
            {data: 'name', name : 'name'},
            {data: 'created_at', name : 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      } );
    } );

</script>
@endsection
