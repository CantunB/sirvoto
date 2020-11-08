<?php

namespace SIRVOTO\Http\Controllers;

use SIRVOTO\Anfitriones;
use SIRVOTO\Electores;
use SIRVOTO\Simpatizantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
class SimpatizantesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create-simpatizantes')->only(['create','store']);
        $this->middleware('role_or_permission:read-simpatizantes')->only(['index','show']);
        $this->middleware('role_or_permission:update-simpatizantes')->only(['edit','update']);
        $this->middleware('role_or_permission:delete-simpatizantes')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(Auth::user()->hasRole('super-admin'))
            {
                $simpatizantes = Simpatizantes::select(['id','nombre','paterno','materno','anfitrion_id','identificacion']);
            }else{
            $simpatizantes = Simpatizantes::select(['id','nombre','paterno','materno','anfitrion_id','identificacion'])
                ->where('user_id',Auth::user()->id);
            }
            return Datatables::of($simpatizantes)
            ->editColumn('nombre', function($simpatizantes) {
                return  $simpatizantes->nombre .' '. $simpatizantes->paterno .' '. $simpatizantes->materno;
            })
            ->addColumn('anfitrion', function( $simpatizantes) {
               if (isset( $simpatizantes->anfitriones->nombre)) {
                return '' . $simpatizantes->anfitriones->nombre . ' ';
               } else{
                   return 'No existe anfitrion';
               }
            })
            ->addColumn('identificacion', function( $simpatizantes) {
               if (isset( $simpatizantes->anfitriones->nombre)) {
                return '' . $simpatizantes->identificacion. ' ';
               } else{
                   return 'No existe identificacion';
               }
            })
            ->addColumn('action', function ($simpatizantes) {
                $actions = '';
                $user = Auth::user();
                if ($user->can('read-simpatizantes')) {
                    $actions .= '<a href="' . route('simpatizantes.show', $simpatizantes->id) . '"
                     class="btn btn-sm btn-info" style="margin: 10px;"
                     data-id="'.$simpatizantes->id.'"
                     data-original-title="Detalles">
                     <i class="fas fa-info-circle"></i>
                     </a>';
                  }
             /*   if ($user->can('update-simpatizantes')) {
                  $actions .= '<a href="' . route('simpatizantes.edit', $simpatizantes->id) . '"
                  data-id="'.$simpatizantes->id.'"
                   class="btn btn-sm btn-warning"
                   title="Editar">
                   <i class="fas fa-pencil-alt "></i>
                   </a>';
                }
                if ($user->can('delete-simpatizantes')) {
                    $actions .=
                    '<form class="float-right" action="'. route('simpatizantes.destroy', $simpatizantes->id).'
                            " method="post">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit"  name="delete" id="'.$simpatizantes->id.'"
                            class="btndelete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></form>';
                }*/
                return $actions;
            })
            ->make(true);
            }
        return view('simpatizantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
                $anfitriones = Anfitriones::all();
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
                    $simpatizante = Electores::orderBy('id', 'DESC')
                    ->nombre($nombre)
                    ->paterno($paterno)
                    ->materno($materno)->first();
                        if(!isset($simpatizante)){
                            $simpatizante = new Electores();
                            return view('simpatizantes.simpatizantes', compact('simpatizante','anfitriones','secciones','manzanas'));
                        }
                    return view('simpatizantes.simpatizantes', compact('simpatizante','anfitriones','secciones','manzanas'));
                }
                else{
                    $simpatizante = new Electores();
                    return view('simpatizantes.simpatizantes', compact('simpatizante','anfitriones','secciones','manzanas'));
                }
      //      }
    }

    public function getSecMan(Request $request)
    {
        $seccion = $request->seccion;
        $manzanas = Electores::getSec_Man($seccion);
        return response()->json([
            'manzanas' => $manzanas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $simpatizantes = Simpatizantes::create($request->all());
        return redirect()->route('simpatizantes.index')->with('success','Simpatizante creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SIRVOTO\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function show( $simpatizantes)
    {
        $simpatizante  = Simpatizantes::findOrFail($simpatizantes);
        return view('simpatizantes.show', compact('simpatizante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIRVOTO\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function edit( $simpatizantes)
    {
        $anfitriones = Anfitriones::all();
        $secciones = Electores::select('seccion')
                                ->groupBy('seccion')
                                ->get();
        $manzanas = Electores::select('manzana')
                                ->groupBy('manzana')
                                ->get();
        $simpatizante  = Simpatizantes::findOrFail($simpatizantes);
        return view('simpatizantes.edit', compact('simpatizante','anfitriones','secciones','manzanas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIRVOTO\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $simpatizantes)
    {
        //return $request->all();
       $simpatizante = Simpatizantes::find($simpatizantes)->update($request->all());
       return redirect()->route('simpatizantes.index')->with('update', 'Simpatizante Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIRVOTO\Simpatizantes  $simpatizantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($simpatizantes)
    {
        $simpatizantes = Simpatizantes::find($simpatizantes);
        $simpatizantes->delete();

        return Redirect::to('simpatizantes')->with('destroy', 'Simpatizante Eliminado');
    }
}
