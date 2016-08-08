<?php

use App\Demande;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DemandeCongeIntegrationTest extends TestCase
{
    use DatabaseMigrations;

    /** @var User */
    protected $user;

    public function testConnexion()
    {
        $this->actingAs($this->user);

        $this->visit('/demande')
            ->see('Demande de congé');
    }

    public function testJePeuxFaireUneDemandeDeCongeValide()
    {
        $this->actingAs($this->user);

        $this->visit('/demande')
            ->type('Trop bu', 'raison')
            ->type('03-03-2016', 'debut')
            ->type('04-03-2016', 'fin')
            ->select('sans-solde', 'type')
            ->press('Envoyer')
            ->see('Demande envoyé!');

        $this->seeInDatabase('demandes', ['raison' => 'Trop bu']);
    }

    public function testUnAdminPeutVoirLesDemandesDeConge()
    {
        $this->user->admin = true;
        $this->actingAs($this->user);

        factory(Demande::class)->create([
            'raison' => 'une bonne raison',
            'type' => 'sans-solde',
        ]);

        $this->visit('/demandes')
             ->see('une bonne raison')
             ->see('Sans solde');
    }

    public function testUnAdminPeutApprouveUneDemande()
    {
        $this->user->admin = true;
        $this->actingAs($this->user);

        factory(Demande::class)->create([
            'raison' => 'une bonne raison'
        ]);
        $this->visit('/demandes')
             ->press('Oui')
             ->see('Demande mis à jour')
             ->seeInDatabase('demandes', ['raison' => 'une bonne raison', 'approuve' => true]);
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }
}
