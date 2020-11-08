@extends('layouts.app')
@section('title','Electores')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container">
                    <h2>Electores</h2>
                    <table id="electores-table" class="display" style="width:100%">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Ap. Paterno</th>
                          <th>Ap. Materno</th>
                          <th>Municipio</th>
                          <th>Manzana</th>
                          <th>Colonia</th>
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
      $('#electores-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('electores.index') !!}',
        columns:[
            {data: 'id', name : 'id'},
            {data: 'nombre', name : 'nombre'},
            {data: 'apellido_paterno', name : 'apellido_paterno'},
            {data: 'apellido_materno', name : 'apellido_materno'},
            {data: 'municipio', name : 'municipio'},
            {data: 'manzana', name : 'manzana'},
            {data: 'colonia', name : 'colonia'},
        ]
      } );
    } );

</script>
@endsection
