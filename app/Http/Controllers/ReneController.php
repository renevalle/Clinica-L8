<?php

namespace App\Http\Controllers;

use App\Models\Rene;
use Illuminate\Http\Request;

class ReneController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }
    
    public function index()
    {
        return view('modulos.Rene');//test
    }

}
