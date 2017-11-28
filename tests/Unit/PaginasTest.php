<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    
    public function testInicio()
    {
        $response = $this->get('/');
    	$this->visit('/')->see('MOHA');
    }

    public function testClickOfertas()
    {
        $this->visit('/')
             ->click('Ofertas')
             ->seePageIs('/ofertas');
    }
    
    public function testClickDemandas()
    {
        $this->visit('/')
             ->click('Demandas')
             ->seePageIs('/demandas');
    }
    
    public function testClickPrecios()
    {
        $this->visit('/')
             ->click('Precios')
             ->seePageIs('/precios');
    }

    public function testClickOperaciones()
    {
        $this->visit('/')
             ->click('Operaciones')
             ->seePageIs('/operaciones');
    }

    public function testClickOperadores()
    {
        $this->visit('/')
             ->click('Operadores')
             ->seePageIs('/operadores');
    }

}
