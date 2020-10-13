<?php

use App\Models\Access\Role\Role;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;
    use TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.permission_role_table'));

        /*
         * Assign permission to executive role
        */
        $executivePermission = [
            1,2,
            24,25,26,27, // Page
            32, // Setting
            33,34,35,36, // Blog Categories
            37,38,39,40, // Blog Tag
            41,42,43,44, // Blog
            49,50,51,52,53,54,55, // Event
            56,57,58,59,60,61,62, // Document Categories
            63,64,65,66,67,68,69, // Document
            70,71,72,73,74,75,76, // Product Category
            77,78,79,80,81,82,83, // Product
            84,85,86,87,88,89,90, // Banner
            91,92,93,94,95,96,97, // Partner

        ];
        Role::find(2)->permissions()->sync($executivePermission);

        /*
         * Assign view frontend to user role
        */
        Role::find(3)->permissions()->sync([2]);

        $this->enableForeignKeys();
    }
}
