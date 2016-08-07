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
        $this->user = factory(User::class)->create([
            'admin' => true
        ]);
    }
}
