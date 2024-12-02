<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //TODO: theater, room, seat
        require 'theater_room_seat.php';
        //TODO: User
        require 'user.php';

        //TODO: Create Role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'user']);

        //TODO:Permissions
        require 'permissions.php';
        $permission = Permission::all();
        //TODO: Set role for admin with id 1
        $user = User::find(1);
        $user->assignRole('admin');
        //TODO: Set permissions for admin with id 1
        $user->givePermissionTo($permission);

        //TODO: Set role for user
        $user = User::find(2);
        $user->assignRole('user');

        //TODO: Set role for user
        $user = User::find(3);
        $user->assignRole('user');

        //TODO: Movie Genre
        require 'movie_genre.php';

        //TODO: Rated
        require 'rating.php';



        //TODO: Directors
        require 'director.php';

        //TODO: Casts
        require 'cast.php';

        //TODO: Film
        require 'film.php';

        //TODO: Film Upcomming
        require 'film_upcoming.php';

        //TODO: Film Upcomming
        require 'banner.php';

        //TODO: Film Event
        require 'event.php';

        //TODO: Film News
        require 'news.php';

        //TODO: Prices
        require 'prices.php';

        //TODO: Info
        require 'info.php';
    }
}
