<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_can_be_submitted_and_stored(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Ada Lovelace',
            'email' => 'ada@example.com',
            'message' => 'Hello from the test suite.',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'ada@example.com',
            'name' => 'Ada Lovelace',
        ]);
    }

    public function test_admin_page_requires_authentication(): void
    {
        $response = $this->get('/admin/contacts');

        $response->assertRedirect('/login');
    }

    public function test_database_seeder_creates_a_default_admin_user(): void
    {
        $this->seed();

        $this->assertDatabaseHas('users', [
            'email' => 'admin@example.com',
        ]);
    }
}
