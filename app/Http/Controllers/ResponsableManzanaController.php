<?php

namespace SIRVOTO\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use SIRVOTO\Electores;
use SIRVOTO\ResponsableManzana;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

class ResponsableManzanaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create-resp_manzana')->only(['create','store']);
        $this->middleware('role_or_permission:read-resp_manzana')->only(['index','show']);
        $this->middleware('role_or_permission:update-resp_manzana')->only(['edit','update']);
        $this->middleware('role_or_permission:delete-resp_manzana')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $resp_manzana = ResponsableManzana::select(['id','nombre','paterno','materno','seccion_electoral','manzanas']);
            return Datatables::of($resp_manzana)
            ->editColumn('nombre', function($resp_seccion) {
                return  $resp_seccion->nombre .' '. $resp_seccion->paterno .' '. $resp_seccion->materno;
            })
            ->editColumn('seccion_electoral', function($resp_seccion) {
                return '<h6><a href="' . route('secciones.show', $resp_seccion->seccion_electoral) . '">'. $resp_seccion->seccion_electoral .'</a></h6>';
               })
            ->editColumn('manzanas', function($resp_manzana) {
               // return '<h6><a href="' . route('secciones.show', $resp_manzana->manzanas) . '">'. $resp_manzana->manzanas .'</a></h6>';

                $manzanas = explode(',', $resp_manzana->manzanas);
                foreach ($manzanas as $key => $value) {
                  //$manzanas = '<h6><a href="' . route('secciones.show', $value[$key]) . '">'. $value[$key] .'</a></h6>';
                   $value;
                }
             return  $manzanas = '<h6><a href="' . route('secciones.show', $value) . '">'. $value .'</a></h6>';
               // $manzanas = collect($resp_manzana->manzanas)->explode(',');
            })
               ->rawColumns(['seccion_electoral','manzanas','action'])
            ->addColumn('action', function ($resp_manzana) {
                $actions = '';
                $user = Auth::user();
                if ($user->can('read-resp_manzana')) {
                    $actions .= '<a href="' . route('rm.show', $resp_manzana->id) . '"
                     class="btn btn-sm btn-info" style="margin: 10px;"
                     data-id="'.$resp_manzana->id.'"
                     data-original-title="Detalles">
                     <i class="fas fa-info-circle"></i>
                     </a>';
                  }
               /* if ($user->can('update-resp_manzana')) {
                  $actions .= '<a style="display: inline;" href="' . route('rm.edit', $resp_manzana->id) . '"
                   class="btn btn-sm btn-warning"
                   title="Editar">
                   <i class="fas fa-pencil-alt "></i>
                   </a>';
                }
                if ($user->can('delete-resp_manzana')) {
                    $actions .=
                    '<form class="float-right" action="'. route('rm.destroy', $resp_manzana->id).'
                            " method="post">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button style="display: inline;" type="submit"  name="delete" id="'.$resp_manzana->id.'"
                            class="btndelete btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                            </button></form>';
                  }*/
                return $actions;
            })
            ->make(true);
        }
        return view('resp_manzana.index');
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
        // return  $nombre.$paterno;
            $responsable = Electores::orderBy('id', 'DESC')
            ->nombre($nombre)
            ->paterno($paterno)
            ->materno($materno)->first();
                if(!isset($responsable)){
                    $responsable = new Electores();
                    return view('resp_manzana.responsable', compact('responsable','secciones','manzanas'));
                }
            return view('resp_manzana.responsable', compact('responsable','secciones','manzanas'));
        }
        else{
            $responsable = new Electores();
            return view('resp_manzana.responsable', compact('responsable','secciones','manzanas'));
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


    public function getManzanas(Request $request)
    {
        $seccion = $request->seccion;
       // $manzanas =  Electores::select('manzana')
         //               ->where('seccion', $seccion)
           //             ->groupBy('manzana')
             //           ->get();

        $manzanas = Electores::getManzanas($seccion);
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
      //  return $request;
     $rm = new ResponsableManzana;

      /* Realizamos la asignación masiva */
      $rm->nombre = $request->nombre;
      $rm->paterno = $request->paterno;
      $rm->materno = $request->materno;
      $rm->calle = $request->calle;
      $rm->num_exterior = $request->num_exterior;
      $rm->colonia = $request->colonia;
      $rm->seccion = $request->seccion;
      $rm->manzana = $request->manzana;
      $rm->celular = $request->celular;
      $rm->email = $request->email;
      $rm->facebook = $request->facebook;
      $rm->seccion_electoral = $request->seccion_electoral;
      $rm->manzanas = implode(",", $request->manzanas);
      $rm->user_id = $request->user_id;
      $rm->created_at = now();
      $rm->save();
      /**
       * Se repite con los demás datos que desees asignar... */


        return redirect()->route('rm.index')->with('success','Responsable almacenado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SIRVOTO\ResponsableManzana  $responsableManzana
     * @return \Illuminate\Http\Response
     */
    public function show($responsable)
    {
        $responsable  = ResponsableManzana::findOrFail($responsable);
        return view('resp_manzana.show', compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIRVOTO\ResponsableManzana  $responsableManzana
     * @return \Illuminate\Http\Response
     */
    public function edit($responsableManzana)
    {
        $secciones = Electores::select('seccion')
                                ->groupBy('seccion')
                                ->get();
        $manzanas = Electores::select('manzana')
                                ->groupBy('manzana')
                                ->get();
        $responsable  = ResponsableManzana::findOrFail($responsableManzana);
        return view('resp_manzana.edit', compact('responsable','secciones','manzanas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIRVOTO\ResponsableManzana  $responsableManzana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $responsableManzana)
    {
       // return $request->all();
       //libro::find($id)->update($request->all());

    /*
    $responsableManzana = ResponsableManzana::findOrFail($responsableManzana);
        $responsableManzana->update($request->all());
        $responsableManzana->manzanas = implode(",", $request->manzanas);
        $responsableManzana->save();
    */

        $responsableManzana = ResponsableManzana::find($responsableManzana);
        $responsableManzana->update([
            $responsableManzana->nombre = $request->nombre,
            $responsableManzana->paterno = $request->paterno,
            $responsableManzana->materno = $request->materno,
            $responsableManzana->calle = $request->calle,
            $responsableManzana->num_exterior = $request->num_exterior,
            $responsableManzana->colonia = $request->colonia,
            $responsableManzana->seccion = $request->seccion,
            $responsableManzana->manzana = $request->manzana,
            $responsableManzana->celular = $request->celular,
            $responsableManzana->email = $request->email,
            $responsableManzana->facebook = $request->facebook,
            $responsableManzana->seccion_electoral = $request->seccion_electoral,
            $responsableManzana->manzanas = implode(",", $request->manzanas),
            $responsableManzana->updated_at = now()
        ]);

        return redirect()->route('rm.index')->with('update', 'Responsable de Manzana Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIRVOTO\ResponsableManzana  $responsableManzana
     * @return \Illuminate\Http\Response
     */
    public function destroy($responsableManzana)
    {
        $rm = ResponsableManzana::find($responsableManzana);
        $rm->delete();
        return Redirect::to('rm')->with('destroy','Responsable Eliminado');
    }
}
