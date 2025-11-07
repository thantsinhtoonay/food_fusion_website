<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FailedLogin extends Model
{
    protected $fillable = ['email','ip_address','attempts','last_attempt','locked_until'];
    protected $dates = ['last_attempt','locked_until'];
}
