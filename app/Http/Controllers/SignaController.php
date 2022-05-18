<?php

namespace App\Http\Controllers;

use App\Models\Signa;
use Illuminate\Http\Request;

class SignaController extends Controller
{

    public function index()
    {
        $signas = Signa::paginate(25);
        return view('pages.signas.index', compact('signas'));
    }
}
