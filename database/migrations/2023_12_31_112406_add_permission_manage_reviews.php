<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $manageReviewPermission = Permission::create(['name' => 'manage-reviews']);

        $editorRole = Role::where('name', 'Admin')->first();

        $editorRole->givePermissionTo($manageReviewPermission);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Permission::where('name', 'manage-reviews')->delete();
    }
};
