<?php

/**
 * MÉTODO PARA GESTIONAR LA VISTA DE PORTADA
 *
 * @author Fernando Magrosoto V.
 * @since 0.0.0
 * @license MIT
 * @package portada
 */

namespace controllers;

class PortadaController extends MainController
{
    /**
     * MÉTODO PARA CARGAR LA VISTA DE PORTADA
     *
     * @param $f3
     * @return void
     */
    public function vistaPortada($f3): void
    {
        // Aquí se puede incluir una página que estará incrustada en la página principal
        $f3->set('interna', '/internas/_portada.html');
    }
}
