<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class JuegoController extends Controller {
    public function index()        { return view('juegos.index'); }
    public function elGranOrden()  { return view('juegos.el_gran_orden'); }
    public function volcanInterior(){ return view('juegos.volcan_interior'); }
    public function ritmoZen()     { return view('juegos.ritmo_zen'); }
}
