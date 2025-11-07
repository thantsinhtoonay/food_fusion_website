<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityRecipe;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index(){
        $recipes = CommunityRecipe::latest()->get();
        return view('community.index', compact('recipes'));
    }

    public function create(){ return view('community.create'); }

    public function store(Request $req){
        $req->validate(['title'=>'required|max:255','content'=>'required|min:10']);
        CommunityRecipe::create([
            'title'=>$req->title,
            'content'=>$req->content,
            'user_id'=>Auth::id(),
            'status'=>'pending'
        ]);
        return redirect()->route('community.index')->with('success','Submitted for review.');
    }

    public function show($id){ $r = CommunityRecipe::findOrFail($id); return view('community.show', compact('r')); }

    public function approve($id){
        $r = CommunityRecipe::findOrFail($id); $r->status='approved'; $r->save();
        return back()->with('success','Approved.');
    }

    public function reject($id){
        $r = CommunityRecipe::findOrFail($id); $r->status='rejected'; $r->delete();
        return back()->with('success','Rejected.');
    }
}
