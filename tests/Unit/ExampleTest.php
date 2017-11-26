<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
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
}
