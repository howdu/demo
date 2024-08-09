<?php

namespace Tests\Feature;

use App\Livewire\Form;
use Tests\TestCase;

use Livewire\Livewire;

class FormTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        Livewire::test(Form::class)
            ->assertStatus(200)
            ->callAction('testAction', arguments: ['foo' => 'bar']);
    }
}
