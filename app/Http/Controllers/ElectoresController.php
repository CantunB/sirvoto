<?php

namespace SIRVOTO\Http\Controllers;

use SIRVOTO\Electores;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class ElectoresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create-electores')->only(['create','store']);
        $this->middleware('role_or_permission:read-electores')->only(['index','show']);
        $this->middleware('role_or_permission:update-electores')->only(['edit','update']);
        $this->middleware('role_or_permission:delete-electores')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {if ($request->ajax()) {
        $electores = Electores::select(['id','nombre','apellido_paterno','apellido_materno','municipio','manzana','colonia']);
        return Datatables::of($electores)
        ->make(true);
        }
        return view('electores.index');
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
     * @param  \SIRVOTO\Electores  $electores
     * @return \Illuminate\Http\Response
     */
    public function show(Electores $electores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SIRVOTO\Electores  $electores
     * @return \Illuminate\Http\Response
     */
    public function edit(Electores $electores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SIRVOTO\Electores  $electores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electores $electores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SIRVOTO\Electores  $electores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electores $electores)
    {
        //
    }
}
