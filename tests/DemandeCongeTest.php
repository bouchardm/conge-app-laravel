<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DemandeCongeTest extends TestCase
{
    /** @var User */
    protected $user;

    public function testConnexion()
    {
        $this->actingAs($this->user);

        $this->visit('/home')
             ->see('Demande de congé');
    }

    public function testJePeuxFaireUneDemandeDeCongeValide()
    {
        $this->actingAs($this->user);

        $this->visit('/home')
             ->type('Trop bu', 'raison')
             ->type('03-03-2016', 'debut')
             ->type('04-03-2016', 'fin')
             ->press('Envoyer')
             ->see('Demande envoyé!');
    }

    public function testJeNePasFaireUneDemandeVide()
    {
        $demandeRequest = new \App\Http\Requests\DemandeRequest();
        $this->assertFalse(Validator::make([], $demandeRequest->rules())->passes());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }


}
