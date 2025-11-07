<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $fillable = ['user_id','recipe_id','action','meta'];
}
