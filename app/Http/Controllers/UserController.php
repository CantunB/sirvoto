<?php

namespace SIRVOTO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SIRVOTO\Http\Requests\UpdateUserRequest;
use SIRVOTO\User;
use SIRVOTO\UserRole;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create-roles')->only(['create','store']);
        $this->middleware('role_or_permission:read-roles')->only(['index']);
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
                return DataTables::of($user_role)
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
                    if ($user->can('read-roles')) {
                        $actions .= '<a href="' . route('usuarios.show', $user_role->model_id) . '"
                        data-id="'.$user_role->id.'"
                            class="btn btn-sm btn-primary"
                            title="Editar">
                            <i class="fas fa-info-circle"></i>
                            </a>';
                    }
                    return $actions;
                })
                ->make(true);
                }
            return view('usuarios.index');
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
        $user = User::findOrFail($id);
        return view('usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('edit',$user);
        $roles = Role::all();
        return view('usuarios.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
         $request->all();
        $user = User::findOrFail($id);
        $this->authorize('update',$user);

        $user->update($request->all());
        $user->syncRoles($request->roles);
            return redirect()->route('usuarios.index')->with('update', 'Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('destroy',$user);
        $roles = $user->getRoleNames();
        $user->removeRole($roles[0]);
        $user->delete();


        return redirect()->route('usuarios.index')->with('destroy', 'Usuario Eliminado');
    }

}
