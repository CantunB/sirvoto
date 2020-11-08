<?php

namespace SIRVOTO\Http\Controllers;

use SIRVOTO\Electores;
use SIRVOTO\Anfitriones;
use SIRVOTO\ResponsableSeccion;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnfitrionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create-anfitriones')->only(['create','store']);
        $this->middleware('role_or_permission:read-anfitriones')->only(['index','show']);
        $this->middleware('role_or_permission:update-anfitriones')->only(['edit','update']);
        $this->middleware('role_or_permission:delete-anfitriones')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $anfitriones = Anfitriones::select(['id','nombre','paterno','materno','calle','colonia','seccion','manzana','celular','identificacion']);
            return Datatables::of($anfitriones)
            ->addColumn('action', function ($anfitriones) {
                $actions = '';
                $user = Auth::user();
                if ($user->can('update-anfitriones')) {
                  $actions .= '<a href="' . route('anfitriones.edit', $anfitriones->id) . '"
                  data-id="'.$anfitriones->id.'"
                   class="btn btn-sm btn-warning"
                   title="Editar">
                   <i class="fas fa-pencil-alt "></i>
                   </a>';
                }
                if ($user->can('delete-anfitriones')) {
                    $actions .=   '<form class="form-inline float-right" action="'. route('anfitriones.destroy', $anfitriones->id).'
                    " method="post">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="submit"  name="delete" id="'.$anfitriones->id.'"
                    class="btn btn-sm btn-danger  "><i class="fas fa-trash"></i></button></form>';
                  }
                return $actions;
            })
            ->make(true);
             }
        return view('anfitriones.index');
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
            $anfitrion = Electores::orderBy('id', 'DESC')
            ->nombre($nombre)
            ->paterno($paterno)
            ->materno($materno)->first();
                if(!isset($anfitrion)){
                    $anfitrion = new Electores();
                    return view('anfitriones.anfitriones', compact('anfitrion','secciones','manzanas'));
                }
            return view('anfitriones.anfitriones', compact('anfitrion','secciones','manzanas'));
        }
        else{
            $anfitrion = new Electores();
            return view('anfitriones.anfitriones', compact('anfitrion','secciones','manzanas'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $anfitriones = Anfitriones::create($request->all());
        return redirect()->route('anfitriones.index')->with('success','Responsable creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SIRVOTO\Anfitriones  $anfitriones
     * @return \Illuminate\Http\Response
     */
    public function show(Anfitriones $anfitriones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIRVOTO\Anfitriones  $anfitriones
     * @return \Illuminate\Http\Response
     */
    public function edit($anfitriones)
    {
        $secciones = Electores::select('seccion')
                                ->groupBy('seccion')
                                ->get();
        $manzanas = Electores::select('manzana')
                                ->groupBy('manzana')
                                ->get();
        $anfitrion  = Anfitriones::findOrFail($anfitriones);
        return view('anfitriones.edit', compact('anfitrion','secciones','manzanas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIRVOTO\Anfitriones  $anfitriones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $anfitriones)
    {
        $anfitrion = Anfitriones::find($anfitriones)->update($request->all());
        return redirect()->route('anfitriones.index')->with('update', 'Anfitrion Actualizado' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIRVOTO\Anfitriones  $anfitriones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anfitriones $anfitriones)
    {
        //
    }
}
