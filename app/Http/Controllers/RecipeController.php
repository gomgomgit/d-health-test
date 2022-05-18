<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\Signa;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        $recipes = Recipe::with('recipeDetails.drug')->orderBy('date')->paginate(25);

        return view('pages.recipes.index', compact('recipes'));
    }
    public function show($id) {
        $recipe = Recipe::with('recipeDetails.drug')->find($id);

        return view('pages.recipes.show', compact('recipe'));
    }
    public function create() {
        $drugs = Drug::all();
        $signas = Signa::all();

        return view('pages.recipes.create', compact('drugs', 'signas'));
    }
    public function store(Request $request) {
        $recipe = Recipe::create([
            'buyer' => $request->name,
            'phone' => $request->phone,
            'date' => $request->date,
            'is_concoction' => $is_concoction = $request->type == 'concoction',
            'concoction_name' => $is_concoction ? $request->concoction_name : '',
        ]);

        if ($is_concoction) {
            foreach ($request->drugs as $key => $drug) {
                $thisdrug = Drug::where('obatalkes_id', $drug['drug']);
                $thisdrug->update([
                    'stok' => $thisdrug->first()->stok - $drug['qty']
                ]);
                RecipeDetail::create([
                    'recipe_id' => $recipe->id,
                    'drug_id' => $drug['drug'],
                    'signa_id' => $drug['signa'],
                    'qty' => $drug['qty'],
                ]);
            }
        } else {
            $thisdrug = Drug::where('obatalkes_id', $request->drug);
            $thisdrug->update([
                'stok' => ($thisdrug->first()->stok - $request->qty)
            ]);
            RecipeDetail::create([
                'recipe_id' => $recipe->id,
                'drug_id' => $request->drug,
                'signa_id' => $request->signa,
                'qty' => $request->qty,
            ]);
        }

        return redirect()->route('recipes.index');
    }
}
