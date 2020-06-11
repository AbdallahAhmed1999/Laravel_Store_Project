<?php

use App\Ability;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dashboard
        Ability::create([
            'name' => 'dashboard',
            'label' => 'Dashboard'
        ]);

        // products
        Ability::create([
            'name' => 'show-products',
            'label' => 'Show Products'
        ]);

        Ability::create([
            'name' => 'add-product',
            'label' => 'Add Product'
        ]);
        Ability::create([
            'name' => 'edit-product',
            'label' => 'Edit Product'
        ]);
        Ability::create([
            'name' => 'delete-product',
            'label' => 'Delete product'
        ]);

        // categories
        Ability::create([
            'name' => 'show-categories',
            'label' => 'Show Categories'
        ]);
        Ability::create([
            'name' => 'add-category',
            'label' => 'Add Category'
        ]);
        Ability::create([
            'name' => 'edit-category',
            'label' => 'Edit Category'
        ]);
        Ability::create([
            'name' => 'delete-category',
            'label' => 'Delete Category'
        ]);

        //Roles
        Ability::create([
            'name' => 'show-roles',
            'label' => 'Show Roles'
        ]);
        Ability::create([
            'name' => 'add-role',
            'label' => 'Add Role'
        ]);
        Ability::create([
            'name' => 'edit-role',
            'label' => 'Edit Role'
        ]);
        Ability::create([
            'name' => 'delete-role',
            'label' => 'Delete Role'
        ]);

        //Users
        Ability::create([
            'name' => 'show-users',
            'label' => 'Show Users'
        ]);
        Ability::create([
            'name' => 'edit-user-roles',
            'label' => 'Edit User roles'
        ]);
        Ability::create([
            'name' => 'delete-user',
            'label' => 'Delete User'
        ]);


        //orders
        Ability::create([
            'name' => 'show-orders-pending',
            'label' => 'Show Orders Pending'
        ]);
        Ability::create([
            'name' => 'show-orders-delivered',
            'label' => 'Show Orders Delivered'
        ]);
        Ability::create([
            'name' => 'show-orders-canceled',
            'label' => 'Show Orders Canceled'
        ]);
        Ability::create([
            'name' => 'edit-order',
            'label' => 'Edit Order'
        ]);
        Ability::create([
            'name' => 'show-single-order',
            'label' => 'Show Single Order'
        ]);

    }
}
