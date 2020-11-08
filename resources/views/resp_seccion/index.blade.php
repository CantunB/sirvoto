@extends('layouts.app')
@section('title','Resp. Seccion')
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
                            <h3 class="float-center"> <strong>Responsable de Seccion</strong>
                                @can('create-resp_seccion')
                                <a href="{{ route('rs.create') }}"
                                class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-square" ></i> Nuevo responsable</a>
                                @endcan
                            </h3>
                            <table id="resp_seccion-table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Seccion Electoral</th>
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

<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
                   <input type="hidden" name="Customer_id" id="Customer_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <textarea id="detail" name="detail" required="" placeholder="Enter Details" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


<script>
    $(document).ready( function () {
      $('#resp_seccion-table').DataTable( {
        pageLength: 100,
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('rs.index') !!}',
        columns:[
            {data: 'id', name : 'id'},
            {data: 'nombre', name : 'nombre'},
            {data: 'seccion_electoral', name : 'seccion_electoral', width: "12%"},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: "5%"}
        ]
      } );
    } );

    $('body').on('click', '.editCustomer', function () {
      var Customer_id = $(this).data('id');
      $.get("" +'/rs/' + Customer_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Customer");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Customer_id').val(data.id);
          $('#name').val(data.name);
          $('#detail').val(data.detail);
      })
   });
</script>
@endsection
