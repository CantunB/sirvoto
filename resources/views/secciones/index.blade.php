@extends('layouts.app')
@section('title', 'Roles')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container">
                    <h2>Secciones</h2>
                    <table id="roles-table" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Seccion</th>
                          <th>L.N</th>
                          <th>Proyeccion</th></th>
                          <th>Num.Simpatizantes</th></th>
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
        pageLength: 100,
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('secciones.index') !!}',
        columns:[
            {data: 'seccion', seccion : 'seccion'},
            {data: 'ln', seccion : 'ln'},
            {data: 'proyeccion', seccion : 'proyeccion'},
            {data: 'simpatizantes', seccion : 'simpatizantes'},
        ]
      } );
    } );

</script>
@endsection
