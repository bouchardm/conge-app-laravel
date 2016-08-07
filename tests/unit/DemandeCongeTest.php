<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DemandeCongeTest extends TestCase
{
    use WithoutMiddleware;

    public function testJeNePeuxPasFaireUneDemandeVide()
    {
        $demandeRequest = new \App\Http\Requests\PostDemandeRequest();
        $this->assertFalse(Validator::make([], $demandeRequest->rules())->passes());
    }
}
