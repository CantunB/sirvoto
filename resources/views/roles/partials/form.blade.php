@csrf
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Nombre(s)</label>
            <input type="text" class="form-control" value="{{ $roles->name}}">
            @if ($errors->has('name'))
                <p style="color:red">  {{$errors->first('name')}} </p>
            @endif
        </div>
    </div>
    <h5><strong>Permisos Especiales</strong></h5>
    <div class="form-group">
           <input type="radio"
           id="selectall"
          name="special"
          >Acceso Total
    </div>

    <h5><strong>Lista de permisos</strong></h5>
    <div class="form-group">
        <ul class="list-unstyled">
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="case" id="selectallusers"> Usuarios</th>
                        <th><input type="checkbox" class="case" id="selectallroles"> Roles</th>
                        <th><input type="checkbox" class="case" id="selectallpermisos"> Permisos</th>
                        <th><input type="checkbox" class="case" id="selectallelectores"> Electores</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        @foreach ($permisos as $item => $val )
                            @if($item < "4")

                                    <li>
                                    <label>
                                        <input type="checkbox"
                                            class="chkusers case"
                                            name="permission[]"
                                            value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                        ><strong> {{ $val->name   }}</strong>
                                    </label>
                                    </li>

                            @endif
                        @endforeach
                        </td>
                        <td>
                            @foreach ($permisos as $item => $val )
                                @if($item < "8")
                                @continue($item < "4")
                                        <li>
                                        <label>

                                            <input type="checkbox"
                                                class="chkroles case"
                                                name="permission[]"
                                                value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                            ><strong> {{ $val->name   }}</strong>
                                        </label>
                                        </li>

                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permisos as $item => $val )
                                @if($item < "12")
                                @continue($item < "8")
                                        <li>
                                        <label>

                                            <input type="checkbox"
                                                class="chkpermisos case"
                                                name="permission[]"
                                                value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                            ><strong> {{ $val->name   }}</strong>
                                        </label>
                                        </li>

                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permisos as $item => $val )
                                @if($item < "16")
                                @continue($item < "12")
                                        <li>
                                        <label>

                                            <input type="checkbox"
                                                class="chkelectores case"
                                                name="permission[]"
                                                value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                            ><strong> {{ $val->name   }}</strong>
                                        </label>
                                        </li>

                                @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>



            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="case" id="selectallanf"> Anfitriones</th>
                        <th><input type="checkbox" class="case" id="selectallsim"> Simpatizantes</th>
                        <th><input type="checkbox" class="case" id="selectallrs"> Resp. Seccion</th>
                        <th><input type="checkbox" class="case" id="selectallrm"> Resp. Manzana</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        @foreach ($permisos as $item => $val )
                        @if($item < "20")
                        @continue($item < "16")
                                    <li>
                                    <label>
                                        <input type="checkbox"
                                            class="chkanf case"
                                            name="permission[]"
                                            value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                        ><strong> {{ $val->name   }}</strong>
                                    </label>
                                    </li>
                        @endif
                        @endforeach
                        </td>
                        <td>
                            @foreach ($permisos as $item => $val )
                            @if($item < "24")
                            @continue($item < "20")
                                        <li>
                                        <label>
                                            <input type="checkbox"
                                                class="chksim case"
                                                name="permission[]"
                                                value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                            ><strong> {{ $val->name   }}</strong>
                                        </label>
                                        </li>
                            @endif
                            @endforeach
                            </td>
                            <td>
                                @foreach ($permisos as $item => $val )
                                @if($item < "28")
                                @continue($item < "24")
                                            <li>
                                            <label>
                                                <input type="checkbox"
                                                    class="chkrs case"
                                                    name="permission[]"
                                                    value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                                ><strong> {{ $val->name   }}</strong>
                                            </label>
                                            </li>
                                @endif
                                @endforeach
                            </td>
                            <td>
                            @foreach ($permisos as $item => $val )
                            @if($item < "32")
                            @continue($item < "28")
                                        <li>
                                        <label>
                                            <input type="checkbox"
                                                class="chkrm case"
                                                name="permission[]"
                                                value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                            ><strong> {{ $val->name   }}</strong>
                                        </label>
                                        </li>
                            @endif
                            @endforeach
                            </td>
                        <td>

                        </tr>
                </tbody>
            </table>
        </ul>
    </div>
    &nbsp; <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>&nbsp; {{ $btnText }} </button>
    <a href="{{ url()->previous() }}" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
/*---------------------CHECKBOX USUARIOS-------------------------------*/

$("#selectallusers").on("click", function() {
  $(".chkusers").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkuser").on("click", function() {
  if ($(".chkusers").length == $(".chkusers:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX ROLES-------------------------------*/

$("#selectallroles").on("click", function() {
  $(".chkroles").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkroles").on("click", function() {
  if ($(".chkroles").length == $(".chkroles:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX PERMISOS-------------------------------*/

$("#selectallpermisos").on("click", function() {
  $(".chkpermisos").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkpermisos").on("click", function() {
  if ($(".chkpermisos").length == $(".chkpermisos:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});



/*---------------------CHECKBOX ELECTORES-------------------------------*/

$("#selectallelectores").on("click", function() {
  $(".chkelectores").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkelectores").on("click", function() {
  if ($(".chkelectores").length == $(".chkelectores:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});


/*---------------------CHECKBOX ANFITRIONES-------------------------------*/

$("#selectallanf").on("click", function() {
  $(".chkanf").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkanf").on("click", function() {
  if ($(".chkanf").length == $(".chkanf:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX SIMPATIZANTES-------------------------------*/

$("#selectallsim").on("click", function() {
  $(".chksim").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chksim").on("click", function() {
  if ($(".chksim").length == $(".chksim:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX RESP. SECCION-------------------------------*/

$("#selectallrs").on("click", function() {
  $(".chkrs").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkrs").on("click", function() {
  if ($(".chkrs").length == $(".chkrs:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

/*---------------------CHECKBOX RESP. MANZANA-------------------------------*/

$("#selectallrm").on("click", function() {
  $(".chkrm").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".chkrm").on("click", function() {
  if ($(".chkrm").length == $(".chkrm:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});


/*---------------------CHECKBOX TODOS LOS PERMISOS-------------------------------*/

$("#selectall").on("click", function() {
  $(".case").prop("checked", this.checked);
});
// if all checkbox are selected, check the selectall checkbox and viceversa
$(".case").on("click", function() {
  if ($(".case").length == $(".case:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});


</script>
