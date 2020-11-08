@extends('layouts.app')
@section('title','Anfitriones')
@section('content')
</style>
<div class="container">
    <div class="row">

        <div class="col">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <br>

                            <h3 class="float-center"> <strong>Anfitriones</strong>
                                @can('create-anfitriones')
                                <a href="{{ route('anfitriones.create') }}"
                                class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-square" ></i> Nuevo anfitrion</a>
                                @endcan
                            </h3>
                            <table id="anfitriones-table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Ap. Paterno</th>
                                    <th>Ap. Materno</th>
                                    <th>Nombre</th>
                                    <th>Calle</th>
                                    <th>Colonia</th>
                                    <th>Seccion</th>
                                    <th>Manzana</th>
                                    <th>Telefono</th>
                                    <th>Identificacion</th>
                                    <th>Acciones</th>
                                    </tr>
                              </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <br>

              </div>
        </div>
      </div>
</div>



<script>
    $(document).ready( function () {
      $('#anfitriones-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('anfitriones.index') !!}',
        columns:[
            {data: 'id', name : 'id'},
            {data: 'paterno', name : 'paterno'},
            {data: 'materno', name : 'materno'},
            {data: 'nombre', name : 'nombre'},
            {data: 'calle', name : 'calle'},
            {data: 'colonia', name : 'colonia'},
            {data: 'seccion', name : 'seccion'},
            {data: 'manzana', name : 'manzana'},
            {data: 'celular', name : 'celular'},
            {data: 'identificacion', name : 'identificacion'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      } );
    } );

</script>
@endsection
