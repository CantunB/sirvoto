@extends('layouts.app')
@section('title','Resp. Manzana')
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

                            <h3 class="float-center"> <strong>Responsable de Manzana</strong>
                                @can('create-resp_manzana')
                                <a href="{{ route('rm.create') }}"
                                class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-square" ></i> Nuevo responsable</a>
                                @endcan
                            </h3>
                            <table id="resp_manzana-table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>SecionElectoral</th>
                                    <th>Manzanas</th>
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
      $('#resp_manzana-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('rm.index') !!}',
        columns:[
            {data: 'id', name : 'id'},
            {data: 'nombre', name : 'nombre'},
            {data: 'seccion_electoral', name : 'seccion_electoral'},
            {data: 'manzanas', name : 'manzanas'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: "5%"}
        ]
      } );
    } );

</script>
@endsection
