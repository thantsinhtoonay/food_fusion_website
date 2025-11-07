<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Resource;
use App\Models\CommunityRecipe;

class DatabaseSeeder extends Seeder {
  public function run(){
    // Admin user
    User::factory()->create([
      'name'=>'Admin User',
      'first_name'=>'Admin',
      'last_name'=>'User',
      'email'=>'admin@foodfusion.local',
      'password'=>bcrypt('secret123')
    ]);

    // sample users
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

    // sample recipes
    Recipe::factory(5)->create([
            'user_id' => $user->id,
        ]);

    // sample resources
    Resource::create(['title'=>'Basic Knife Skills','type'=>'tutorial','file_path'=>'/files/knife_skills.pdf','description'=>'How to knife safely']);
    Resource::create(['title'=>'Homemade Pasta Card','type'=>'recipe_card','file_path'=>'/files/pasta_card.pdf','description'=>'Printable pasta recipe card']);

    // sample community post
    CommunityRecipe::create(['title'=>'Grandma\'s Pancake','content'=>'A simple pancake recipe from my grandma.','user_id'=>1,'status'=>'approved']);
  }
}
