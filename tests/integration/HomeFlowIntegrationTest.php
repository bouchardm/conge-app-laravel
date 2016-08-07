<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeFlowIntegrationTest extends TestCase
{
    use DatabaseMigrations;

    public function testSurLaPageDAccueilJeVoisLeFormulaireDeConnexion()
    {
        $this->visit('/')->see('Password');
    }

    public function testJeVoisLeFormulaireDeDemandeDeCongeSurLaPageDAccueilQuandJeSuisConnecte()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);

        $this->visit('/')->see('Demande de congé');
    }
}
