<?php

use App\Demande;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListeDemandesTest extends TestCase
{
    use DatabaseMigrations;

    /** @var  User */
    protected $user;

    public function testJePeuxVoirLaPageListeDesDemandes()
    {
        $this->actingAs($this->user);
        $this->visit('/demandes')->see('Liste de demande');
    }

    public function testJePeuxVoirLaListeDesDemandes()
    {
        $this->actingAs($this->user);
        factory(Demande::class)->create([
            'raison' => 'Une bonne raison'
        ]);
        $this->visit('/demandes')->see('Une bonne raison');
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }
}
