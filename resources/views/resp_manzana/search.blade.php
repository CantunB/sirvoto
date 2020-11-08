<form id="form-rm" class="form-group" action="{{ route('rm.store') }}" method="POST">
    {{ method_field('POST') }}
        @include('resp_manzana.partials.form',
        [
            'responsable',
            'secciones',
            'manzanas',
            'btnText' => 'Registrar'
        ]
        )
</form>
