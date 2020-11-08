<?php

namespace SIRVOTO\Http\Controllers;

use SIRVOTO\Electores;
use SIRVOTO\ResponsableSeccion;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Ui\Presets\React;
use SIRVOTO\Simpatizantes;
use SIRVOTO\User;
use SIRVOTO\UserRole;

class ResponsableSeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create-resp_seccion')->only(['create','store']);
        $this->middleware('role_or_permission:read-resp_seccion')->only(['index','show']);
        $this->middleware('role_or_permission:update-resp_seccion')->only(['edit','update']);
        $this->middleware('role_or_permission:delete-resp_seccion')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $resp_seccion = ResponsableSeccion::select(['id','nombre','paterno','materno','seccion_electoral']);
            return Datatables::of($resp_seccion)
            ->editColumn('nombre', function($resp_seccion) {
                return  $resp_seccion->nombre .' '. $resp_seccion->paterno .' '. $resp_seccion->materno;
            })
            ->addColumn('seccion_electoral', function($resp_seccion) {
                 return '<h6><a href="' . route('secciones.show', $resp_seccion->seccion_electoral) . '">'. $resp_seccion->seccion_electoral .'</a></h6>';
                })
                ->rawColumns(['seccion_electoral','action'])
            ->addColumn('action', function ($resp_seccion) {
                $actions = '';
                $user = Auth()->user();
                if ($user->can('read-resp_seccion')) {
                    $actions .= '<a href="' . route('rs.show', $resp_seccion->id) . '"
                     class="btn btn-sm btn-info" style="margin: 10px;"
                     data-id="'.$resp_seccion->id.'"
                     data-original-title="Detalles">
                     <i class="fas fa-info-circle"></i>
                     </a>';
                  }
               /* if ($user->can('update-resp_seccion')) {
                  $actions .= '<a  style="" href="' . route('rs.edit', $resp_seccion->id) . '"
                  data-id="'.$resp_seccion->id.'"
                   class="btn btn-sm btn-warning " style="margin: 10px"
                   title="Editar">
                   <i class="fas fa-pencil-alt "></i>
                   </a>';
                }
                if ($user->can('delete-resp_seccion')) {
                    $actions .=   '<form style="margin: 10px" class="form-inline float-right" action="'. route('rs.destroy', $resp_seccion->id).'
                    " method="post">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit"  name="delete" id="'.$resp_seccion->id.'"
                    class="btn btn-sm btn-danger  "><i class="fas fa-trash"></i></button></form>';
                  }*/
                  return $actions;
            })
            ->make([true])
            ;
             }
      return view('resp_seccion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nombre = $request->get('nombre');
        $paterno = $request->get('paterno');
        $materno = $request->get('materno');
        //return $elect;
        $secciones = Electores::select('seccion')
                            ->groupBy('seccion')
                            ->get();
        $manzanas = Electores::select('manzana')
                            ->groupBy('manzana')->get();
        if(isset($nombre)){
            $search = Electores::orderBy('id', 'DESC')
            ->nombre($nombre)
            ->paterno($paterno)
            ->materno($materno)->first();
                if(!isset($search)){
                    $search = new Electores();
                    return view('resp_seccion.responsable', compact('search','secciones','manzanas'))->with('info','Usuario encontrado');
                }
            return view('resp_seccion.responsable', compact('search','secciones','manzanas'))->withSuccess('info','Usuario encontrado');
        }
        else{
            $search = new Electores();
            return view('resp_seccion.responsable', compact('search','secciones','manzanas'))->withSuccess('info','Usuario encontrado');
        }
    }


    public function getSecMan(Request $request)
    {
        $seccion = $request->seccion;
        $manzanas = Electores::getSec_Man($seccion);
        return response()->json([
            'manzanas' => $manzanas
        ]);
    }

    public function getResponsable(Request $request)
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $rs = ResponsableSeccion::create($request->all());

        $simpatizante = Simpatizantes::create($request->all());

        $user = new User;
        $user->name = $request->nombre .' '. $request->paterno .' '. $request->materno;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->save();
        if($user->save())
        {
            $user->assignRole('responsable-seccion');
            $user->sendEmailVerificationNotification();
            //$user->roles()->attach($request->get('roles'));
        }
            return redirect()->route('rs.index')->with('success','Responsable creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SIRVOTO\ResponsableSeccion  $responsableSeccion
     * @return \Illuminate\Http\Response
     */
    public function show($responsableSeccion)
    {
       // $response = ResponsableSeccion::findOrFail($request->userid);
       // return response()->json([
         //   'response' => $response
        //]);
        $responsable = ResponsableSeccion::findOrFail($responsableSeccion);
        return view('resp_seccion.show', compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIRVOTO\ResponsableSeccion  $responsableSeccion
     * @return \Illuminate\Http\Response
     */
    public function edit( $responsableSeccion)
    {
         //$response = ResponsableSeccion::findOrFail($responsableSeccion);
        //return response()->json([
          //  'response' => $response
        //]);
       $secciones = Electores::select('seccion')
                  ->groupBy('seccion')
                   ->get();
        $manzanas = Electores::select('manzana')
                    ->groupBy('manzana')
                    ->get();
        $responsable = ResponsableSeccion::findOrFail($responsableSeccion);
        return view('resp_seccion.edit', compact('responsable','secciones','manzanas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIRVOTO\ResponsableSeccion  $responsableSeccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $responsableSeccion)
    {
        $responsableSeccion = ResponsableSeccion::findOrFail($responsableSeccion);
        $responsableSeccion->update($request->all());
        $responsableSeccion->save();
        return redirect()->route('rs.index')->with('update', 'Responsable de Seccion Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIRVOTO\ResponsableSeccion  $responsableSeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($responsableSeccion)
    {
      //  return $user = UserRole::where('model_id',$responsableSeccion)->get();
        $responsableSeccion = ResponsableSeccion::find($responsableSeccion);
        //return $roles = ->getRoleNames();
        $responsableSeccion->removeRole();

        $responsableSeccion->delete();

        // redirect
       // Session::flash('message', 'Successfully deleted the shark!');
        return Redirect::to('rs')->with('destroy', 'Responsable de seccion Eliminado');
    }
}
