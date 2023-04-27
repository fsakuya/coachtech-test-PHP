<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   */
  public function test_example(): void
  {
    $item = Contact::factory()->create();
    $response = $this->get('/api/contact');
    $response->assertStatus(200);
    $response->assertJsonFragment([
      'name' => $item->name,
      'email' => $item->email
    ]);
  }
}
