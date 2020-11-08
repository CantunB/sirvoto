<?php

namespace SIRVOTO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
class RolesController extends Controller
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
    {   if ($request->ajax()) {
        $roles = Role::select(['id','name','created_at']);
        return Datatables::of($roles)
        ->addColumn('action', function ($roles) {
            $actions = '';
            $user = Auth::user();
            if ($user->can('update-roles')) {
                $actions .= '
                <a href="' . route('roles.edit', $roles->id) . '"
                data-id="'.$roles->id.'"
                 class="btn btn-sm btn-warning"
                 title="Editar" >
                 <i class="fas fa-pencil-alt "></i>
                 </a>';
            }
            return $actions;
        })
        ->make(true);
        }
        return view('roles.index');
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
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
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
       // return $request->all();
        $role = Role::findOrFail($id);
     //   $role->update($request->all());

        //$role->permissions()->sync($request->get('permission'));
        //$role->givePermissionTo($request->get('permission'))  ;
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')->with('update','Role actualizado correctamente');
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
