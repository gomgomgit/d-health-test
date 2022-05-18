<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function index() {
        $drugs = Drug::paginate(25);

        return view('pages.drugs.index', compact('drugs'));
    }
}
