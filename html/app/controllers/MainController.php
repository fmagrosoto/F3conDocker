<?php

/**
 * CLASE PARA GESTIONAR EL MIDDLE WARE QUE SE CARGA ENTRE LA PETICIÓN DEL USUARIO
 * Y ANTES DE QUE SE CARGUE LA PÁGINA EN EL NAVEGADOR.
 *
 * @author Fernando Magrosoto V.
 * @since 0.0.0
 * @license MIT
 * @package controller
 */

namespace controllers;

use Template;

class MainController
{
    ##################
    ## PROPIEDADES ##
    ################

    ##############
    ## MÉTODOS ##
    ############

    /**
     * MÉTODO CONSTRUCTOR
     */
    public function __construct()
    {

    }

    /**
     * MÉTODO PARA CARGAR INFORMACIÓN ANTES DE QUE SE LLAME AL MÉTODO
     * QUE CARGA LA VISTA DE LA PÁGINA
     *
     * @param $f3
     * @return void
     */
    public function beforeroute($f3): void
    {
        $f3->set('prueba', 'Probando');
    }

    /**
     * MÉTODO PARA CARGAR INFORMACIÓN DESPUÉS DE QUE SE LLAME AL MÉTODO
     * QUE CARGA LA VISTA DE LA PÁGINA
     *
     * @return void
     */
    public function afterroute(): void
    {
        // Sale una página... 🌮
        echo Template::instance()->render('/principal.html');
    }
}
