<?php

namespace Tests\Feature;

use App\Models\Office;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class OfficeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use WithoutMiddleware;

    public function testShowOffice()
    {
        $office = Office::get()->random();

        $response = $this->get(route('offices.show', $office->id));

        $response->assertViewIs('Centaur::offices.show');

        $response->assertViewHas('office');

        /* $returnedOffice = $response->original->office;
        $this->assertEquals($office->id, $returnedOffice->id, "The returned office is different from the one we requested"); */
    }
}
