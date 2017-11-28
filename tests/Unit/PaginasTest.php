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

    public function testClickReset()
    {
        $this->visit('/login')
                ->see('Olvidó su contraseña?')
                ->click('resetpass')
                ->seePageIs('/password/reset')
                ->see('Correo Electrónico')
                ->see('Enviar el enlace para recuperar la contraseña');
    }

    public function testSendReset()
    {
        $this->visit('/password/reset')
                ->see('Correo Electrónico')
                ->type('dgabrielg_06@hotmail.com', 'email')
                ->press('reset')
                ->seePageIs('/password/reset')
                ->see('¡Te hemos enviado por correo el enlace para restablecer tu contraseña!');
    }
}
