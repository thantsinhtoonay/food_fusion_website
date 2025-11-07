<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FailedLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegister(){ return view('auth.register'); }
    public function showLogin(){ return view('auth.login'); }

    public function register(Request $req){
        $req->validate([
            'first_name'=>'nullable|string|max:50',
            'last_name'=>'nullable|string|max:50',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|confirmed'
        ]);

        $user = User::create([
            'first_name'=>$req->first_name,
            'last_name'=>$req->last_name,
            'name'=>trim(($req->first_name.' '.$req->last_name)) ?: null,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('success','Account created.');
    }

    public function login(Request $req){
        $req->validate(['email'=>'required|email','password'=>'required']);
        $email = strtolower($req->email);
        $ip = $req->ip();

        $record = FailedLogin::firstOrCreate(['email'=>$email], ['ip_address'=>$ip,'attempts'=>0]);

        if ($record->locked_until && Carbon::now()->lessThan($record->locked_until)) {
            $sec = Carbon::now()->diffInSeconds($record->locked_until);
            return back()->withErrors(['email'=>"Account locked. Try again in {$sec} seconds."]);
        }

        $user = User::where('email',$email)->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            $record->attempts += 1;
            $record->last_attempt = Carbon::now();
            if ($record->attempts >= 3) $record->locked_until = Carbon::now()->addMinutes(3);
            $record->save();
            $remaining = max(0, 3 - $record->attempts);
            $msg = $remaining > 0 ? "Invalid credentials. {$remaining} attempt(s) left." : "Account locked for 3 minutes.";
            return back()->withErrors(['email'=>$msg]);
        }

        $record->attempts = 0; $record->locked_until = null; $record->save();

        Auth::login($user);
        $req->session()->regenerate();
        return redirect()->route('home')->with('success','Logged in.');
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('home');
    }
}
