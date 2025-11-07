<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function send(Request $req){
        $req->validate(['name'=>'required','email'=>'required|email','message'=>'required|min:5']);
        DB::table('contacts')->insert([
            'name'=>$req->name,'email'=>$req->email,'subject'=>$req->subject,'message'=>$req->message,'created_at'=>now(),'updated_at'=>now()
        ]);
        return redirect()->route('contact')->with('success','Message sent.');
    }
}
