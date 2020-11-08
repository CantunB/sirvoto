@extends('layouts.app')
@section('content')
    <div class="container">
        <h4>Seccciones</h4>
        <select class="browser-default selectpicker" name="seccion" id="seccion" title="Secciones...">
            @foreach ($secciones as $item)
            <option value="{{ $item->seccion }}">{{ $item->seccion }}</option>
            @endforeach
        </select>
        <h4>Manzanas</h4>
        <select class="browser-default selectpicker" name="manzana" id="manzana" multiple title="Manzanas...">
        </select>

    </div>

<script type="text/javascript">
 $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    $('select').selectpicker();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

                $(document).ready(function () {
                $('#seccion').on('change',function(e) {
                var seccion = e.target.value;

                $.ajax({
                url:"{{ route('rm.getManzanas') }}",
                type:"POST",
                data: {
                seccion: seccion
                },
                success:function (data) {
                $('#manzana').empty();
                $.each(data.manzanas,function(index,manzana){
                $('#manzana').append('<option value="'+manzana.manzana+'">'+manzana.manzana+'</option>');

                })
                $("#manzana").html(manzana.manzana).selectpicker('refresh');

                },

                error: function( error )
                {
                    alert( error );
                }

        })

    });
});
</script>

@endsection
