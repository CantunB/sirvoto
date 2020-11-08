<form id="form-rm" class="form-group" action="{{ route('anfitriones.store') }}" method="POST">
    {{ method_field('POST') }}
        @include('anfitriones.partials.form',
        [
            'responsable',
            'secciones',
            'manzanas',
            'btnText' => 'Registrar',
            'btnColor' => 'btn-primary'
        ]
        )
</form>
