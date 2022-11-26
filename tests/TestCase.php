<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'recipe-list',
            'recipe-create',
            'recipe-edit',
            'recipe-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'comment-list',
            'comment-approve-reject',
            'comment-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);
    }

    /**
     * Return an admin user
     *
     * @return User $admin
     */
    protected function admin($overrides = [])
    {
        $admin = $this->user($overrides);

        $admin->assignRole('Admin');

        return $admin;
    }

    /**
     * Return an user
     *
     * @return User
     */
    protected function user($overrides = [])
    {
        return User::factory()->create($overrides);
    }

    /**
     * Acting as an admin
     */
    protected function actingAsAdmin($api = null)
    {
        $this->actingAs($this->admin(), $api);

        return $this;
    }
}
