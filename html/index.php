<?php

/**
 * F3 CON DOCKER
 *
 * Diseño y desarrollo de plataforma F3 con Docker
 *
 * MIT License
 * Copyright (c) 2024, Fernando Gerardo Magrosoto Vásquez
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * PHP version 8.2
 *
 * @author Fernando Magrosoto V. <fmagrosoto@gmail.com>
 * @since 0.0.0
 * @copyright 2024, Fernando Magrosoto V.
 * @internal Revisa la carpeta app/config para las rutas y variables globales
 */

// Cargamos la dependencia desde COMPOSER
require('vendor/autoload.php');
// Cargamos en una variable global ($f3) el framework entero
$f3 = Base::instance();
const AMBIENTE = 'dev'; // ENUM('dev','prod')

// Organizamos nuestras variables globales y rutas en distintos
// archivos, para poder mantener el proyecto de manera más fácil.
$f3->config('app/config/globals.cfg', true);
$f3->config('app/config/routes.cfg');

## Un espacio limpio es un espacio bonito 🍻##

##########################
## 🔑 INICIAR FRAMEWORK ##
##########################
$f3->run();
