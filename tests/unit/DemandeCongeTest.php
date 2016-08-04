<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DemandeCongeTest extends TestCase
{
    public function testJeNePasFaireUneDemandeVide()
    {
        $demandeRequest = new \App\Http\Requests\DemandeRequest();
        $this->assertFalse(Validator::make([], $demandeRequest->rules())->passes());
    }
}
