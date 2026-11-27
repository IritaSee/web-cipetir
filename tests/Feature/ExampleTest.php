<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_homepage_marks_the_prototype_and_search_engine_directives(): void
    {
        $response = $this->get('/');

        $response->assertSee('<meta name="robots" content="noindex, nofollow">', false);
        $response->assertSee('PROTOTIPE: data pada halaman ini adalah contoh, bukan data resmi Desa Cipetir.');
        $response->assertSee('id="potensi"', false);
        $response->assertSee('id="galeri"', false);
        $response->assertDontSee('href="#"', false);

        $this->assertStringContainsString('Disallow: /', file_get_contents(public_path('robots.txt')));
    }
}
