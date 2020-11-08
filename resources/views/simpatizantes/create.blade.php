<form id="form-rm" class="form-group" action="{{ route('simpatizantes.store') }}" method="POST">
    {{ method_field('POST') }}
        @include('simpatizantes.partials.form',
        [
            'simpatizante',
            'anfitriones',
            'secciones',
            'manzanas',
            'btnText' => 'Registrar',
            'btnColor' => 'btn-primary'
        ]
        )
</form>
