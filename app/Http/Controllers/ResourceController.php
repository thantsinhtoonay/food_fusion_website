<?php
namespace App\Http\Controllers;

use App\Models\Resource;

class ResourceController extends Controller
{
    public function index(){
        $resources = Resource::whereIn('type',['recipe_card','tutorial','infographic'])->paginate(12);
        return view('resources.index', compact('resources'));
    }

    public function education(){
        $resources = Resource::where('type','educational_pdf')->paginate(12);
        return view('resources.education', compact('resources'));
    }
}
