---
layout: default
title: Interfaz de línea de comandos para WordPress
---

[WP-CLI](https://wp-cli.org/) es una completa herramienta para gestionar desde la línea de comandos nuestras instalaciones de [WordPress](https://wordpress.org/). Podemos actualizar nuestras extensiones (plugins), configurar instalaciones multi-site y mucho más sin necesidad de recurrir a un navegador web.

Para estar al día, siga [@wpcli en Twitter](https://twitter.com/wpcli) o [inscríbase a nuestro boletín de información por email](http://wp-cli.us13.list-manage.com/subscribe?u=0615e4d18f213891fc000adfd&id=8c61d7641e).

[![Statut du build](https://travis-ci.org/wp-cli/wp-cli.png?branch=master)](https://travis-ci.org/wp-cli/wp-cli) [![Statut des dépendances](https://gemnasium.com/badges/github.com/wp-cli/wp-cli.svg)](https://gemnasium.com/github.com/wp-cli/wp-cli) [![Temps moyen pour traiter un ticket](http://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](http://isitmaintained.com/project/wp-cli/wp-cli "Temps moyen pour traiter un ticket") [![Pourcentage de tickets encore ouverts](http://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](http://isitmaintained.com/project/wp-cli/wp-cli "Pourcentage de tickets encore ouverts")

Enlaces directos: [Uso](#utilisation) &#124; [Instalación](#installation) &#124; [Soporte](#support) &#124; [Extender](#tendre) &#124; [Contribuir](#contribuer) &#124; [Créditos](#crdits)

## Uso

El objetivo de WP-CLI es proporcionar una interfaz de línea de comando para toda acción útil a realizar en la administración de WordPress. Por ejemplo, `wp plugin install --activate` ([doc](https://wp-cli.org/commands/plugin/install/)) nos permite instalar y activar una extensión de WordPress :

```bash
$ wp plugin install rest-api --activate
Installing WordPress REST API (Version 2) (2.0-beta13)
Downloading install package from https://downloads.wordpress.org/plugin/rest-api.2.0-beta13.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'rest-api'...
Success: Plugin 'rest-api' activated.
```

WP-CLI incluye también comandos para otras tareas que no se pueden ejecutar desde la administración de WordPress. Por ejemplo, `wp transient delete-all` ([doc](https://wp-cli.org/commands/transient/delete-all/)) permite suprimir uno o todos los "transients" :

```bash
$ wp transient delete-all
Success: 34 transients deleted from the database.
```

Para una introducción más completa sobre el uso de WP-CLI, lea la [Guía de inicio rápido (en)](https://wp-cli.org/docs/quick-start/).

¿Ya se siente cómodo con lo básico? Diríjase a la [lista completa de comandos (en)](https://wp-cli.org/commands/) para tener información precisa sobre la gestión de temas y extensiones, la importación/exportación de datos, la ejecución de búsqueda y reemplazo en la base datos, y mucho más.

## Installation

Descargar el Phar es el método de instalación que recoemndamos. Puede también consultar nuestra documentación sobre [otros métodos de instalación (en)](https://wp-cli.org/docs/installing/).

Antes de instalar WP-CLI, asegúrese de que su entorno responde a las exigencias mínimas :

- Entorno de tipo UNIX (OS X, Linux, FreeBSD, Cygwin); en entornos Windows, el soporte es limitado
- PHP 5.3.29 o más reciente
- WordPress 3.7 o más reciente

Una vez verificadas estas exigencias, descargue el fichero [wp-cli.phar](https://raw.github.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) usando `wget` o `curl` :

```bash
$ curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

A continuación, verifique que todo funciona :

```bash
$ php wp-cli.phar --info
```

Para utilizar WP-CLI desde la línea de comandos tecleando `wp`, convierta el fichero en ejecutable y póngalo en alguna parte en su `PATH`. Par exemple :

```bash
$ chmod +x wp-cli.phar
$ sudo mv wp-cli.phar /usr/local/bin/wp
```

Si WP-CLI ha sido instalado correctamente, obtendrá el siguiente resultado al ejecutar `wp --info`:

```bash
$ wp --info
PHP binary:    /usr/bin/php5
PHP version:    5.5.9-1ubuntu4.14
php.ini used:   /etc/php5/cli/php.ini
WP-CLI root dir:        /home/wp-cli/.wp-cli
WP-CLI packages dir:    /home/wp-cli/.wp-cli/packages/
WP-CLI global config:   /home/wp-cli/.wp-cli/config.yml
WP-CLI project config:
WP-CLI version: 0.25.0
```

### Actualización

Puede actualizar WP-CLI con el comando `wp cli update` ([doc](https://wp-cli.org/commands/cli/update/)), o bien repitiendo la instalación paso a paso.

¿Le gusta vivir al límite? Ejecute `wp cli update --nightly` para instalar las últimas nightly build de WP-CLI. Una nightly build es relativament estable para ser usada en su entorno de desarrollo e incluye siempre las funcionalidades de WP-CLI más recientes.

### Autocompletar con el tabulador

WP-CLI contiene scripts para autocompletar comandos para Bash et ZSH. Basta con descargar [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/master/utils/wp-completion.bash) e importarlo en su fichero `~/.bash_profile`:

```bash
source /FULL/PATH/TO/wp-completion.bash
```

Si quiere utilizarlo directamente sin reinicializar su sesión de terminal, no se olvide de lanzar `source ~/.bash_profile`.

Si utiliza la shell zsh, tendrá probablemente que cargar y arrancar `bashcompinit` antes de usar el comando `source`. Añada estas líneas en su fichero `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## Soporte

Quienes mantienen WP-CLI y quienes contribuyen al proyecto hacen lo mejor que pueden para responder a todos los nuevos tickets en tiempo oportuno. Para utilizar de la mejor manera su tiempo voluntario, se agradece verificar que no exista ya una respuesta a su pregunta en alguno de los siguientes recursos :

- [Problemas comunes y su solución (en)](https://wp-cli.org/docs/common-issues/)
- [Buenas prácticas para someter un informe de bug (en)](https://wp-cli.org/docs/bug-reports/)
- [Documentación (en)](https://wp-cli.org/docs/)
- [Tickets abiertos o cerrados en Github](https://github.com/wp-cli/wp-cli/issues?utf8=%E2%9C%93&q=is%3Aissue)
- [Forum StackExchange WordPress](http://wordpress.stackexchange.com/questions/tagged/wp-cli)

Si no ecuentra una solución usando uno de estos enlaces, únase al canal `#cli` en [la organización Slack WordPress.org](https://make.wordpress.org/chat/) para ver si un miembro de la comunidad puede tener una solución para su problema. Los profesionales deben saber que [runcommand](https://runcommand.io/) proporciona un soporte premium.

Los tickets Github, permiten seguir la evolución de los bugs y las mejoras en los comandos existentes. No son usados como soporte. Antes de someter un nuevo informe de bug, se agradece revisar [nuestras buenas prácticas](https://wp-cli.org/docs/bug-reports/) para asegurarse que su ticket las respeten.

Se agradece no pedir soporte en Twitter. Twitter no es un sitio conveniente para hacer soporte: 1) es complicado mantener una conversación con un número de caracteres limitado y 2) Twitter no es un lugar donde alguien con la misma pregunta pueda buscar y obtener una respuesta antes de volver a plantearla.

Recuerde, libre != gratuito ; la licencia open source le da la libertad de utilizar y modificar, pero no a expensas del tiempo de otras personas. Se agradece una actitud de respeto y planear sus espectativas en consecuencia.

## Extender

Un **comando** es una unidad atómica de funcionalidad WP-CLI. `wp plugin install` ([doc](https://wp-cli.org/commands/plugin/install/)) es un comando. `wp plugin activate` ([doc](https://wp-cli.org/commands/plugin/activate/)) es otro comando.

WP-CLI permite registrar cualquier clase, función o closure como un comando. La información de uso se lee desde el bloque PHPdoc de la función de llamada. `WP_CLI::add_command()` ([doc](https://wp-cli.org/docs/internal-api/wp-cli-add-command/)) se utiliza tanto para el registro de comandos internos como externos.

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

WP-CLI se entrega con docenas de comandos. Es mucho más fácil de lo que parece crear sus propios comandos WP-CLI. Lea el [commands cookbook](https://wp-cli.org/docs/commands-cookbook/) para informarse con detalle. Recorra la [documentación sobre el API interno](https://wp-cli.org/docs/internal-api/) para descubrir la variedad de funciones útiles que puede usar en su comando WP-CLI personalizado.

## Contribuir

¡ Bienvenido y gracias !

Apreciamos que tome la iniciativa de contribuir con WP-CLI. Es gracias a usted y a la comunidad a su alrededor que WP-CLI es un proyecto tan importante.

**Contribuir no se limita únicamente a la escritura de código.** Le animamos a contribuir de la manera que mejor le corresponda, escribiendo tutoriales, haciendo demostraciones en su grupo de usuarios local, ayudando a los demás con sus preguntas de soporte, o releyendo nuestra documentación.

Le agradecemos que se tome un momento para [leer la guía del contribuidor en profundidad](https://wp-cli.org/docs/contributing/). Seguir estas reglas ayuda a comunicar respetando el tiempo de los demás que contribuyen en el proyecto. A cambio, harán cuanto esté en sus manos para trabajar con el mismo respeto, a través de los husos horarios y en el mundo, cuando les necesite.

## Dirección

WP-CLI es dirigido por :

* [Daniel Bachhuber](https://github.com/danielbachhuber/) - mantenedor actual
* [Cristi Burcă](https://github.com/scribu) - mantenedor anterior
* [Andreas Creten](https://github.com/andreascreten) - creador

Para saber más sobre la [gobernanza (en)](https://wp-cli.org/docs/governance/) del proyecto y ver la [lista completa de los contribuidores](https://github.com/wp-cli/wp-cli/contributors).

## Créditos

Detrás de las librerías definidas en el fichero [composer.json](composer.json), hemos utilizado código e ideas procedentes de los siguientes proyectos :

* [Drush](http://drush.ws/) para... un montón de cosas
* [wpshell](http://code.trac.wordpress.org/browser/wpshell) para `wp shell`
* [Regenerate Thumbnails](http://wordpress.org/plugins/regenerate-thumbnails/) para `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) para `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) para `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) para `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) para `wp scaffold plugin-tests`
