<form id="form-rm" class="form-group" action="{{ route('rs.store') }}" method="POST">
    {{ method_field('POST') }}
    @include('resp_seccion.partials.form',
    [
        'search',
        'secciones',
        'manzanas',
        'btnText' => 'Nuevo Responsable',
        'btnColor' => ' btn-info'
    ]
    )
</form>
