<?php

namespace SIRVOTO\Http\Controllers;

use SIRVOTO\Secciones;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Element;
use SIRVOTO\Electores;
use SIRVOTO\Simpatizantes;
use Yajra\Datatables\Datatables;
class SeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $secciones = Electores::select('seccion')
            ->groupBy('seccion')
            ->get();
            return Datatables::of($secciones)
            ->editColumn('seccion', function($secciones) {
                return'<h6><a href="' . route('secciones.show', $secciones->seccion) . '">'. $secciones->seccion .'</a></h6>';
            })
            ->addColumn('ln', function($secciones) {
             $ln = Electores::select('seccion')->groupBy('seccion')->where('seccion', $secciones->seccion)->count();
                return $ln;
            })
            ->rawColumns(['ln','seccion'])
            ->addColumn('proyeccion', function($secciones) {
                $porcentaje = '0.3';
                $ln = Electores::select('seccion')->groupBy('seccion')->where('seccion', $secciones->seccion)->count();
                $proyeccion = $ln * $porcentaje;
                return round($proyeccion, 0, PHP_ROUND_HALF_UP);
                  // return  $proyeccion;
               })
            ->addColumn('simpatizantes', function($secciones) {
            $simpatizantes = Simpatizantes::select('seccion')->groupBy('seccion')->where('seccion', $secciones->seccion)->count();
                return  $simpatizantes;
            })
            ->make(true);
            }
        return view('secciones.index');
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
     * @param  \SIRVOTO\Secciones  $secciones
     * @return \Illuminate\Http\Response
     */
    public function show(Secciones $secciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIRVOTO\Secciones  $secciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Secciones $secciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIRVOTO\Secciones  $secciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secciones $secciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIRVOTO\Secciones  $secciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secciones $secciones)
    {
        //
    }
}
