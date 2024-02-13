# F3 CON DOCKER

![Packagist](https://img.shields.io/badge/Stack-Lamp-yellowgreen.svg)
![Packagist](https://img.shields.io/badge/Composer-True-red.svg)
![Packagist](https://img.shields.io/badge/NodeJS-True-red.svg)
![Packagist](https://img.shields.io/badge/Docker-True-red.svg)
![Packagist](https://img.shields.io/badge/License-MIT-lightgrey.svg)
![Packagist](https://img.shields.io/badge/Estabilidad-stable-blue.svg)

[![JavaScript Style Guide](https://cdn.rawgit.com/standard/standard/master/badge.svg)](https://github.com/standard/standard)

Proyecto para crear un ambiente de producción usando el *framework* de **PHP**, **Fat Free Framework**, que lo he estado usando desde hace muchos años. Además, es un proyecto totalmente contenerizado con **Docker**, el cual levanta un servidor web con **Apache** y **PHP**, ambos en sus últimas versiones estables.

El contenedor ocupa **Composer** para la gestión de dependencias de producción.

También incluye un ambiente de desarrollo que usa **NodeJS**, ya que contiene tareas automatizadas y gestionadas por **Gulp**. Y lleva dependencias de desarrollo gestionadas por el mismo **Composer**.

La idea es que este proyecto sirva como base para levantar cualquier ambiente de producción para un webapp dinámico en pocos minutos.

## PROYECTO

* Historia: Febrero, 2024
* Autor: Fernando Magrosoto Vásquez <fmagrosoto@gmail.com>
* Stack de producción: LAMP
* Herramientas de desarrollo:
  * PHP 8.2
  * Fat Free Framework 3.8
  * NodeJS
  * Gulp
  * Docker
  * Composer
  * Git
  * phpStorm
  * MacBook 2017 (poco vieja, pero funciona)
  * iTunes

## ¿CÓMO SE USA ESTE PROYECTO?

Este proyecto tiene dos ambientes. El ambiente de producción y el de desarrollo. Para cualquier ambiente deberás de tener instalado **Git** y **Docker**. Además, para el ambiente de desarrollo deberás de tener instalado **NodeJS**.

Una vez que hayas clonado el repositorio (y tengas instalado Docker), ejecuta el siguiente comando:

```shell
docker compose up -d
```

Con esto, estarás levantando un contenedor de **Docker** que tiene instalado **Apache** y **PHP**, además de instalar **Composer** y **Xdebug**. Se estarán instalando las dependencias de **Composer**, las estará copiando al directorio web de **Apache**. Y estarás exponiendo el puerto 8000 para que puedas ver la aplicación al teclear ```localhost:8000``` en la barra de dirección del navegador.

Nota que el archivo *docker-compose.yml* ocupa el archivo *Dockerfile* que se encuentra en la carpeta **Docker** en la raíz del proyecto. Y el mismo *docker-compose.yml* estará usando un archivo de configuración de **PHP** que se llama **local.ini** que está ubicado en la misma carpeta **Docker**. Esta es una configuración personalizada de **PHP** y podrás modificarlo dependiendo de tus necesidades.

> En futuras versiones, estaremos usando un archivo *Dockerfile* diferente para cada ambiente (producción y desarrollo).

## AMBIENTE DE PRODUCCIÓN

> En futuras versiones, cada Dockerfile tendrá asociado un *stage* para instalar dependencias de cada ambiente: producción o desarrollo.

Por ahora, vamos a necesitar instalar las dependencias de **Composer* por separado. Una vez que tengamos corriendo el contendor (que iniciamos con docker compose), haremos lo siguiente:

```shell
docker container ls
```

Con este comando estaremos mostrando en pantalla todos los contenedores que se estén ejecutando en el equipo. Vamos a identificar el contenedor que hayamos iniciado y vamos a recordar su token único,luego ejecutamos:

```shell
docker exec -it {token} /bin/bash
```

Una vez dentro del contenedor, ejecutamos:
```shell
cd ..
composer install --no-dev
```
El contenedor estará instalando las dependencias de **Composer** para producción y dejando las dependencias de desarrollo a un lado.

Y con eso, podemos abrir el proyecto usando ```localhost:8000```.

Todos los archivos que estemos necesitando para el ambiente de producción se encuentran en la carpeta ```html```, en la raíz del proyecto. El contenido de esa carpeta se puede subir a la carpeta pública de nuestro entorno de producción o HOSTING contratado, que regularmente es ```public_html```.

> En futuras versiones, vamos a empoderar el Dockerfile de producción para que este mismo contenedor se pueda usar en producción desde cualquier plataforma en la nube: Azure, Digital Ocean, AWS, Google Cloud, etc.

## AMBIENTE DE DESARROLLO

Vamos a necesitar instalar las dependencias de **Composer** tal cual lo describimos en la sección anterior, solo que ahora vamos a instalar todas las dependencias, así que una vez dentro del contenedor ejecutamos la siguiente variante de comando:

```shell
cd ..
composer install
```

Nos salimos del contenedor y en la raíz del proyecto ejecutamos el siguiente comando de **NodeJS**:

```shell
npm start
```

Con esto estaremos abriendo el navegador por default apuntando hacia un servidor proxy en ```localhost:8080```.

También iniciamos **GULP** que es una plataforma de tareas automatizadas que nos permitirá transpilar archivos **SCSS**, minificarlos, renombrarlos y pasarlos a la carpeta correspondiente dentro de la carpeta **html**. También hará algo similar con los archivos **JS**. OJO, esto solo sucederá cuando estemos trabajando con los archivos **SCSS** y **JS** que están dentro de la carpeta ```source``` que está en la raíz del proyecto.

Ya sea que estemos trabajando con archivos **SCSS** y **JS**, dentro de la carpeta ```source``` y trabajando con archivos **HTML** y **PHP** dentro de la carpeta ```html/app```, **GULP** refrescará el navegador para que puedas ver los cambios reflejados automáticamente.

## COLABORAR CON EL PROYECTO

Para poder colaborar en este proyecto, deberás de crear una rama que dependa de la rama **develop**. Y solicitar un *pull request* para agregar tus cambios.

> NUNCA uses la rama **main**. Solo tienes que actualizarla.

Notar que hay un archivo, en la raíz del proyecto, que se llama ```.gitignore```. Este archivo enumera aquellos archivos que no queremos darle seguimiento. Estos archivos pueden ser: archivos temporales, archivos de configuración de cada IDE o editor de código, archivos propios de cada sistema operativo, etc, etc.

Debido a que este proyecto es AGNÓSTICO al ambiente de desarrllo de cada persona, queremos mantener el archivo .gitignore debidamente actualizado. Así que te pido que observes el contenido de este archivo lo actualices acorde al ambiente o plataforma que estés usando. No queremos estar haciendo seguimiento de archivos basura.

> Un ambiente limpio es un ambiente seguro


## CONTACTO

Si tienes dudas acerca del uso del proyecto, contáctame:

> Fernando Magrosoto Vásquez  
> fmagrosoto@gmail.com  
> https://twitter.com/fmagrosoto

***

Otro desarrollo de **dIGITAE | Fábrica de Soluciones**  
*Happy coding*... 🍺
