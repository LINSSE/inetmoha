<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Chumper\Zipper\Zipper;

class DescomprimirArchivo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'descomprimir:archivo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Descargar y descomprimir archivo excel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*Obtener ultimo archivo de precios Mayoristas de Productos Horticolas
        del Mercado de Buenos Aires*/
        
        $ch = curl_init();
        $source = "http://www.mercadocentral.gob.ar/sites/default/files/precios_mayoristas/PM-Hortalizas-17-Oct-2017.zip"; // URL del archivo a descargar
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec ($ch);
        curl_close ($ch);
        
        // Guardar archivo
        $date = date("d-m-Y");
        $destination = "precios-" . $date . ".zip"; //Formato de nombre: precios-25-10-2017.zip
        $file = fopen($destination, "w+");
        fputs($file, $data);
        fclose($file);

        //Descomprimir
        $zipper = new Zipper();
        $zipper->make($destination)->extractTo('public/recursos'); //Descomprimo en /public/recursos
        $res = $zipper->getStatus();
        if($res != 'No error'){
            echo 'Ocurrio un error al descomprimir.';
            echo $res;
            redirect('/');
        }
        
        $zipper->close();
        unlink($destination); //Elimino el .zip
    }
}
