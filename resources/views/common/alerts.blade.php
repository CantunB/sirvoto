{{-- alerta para informar --}}
@if(session('info'))
  <div style="text-align: center" class="alert alert-primary" id="alert">
   <h5>     {{ session('info') }}
       </h5>
  </div>
@endif

{{-- alerta para actualizar --}}
@if(session('update'))
  <div style="text-align: center"class="alert alert-warning" id="alert">
    <h5>      {{ session('update') }}
    </h5>
  </div>
@endif

{{-- alerta para eliminar --}}
@if(session('destroy'))
  <div style="text-align: center" class="alert alert-danger" id="alert">
    <h5>  {{ session('destroy') }}
        </h5>
  </div>
@endif

{{-- alerta para agregar --}}
@if(session('success'))
  <div style="text-align: center"class="alert alert-success" id="alert">
   <h5>    {{ session('success') }}
      </h5>
  </div>
@endif
