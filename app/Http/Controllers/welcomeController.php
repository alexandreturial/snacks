<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escola;

class welcomeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $escola =  Escola::first();
    
      return view('welcome', compact('escola'));
    }

}
