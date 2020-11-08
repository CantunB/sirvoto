@extends('layouts.app')
@section('title','Simpatizantes')
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

                            <h3 class="float-center"> <strong>Simpatizantes</strong>
                                @can('create-simpatizantes')
                                <a href="{{ route('simpatizantes.create') }}"
                                class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-square" ></i> Nuevo simpatizante</a>
                                @endcan
                            </h3>
                            <table id="simpatizantes-table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Anfitrion</th>
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
      $('#simpatizantes-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('simpatizantes.index') !!}',
        columns:[
            {data: 'id', name : 'id'},
            {data: 'nombre', name : 'nombre'},
            {data: 'anfitrion', name : 'anfitrion', width: "15%"},
            {data: 'identificacion', name : 'identificacion', width: "15%"},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: "5%"}

        ]
      } );
    } );

</script>

@endsection


