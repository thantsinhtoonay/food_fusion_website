<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller {
  public function accept(Request $req){
    return redirect()->back()->withCookie(cookie('ff_cookies_accepted', '1', 60*24*365));
  }
}
