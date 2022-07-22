<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoles()
    {
        $roles = Role::all();

        $this->assertEquals('user', $roles[0]->name);
        $this->assertEquals('admin', $roles[1]->name);
    }
}
