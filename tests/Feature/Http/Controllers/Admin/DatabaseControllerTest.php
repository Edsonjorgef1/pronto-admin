<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\VoyagerDatabaseSeeder;
use Database\Seeders\VoyagerDummyDatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\Requests\CreateTable;
use Tests\Support\Fixtures\CreateTablePayloads;
use Tests\TestCase;

class DatabaseControllerTest extends TestCase
{

    public function getCurrentTableList()
    {
        return DB::connection()->getDoctrineSchemaManager()->listTableNames();
    }

    public function testExample()
    {
        $this->artisan('migrate:fresh', ['--seed' => true]);

        $this->withoutExceptionHandling();
        $this->actingAs(User::query()->find(1));

        $tableToBeCreated = 'expenses';

        $this->assertNotContains($tableToBeCreated, $this->getCurrentTableList());
        $response = $this->post('/admin/database', ['table' => CreateTablePayloads::simpleTable()]);
        ray($response->content(), $response->headers);

        $this->assertContains($tableToBeCreated, $this->getCurrentTableList());
    }
}
