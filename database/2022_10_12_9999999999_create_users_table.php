<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
//php artisan make:migration create_allocation_municples_table
    php artisan krlove:generate:model JournalMembers --table-name=journal_members
    php artisan krlove:generate:model user --table-name=users
php artisan krlove:generate:model Category --table-name=categories
php artisan krlove:generate:model Material --table-name=materials
php artisan krlove:generate:model Subplaylist --table-name=subplaylists
php artisan krlove:generate:model Link --table-name=links
php artisan krlove:generate:model Project --table-name=projects
php artisan krlove:generate:model Material_playlist --table-name=materials_playlists
php artisan krlove:generate:model Billing --table-name=billings
$2y$10$fA8uqm0zXkD8w.vCmP.Qhenbtkx2b/7CjYjIhzPwn.vT4/cG/gEbG

*/
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cn_title');
            $table->string('contact_type');
            $table->string('fax');
            $table->string('zip_code');
            $table->string('city');
            $table->string('degree');
            $table->string('gender');
            $table->string('speciality');
            $table->string('mobile');
            $table->string('sp_code');
            $table->unsignedBigInteger('role_id');
            $table->longText('cv')->nullable();
            $table->string('phone');
            $table->text('img');
            $table->string('address');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

        });

    }


}

?>
