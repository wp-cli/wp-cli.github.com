---
layout: default
title: Interfaz de línea de comandos para WordPress
direction: ltr
---

[WP-CLI](https://wp-cli.org/) es la interfaz de línea de comandos para [WordPress](https://es.wordpress.org/). Puedes actualizar plugins, configurar instalaciones multisitio y mucho más, sin usar un navegador web.

El mantenimiento continuo es posible gracias a:

<a href="https://automattic.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" alt="" width="320" height="70" class="aligncenter size-full wp-image-347" /></a>
<a href="https://www.bluehost.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-335" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="320" height="52" /></a>
<a href="https://pantheon.io/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2019/06/pantheon.png" alt="" width="320" height="100" /></a>
<a href="https://www.siteground.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-332" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2019/06/SG_logo.png" alt="" width="320" height="66" /></a>
<a href="https://wpengine.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="320" height="60" /></a>
<a href="https://www.cloudways.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-3229" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="" width="320" height="62" /></a>

La versión estable actual es la [2.12.0](https://make.wordpress.org/cli/2025/05/07/wp-cli-v2-12-0-release-notes/). Para estar al día, sigue [@wpcli en Twitter](https://twitter.com/wpcli) o [regístrate para recibir actualizaciones por correo electrónico](https://make.wordpress.org/cli/subscribe/). [Consulta la hoja de ruta](https://make.wordpress.org/cli/handbook/roadmap/) para una visión general de lo que está planeado para las próximas versiones.

[![Testing](https://github.com/wp-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/wp-cli/automated-tests/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Percentage of issues still open")

Enlaces rápidos: [Uso](#uso) &#124; [Instalación](#instalación) &#124; [Soporte](#soporte) &#124; [Extender](#extender) &#124; [Contribuir](#contribuir) &#124; [Créditos](#créditos)

## Uso

WP-CLI proporciona una interfaz de línea de comandos para muchas acciones que puedes realizar en el escritorio de WordPress. Por ejemplo, `wp plugin install --activate` ([doc](https://developer.wordpress.org/cli/commands/plugin/install/)) te permite instalar y activar un plugin de WordPress:

```bash
$ wp plugin install user-switching --activate
Installing User Switching (1.0.9)
Downloading install package from https://downloads.wordpress.org/plugin/user-switching.1.0.9.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'user-switching'...
Plugin 'user-switching' activated.
Success: Installed 1 of 1 plugins.
```

WP-CLI también incluye comandos para muchas cosas que no puedes hacer en el escritorio de WordPress. Por ejemplo, `wp transient delete --all` ([doc](https://developer.wordpress.org/cli/commands/transient/delete/)) te permite eliminar uno o todos los datos transitorios:

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

Para una introducción más completa para usar WP-CLI, lee la [guía de inicio rápido](https://make.wordpress.org/cli/handbook/quick-start/). O bien, ponte al día con los [*shell friends*](https://make.wordpress.org/cli/handbook/shell-friends/) para aprender acerca de las utilidades de línea de comandos.

¿Ya te sientes cómodo con lo básico? Ve a la [lista completa de comandos](https://developer.wordpress.org/cli/commands/) para obtener información detallada sobre la gestión de temas y plugins, importación y exportación de datos, realización de operaciones de búsqueda y reemplazo de bases de datos, y más.

## Instalación

La descarga del archivo Phar es nuestro método de instalación recomendado para la mayoría de usuarios. Si lo necesitas, consulta también nuestra documentación acerca de [métodos de instalación alternativos](https://wp-cli.org/docs/installing/) ([Composer](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker)).

Antes de instalar WP-CLI, asegúrate de que tu entorno cumple con los requisitos mínimos:

- Entorno de tipo UNIX (OS X, Linux, FreeBSD, Cygwin); soporte limitado en el entorno de Windows
- PHP 5.6 o posterior
- WordPress 3.7 o posterior. Las versiones anteriores a la última versión de WordPress pueden tener funcionalidad degradada

Una vez que hayas verificado los requisitos, descarga el archivo [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) usando `wget` o `curl` :

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

A continuación, comprueba el archivo Phar para verificar que está funcionando:

```bash
php wp-cli.phar --info
```

Para usar WP-CLI desde la línea de comandos tecleando `wp`, haz que el archivo sea ejecutable y muévelo a algún lugar de tu `PATH`. Por ejemplo:

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

Si WP-CLI se instaló correctamente, deberías ver algo como esto cuando ejecutas `wp --info`:

```bash
$ wp --info
OS:     Linux 4.19.128-microsoft-standard #1 SMP Tue Jun 23 12:58:10 UTC 2020 x86_64
Shell:  /usr/bin/zsh
PHP binary:     /usr/bin/php
PHP version:    8.0.5
php.ini used:   /etc/php/8.0/cli/php.ini
MySQL binary:   /usr/bin/mysql
MySQL version:  mysql  Ver 8.0.23-0ubuntu0.20.04.1 for Linux on x86_64 ((Ubuntu))
SQL modes:
WP-CLI root dir:        /home/wp-cli/
WP-CLI vendor dir:      /home/wp-cli/vendor
WP_CLI phar path:
WP-CLI packages dir:    /home/wp-cli/.wp-cli/packages/
WP-CLI global config:
WP-CLI project config:  /home/wp-cli/wp-cli.yml
WP-CLI version: 2.12.0
```

### Actualización

Puedes actualizar WP-CLI con `wp cli update` ([doc](https://developer.wordpress.org/cli/commands/cli/update/)), o repitiendo los pasos de instalación.

Si WP-CLI es propiedad de root u otro usuario del sistema, necesitarás ejecutar `sudo wp cli update`.

¿Quieres vivir la vida al límite? Ejecuta `wp cli update --nightly` para usar la última compilación nocturna (nightly build) de WP-CLI. Una compilación nocturna es más o menos lo suficientemente estable como para que puedas utilizarla en tu entorno de desarrollo, y siempre incluye las últimas y mejores características de WP-CLI.

### Autocompletar con el tabulador

WP-CLI también viene con un scripts para autocompletar con el tabulador para Bash y ZSH. Tan sólo descarga [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v2.12.0/utils/wp-completion.bash) y usa el comando `source` desde `~/.bash_profile`:

```bash
source /FULL/PATH/TO/wp-completion.bash
```

No te olvides de ejecutar `source ~/.bash_profile` después.

Si usa la shell zsh, es posible que debas cargar e iniciar `bashcompinit` antes de usar el comando `source`. Pon lo siguiente en tu `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /RUTA/COMPLETA/HASTA/wp-completion.bash
```

## Soporte

Tanto los que mantienen WP-CLI como sus colaboradores tienen disponibilidad limitada para responder preguntas generales de soporte. La [versión actual de WP-CLI](https://make.wordpress.org/cli/handbook/roadmap/) es la única versión oficialmente soportada.

Cuando busques ayuda, primero busca tu pregunta en estos lugares:

* [Problemas comunes y sus soluciones](https://make.wordpress.org/cli/handbook/common-issues/)
* [Manual de WP-CLI (Handbook)](https://make.wordpress.org/cli/handbook/)
* [*Issues* abiertos o cerrados en la organización de WP-CLI en GitHub](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue)
* [Hilos etiquetados con «WP-CLI» en el foro de soporte de WordPress.org](https://wordpress.org/support/topic-tag/wp-cli/)
* [Preguntas etiquetadas con «WP-CLI» en WordPress Development Stack Exchange](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

Si no encontraste una respuesta en uno de los lugares anteriores, puedes:

* Únirte al canal `#cli` en el [Slack de WordPress.org](https://make.wordpress.org/chat/) para chatear con quien esté disponible en ese momento. Esta opción es la mejor para preguntas rápidas.
* [Publicar un nuevo hilo](https://wordpress.org/support/forum/wp-advanced/#new-post) en el foro de soporte de WordPress.org y etiquetarlo como «WP-CLI» para que lo vea la comunidad.

Los *issues* de GitHub están destinados al seguimiento de mejoras y errores de los comandos existentes, no para soporte general. Antes de enviar un informe de errores, por favor, [revisa nuestras mejores prácticas](https://make.wordpress.org/cli/handbook/bug-reports/) para ayudar a garantizar que tu *issue* se resuelva de manera oportuna.

Por favor, no hagas preguntas de soporte en Twitter. Twitter no es un lugar aceptable para el soporte porque: 1) es difícil mantener conversaciones con menos de 280 caracteres, y 2) Twitter no es un lugar donde alguien con tu misma pregunta pueda buscar una respuesta en una conversación previa.

Recuerda, libre != gratis; la licencia open source te da la libertad de usar y modificar, pero no a expensas del tiempo de otras personas. Por favor, se respetuoso y establece tus expectativas en consecuencia.

## Extender

Un **comando** es la unidad atómica de la funcionalidad de WP-CLI. `wp plugin install` ([doc](https://developer.wordpress.org/cli/commands/plugin/install/)) es un comando. `wp plugin activate` ([doc](https://developer.wordpress.org/cli/commands/plugin/activate/)) es otro.

WP-CLI permite registrar cualquier clase, función o *closure* invocable como un comando. Este lee los detalles de uso del PHPdoc de la devolución de llamada. `WP_CLI::add_command()` ([doc](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)) se utiliza tanto para el registro de comandos internos como de terceros.

```php
/**
 * Delete an option from the database.
 *
 * Returns an error if the option didn't exist.
 *
 * ## OPTIONS
 *
 * <key>
 * : Key for the option.
 *
 * ## EXAMPLES
 *
 *     $ wp option delete my_option
 *     Success: Deleted 'my_option' option.
 */
$delete_option_cmd = function( $args ) {
	list( $key ) = $args;

	if ( ! delete_option( $key ) ) {
		WP_CLI::error( "Could not delete '$key' option. Does it exist?" );
	} else {
		WP_CLI::success( "Deleted '$key' option." );
	}
};
WP_CLI::add_command( 'option delete', $delete_option_cmd );
```

WP-CLI viene con docenas de comandos. Crear un comando personalizado para WP-CLI es más fácil de lo que parece. Lee el [libro de recetas de comandos](https://make.wordpress.org/cli/handbook/commands-cookbook/) para obtener más información. Explora los [documentos de la API interna](https://make.wordpress.org/cli/handbook/internal-api/) para descubrir una variedad de funciones útiles que puedes usar en su comando WP-CLI personalizado.

## Contribuir

Apreciamos que tomes la iniciativa de contribuir a WP-CLI. Es gracias a ti y la comunidad que lo rodea, que WP-CLI es un gran proyecto.

**Contribuir no se limita únicamente al código.** Te animamos a contribuir de la forma que mejor se adapte a tus habilidades, escribiendo tutoriales, haciendo una demostraciones en tu meetup local, ayudando a los demás con sus preguntas de soporte, o revisando nuestra documentación.

Lee atentamente nuestras [pautas de colaboración en el manual](https://make.wordpress.org/cli/handbook/contributing/) para una introducción completa sobre cómo puedes involucrarte. Seguir estas pautas ayuda a comunicar que respetas el tiempo de otros colaboradores en el proyecto. A su vez, ellos harán todo lo posible para corresponder a ese respeto cuando trabajen contigo, a través de diferentes zonas horarias alrededor del mundo.

## Liderazgo

WP-CLI tiene un encargado del mantenimiento del proyecto: [schlessera](http://github.com/schlessera).

En ocasiones, [concedemos permisos de escritura a los colaboradores](https://make.wordpress.org/cli/handbook/committers-credo/) que han demostrado, durante un período de tiempo, que son capaces e invirtieron en avanzar el proyecto.

Lee el [documento de gobernanza en el manual](https://make.wordpress.org/cli/handbook/governance/) para obtener más detalles operativos sobre el proyecto.

## Créditos

Además de las bibliotecas definidas en [composer.json](composer.json), hemos utilizado código o ideas de los siguientes proyectos:

* [Drush](https://github.com/drush-ops/drush) para... un montón de cosas
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) para `wp shell`
* [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) para `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) para `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) para `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) para `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) para `wp scaffold plugin-tests`
