<?php

namespace SIRVOTO\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SIRVOTO\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SIRVOTO\User;
use Yajra\Datatables\Datatables;
class UsuariosRoles extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create-roles')->only(['create','store']);
        $this->middleware('role_or_permission:read-roles')->only(['index','show']);
        $this->middleware('role_or_permission:update-roles')->only(['edit','update']);
        $this->middleware('role_or_permission:delete-roles')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $user_role = UserRole::select(['role_id','model_id']);
            return Datatables::of($user_role)
            ->editColumn('role_id', function( $user_role) {
               return ' ' . $user_role->getRole->name . ' ';
           })
           ->editColumn('model_id', function( $user_role) {
            return ' ' . $user_role->getUser->name . ' ';
           // decrypt($encryptedValue)
            })
            ->addColumn('correo', function($user_role) {
                return ''.$user_role->getUser->email .'';
               })
            ->addColumn('action', function ($user_role) {
                $actions = '';
                $user = Auth::user();
                if ($user->can('update-roles')) {
                  $actions .= '<a href="' . route('usuarios-roles.edit', $user_role->model_id) . '"
                  data-id="'.$user_role->id.'"
                   class="btn btn-sm btn-warning"
                   title="Editar">
                   <i class="fas fa-pencil-alt "></i>
                   </a>';
                }
                if ($user->can('delete-roles')) {
                    $actions .=
                    '<form class="float-right" action="'. route('usuarios-roles.destroy', $user_role->model_id).'
                            " method="post">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit"  name="delete" id="'.$user_role->id.'"
                            class="btndelete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></form>';
                }
                return $actions;
            })
            ->make(true);
            }
        return view('user-roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($model_id)
    {
        $roles = User::find($model_id);
        $permisos = Permission::all();

        return view('roles.edit', compact('roles','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
