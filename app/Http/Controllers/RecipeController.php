<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::latest()->paginate(9);
        return view('recipes.index', compact('recipes'));
    }

    public function create(){ return view('recipes.create'); }

    public function store(Request $req){
        $req->validate([
            'title'=>'required|string|max:255',
            'difficulty'=>'required|in:easy,medium,hard',
        ]);
        $data = $req->only(['title','description','ingredients','instructions','difficulty','cuisine','dietary']);
        $data['user_id'] = Auth::id();
        Recipe::create($data);
        return redirect()->route('recipes.index')->with('success','Recipe added.');
    }

    public function show($id){ $r = Recipe::findOrFail($id); return view('recipes.show', compact('r')); }

    public function edit($id){ $r = Recipe::findOrFail($id); return view('recipes.edit', compact('r')); }

    public function update(Request $req, $id){
        $r = Recipe::findOrFail($id);
        $r->update($req->only(['title','description','ingredients','instructions','difficulty','cuisine','dietary']));
        return redirect()->route('recipes.index')->with('success','Recipe updated.');
    }

    public function destroy($id){
        Recipe::findOrFail($id)->delete();
        return redirect()->route('recipes.index')->with('success','Recipe deleted.');
    }
}
