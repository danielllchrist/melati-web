<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Customer::class)
            ->assertStatus(200);
    }
}
