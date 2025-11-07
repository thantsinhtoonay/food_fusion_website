<?php
namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Resource;

class PageController extends Controller
{
    public function home(){
        $featured = Recipe::where('featured', true)->latest()->take(6)->get();
        $events = [
            ['title'=>'Live Pasta Workshop','date'=>'Coming soon'],
            ['title'=>'Sourdough Basics','date'=>'Coming soon'],
        ];
        return view('home', compact('featured','events'));
    }
    public function about(){ return view('about'); }
    public function contact(){ return view('contact'); }
    public function education(){
        $resources = Resource::where('type','educational_pdf')->paginate(12);
        return view('education', compact('resources'));
    }
    public function resources(){
        $resources = Resource::whereIn('type',['recipe_card','tutorial','infographic'])->paginate(12);
        return view('resources', compact('resources'));
    }
}
