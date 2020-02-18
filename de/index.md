---
layout: default
title: Kommandozeilen-Benutzeroberfläche für WordPress
direction: ltr
---

[WP-CLI](https://wp-cli.org/) ist das Kommandozeilen-Werkzeug für [WordPress](https://de.wordpress.org/). Du kannst Plugins aktualisieren, Multisite-Installationen konfigurieren und vieles mehr, ohne einen Browser zu benutzen.

Die laufende Pflege <a href="https://make.wordpress.org/cli/2019/06/27/thanks-to-the-2019-sponsors/">wird ermöglicht durch</a>:
a href="https://automattic.com/"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full wp-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full wp-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://pantheon.io/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2019/06/pantheon.png" alt="" width="160" height="50" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full wp-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2019/06/SG_logo.png" alt="" width="160" height="33" /></a> <a href="https://wpengine.com/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="160" height="30" /></a>

Das aktuelle stabile Release ist [Version 2.4.0](https://make.wordpress.org/cli/2019/11/12/wp-cli-v2-4-0-release-notes/) (engl.). Folge für Ankündigungen [@wpcli auf Twitter](https://twitter.com/wpcli) oder [registriere dich für Aktualisierungen per E-Mail](https://make.wordpress.org/cli/subscribe/) (engl.). [Sieh dir die Roadmap an](https://make.wordpress.org/cli/handbook/roadmap/) (engl.), um einen Überblick zu erhalten, was in zukünftigen Releases geplant ist.

[![Build-Status](https://travis-ci.org/wp-cli/wp-cli.svg?branch=master)](https://travis-ci.org/wp-cli/wp-cli) [![Durchschnittliche Zeit, bis ein Problem behoben wurde](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Durchschnittliche Zeit, bis ein Problem behoben wurde") [![Prozentuale Anzahl an offenen Problemen](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Prozentuale Anzahl an offenen Problemen")

Quick links: [Benutzung](#using) &#124; [Installation](#installing) &#124; [Support](#support) &#124; [Erweitern](#extending) &#124; [Mitwirken](#contributing) &#124; [Credits](#credits)

## Benutzung

WP-CLI bietet eine Kommandozeilen-Benutzeroberfläche für viele Aktionen, die du eigentlich im WordPress-Administrationsbereich durchführst. `wp plugin install --activate` ([Dok.](https://developer.wordpress.org/cli/commands/plugin/install/)) lässt dich beispielsweise ein WordPress-Plugin installieren und aktivieren:

```bash
$ wp plugin install user-switching --activate
Installing User Switching (1.0.9)
Downloading installation package from https://downloads.wordpress.org/plugin/user-switching.1.0.9.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'user-switching'...
Plugin 'user-switching' activated.
Success: Installed 1 of 1 plugins.
```

WP-CLI enthält auch Befehle für viele Dinge, die du im WordPress-Administrationsbereich nicht tun kannst. Mit `wp transient delete-all` ([Dok.](https://developer.wordpress.org/cli/commands/transient/delete/)) kannst du beispielsweise bestimmte oder alle Transients löschen:

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

Für eine umfassendere Einführung in die Benutzung von WP-CLI, lies am besten die [Schnellstartanleitung](https://make.wordpress.org/cli/handbook/quick-start/) (engl.), oder sieh dir [Shell-Freunde](https://make.wordpress.org/cli/handbook/shell-friends/) (engl.) an, um mehr über die Kommandozeilen-Helferlein zu erfahren.

Bereits genug von den Basics? Sieh dir die [komplette Liste an Befehlen](https://developer.wordpress.org/cli/commands/) (engl.) für detailliertere Informationen zur Verwaltung von Themes und Plugins, Datenimport und -export, Suchen/Ersetzen-Operationen in der Datenbank und mehr an.

## Installation

Das Herunterladen der Phar Datei ist unsere empfohlene Installationsweise. Falls nötig, gibt es auch eine Dokumentation zu [alternativen Installationsmethoden](https://make.wordpress.org/cli/handbook/installing/) (engl.) ([Composer](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer) (engl.), [Homebrew](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew) (engl.), [Docker](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker) (engl.)).

Bevor du WP-CLI installierst, stell bitte sicher, dass dein System die Mindestanforderungen erfüllt:

- UNIX-ähnliche Umgebung (OS X, Linux, FreeBSD, Cygwin); eingeschränkter Support in Windows-Umgebungen
- PHP 5.4 oder neuer
- WordPress 3.7 oder neuer. Ältere Versionen als das aktuelle WordPress-Release haben funktionelle Einschränkungen

Sobald du die Mindestanforderungen geprüft hast, lade die [wp-cli.phar](https://raw.github.com/wp-cli/builds/gh-pages/phar/wp-cli.phar)-Datei mittels `wget` oder `curl` herunter:

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

Prüfe als nächstes, ob die Phar-Datei funktioniert:

```bash
php wp-cli.phar --info
```

Um WP-CLI auf der Kommandozeile durch blosses Eintippen von `wp` zu benutzen, mach die Datei ausführbar und verschiebe sie irgendwo hin innerhalb deines PATH. Zum Beispiel:

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

Wenn WP-CLI erfolgreich installiert wurde, solltest du bei der Ausführung von `wp --info` etwas wie hier sehen:

```bash
$ wp --info
OS:	Darwin 16.7.0 Darwin Kernel Version 16.7.0: Thu Jan 11 22:59:40 PST 2018; root:xnu-3789.73.8~1/RELEASE_X86_64 x86_64
Shell:	/bin/zsh
PHP binary:    /usr/local/bin/php
PHP version:    7.0.22
php.ini used:   /etc/local/etc/php/7.0/php.ini
WP-CLI root dir:        /home/wp-cli/.wp-cli/vendor/wp-cli/wp-cli
WP-CLI vendor dir:	    /home/wp-cli/.wp-cli/vendor
WP-CLI packages dir:    /home/wp-cli/.wp-cli/packages/
WP-CLI global config:   /home/wp-cli/.wp-cli/config.yml
WP-CLI project config:
WP-CLI version: 2.4.0
```

### Aktualisieren

Du kannst WP-CLI mittels `wp cli update` ([Dok.](https://developer.wordpress.org/cli/commands/cli/update/) (engl.)) aktualisieren oder indem du die obigen Installationsschritte wiederholst.

Wenn WP-CLI dem root-Benutzer oder einem anderen Systembenutzer gehört, musst du `sudo wp cli update` ausführen.

Lebst du gerne gefährlich? Führe `wp cli update --nightly` aus, um den letzten Nightly Build von WP-CLI zu benutzen. Der Nightly Build ist mehr oder weniger stabil genug für die Nutzung in deiner Entwicklungsumgebung und enthält jeweils die neusten und besten Funktionen von WP-CLI.

### Tab-Vervollständigung

Für WP-CLI gibt es auch ein Skript zur Autovervollständigung von Befehlen für Bash und ZSH. Lade einfach die [wp-completion.bash](https://github.com/wp-cli/wp-cli/raw/master/utils/wp-completion.bash) herunter und referenziere sie in der `~/.bash_profile`-Datei:

```bash
source /ABSOLUTER/PFAD/ZUR/wp-completion.bash
```

Vergiss nicht, danach `source ~/.bash_profile` auszuführen.

Wenn du zsh für deine Shell benutzt, musst du möglicherweise erst `bashcompinit` laden und starten, bevor du den `source`-Befehl nutzt. Füge das folgende in deine `.zshrc` ein:

```bash
autoload bashcompinit
bashcompinit
source /ABSOLUTER/PFAD/ZUR/wp-completion.bash
```

## Support

Die Betreuer und Mitwirkenden hinter WP-CLI sind Freiwillige und haben nur begrenzt Zeit, um generelle Supportanfragen zu beantworten. Die [aktuelle Version von WP-CLI](https://make.wordpress.org/cli/handbook/roadmap/) (engl.) ist die einzig offizielle unterstützte Version.

Prüfe zunächst, ob es bereits auf einer dieser Seiten eine Antwort auf deine Frage gibt:

- [Gängige Probleme und deren Lösungen](https://make.wordpress.org/cli/handbook/common-issues/) (engl.)
* [WP-CLI-Handbuch](https://make.wordpress.org/cli/handbook/) (engl.)
* [Offene oder geschlossene Probleme in der WP-CLI-GitHub-Organisation](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue) (engl.)
* [Themen mit dem Tag 'WP-CLI' im WordPress.org-Supportforum](https://wordpress.org/support/topic-tag/wp-cli/) (engl.)
* [Fragen mit dem Tag 'WP-CLI' im WordPress-StackExchange](https://wordpress.stackexchange.com/questions/tagged/wp-cli) (engl.)

Wenn du auf keiner dieser Seiten eine Antwort findest, kannst du folgendes tun:

* Tritt dem `#cli`-Kanal im [WordPress.org Slack](https://make.wordpress.org/chat/) (engl.) bei, um mit jemandem zu chatten, der gerade da ist. Das ist die beste Möglichkeit für kleine Fragen.
* [Erstelle ein neues Thema](https://wordpress.org/support/forum/wp-advanced/#new-post) (engl.) im WordPress.org-Supportforum und füge den Tag 'WP-CLI' hinzu, sodass die Community es sieht.

GitHub Issues sind nur für das Verwalten von Erweiterungen und Bugs existierender Befehle gedacht, nicht für allgemeinen Support. Sieh dir [unsere Best Practices](https://make.wordpress.org/cli/handbook/bug-reports/) (engl.) an, bevor du einen Fehler meldest, damit dein Issue in angemessener Zeit bearbeitet werden kann.

Bitte stell keine Supportfragen auf Twitter. Twitter ist kein akzeptabler Ort für Support weil: 1) es ist schwierig Konversationen unter 280 Zeichen zu führen und 2) Twitter ist kein Ort, an dem jemand mit der gleichen Frage frühere Antworten in einer Konversation finden kann.

Denk daran, frei != gratis. Die Open-Source-Lizenz garantiert dir die Freiheit zur Nutzung und Bearbeitung, aber nicht anderer Leute Zeit. Bitte sei respektvoll und setze deine Erwartungen dementsprechend.

## Erweitern

Ein **Befehl** ist die atomare Einheit der WP-CLI Funktionalität. `wp plugin install` ([Dok.](https://developer.wordpress.org/cli/commands/plugin/install/) (engl.)) ist ein Befehl. `wp plugin activate` ([Dok.](https://developer.wordpress.org/cli/commands/plugin/activate/) (engl.)) ist ein anderer.

WP-CLI unterstützt das Registrieren jeder aufrufbaren Klasse, Funktion oder Closure als Befehl. Es liest die Informationen zur Nutzung aus der PHPdoc des Callbacks aus. `WP_CLI::add_command()` ([Dok.](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/) (engl.)) wird sowohl für die Registrierung interner als auch für Befehle von Dritten verwendet.

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

WP-CLI enthält Dutzende Befehle. Es ist auch einfacher, als es aussieht, eigene Befehle zu erstellen. Lies dazu das [Befehle-Kochbuch](https://make.wordpress.org/cli/handbook/commands-cookbook/) (engl.), um mehr zu erfahren. Stöbere in der [internen API-Dokumentation](https://make.wordpress.org/cli/handbook/internal-api/) (engl.), um eine Vielzahl hilfreicher Funktionen zu entdecken, die du in deinem eigenen WP-CLI Befehl benutzen kannst.

## Mitwirken

Wir schätzen es sehr, dass du interessiert bist, an WP-CLI mitzuwirken. Nur wegen dir und der Community um dich herum ist WP-CLI so ein tolles Projekt.

**Mitwirken beschränkt sich nicht nur auf’s Programmieren.** Wir möchten dich dazu ermutigen, das beizutragen, was du am besten kannst. Sei es durch das Schreiben von Tutorials, das Vorstellen von WP-CLI bei einem lokalen Meetup, anderen Nutzern bei ihren Supportfragen zu helfen oder unsere Dokumentation zu pflegen.

Lies unsere [Guidelines im Handbuch](https://make.wordpress.org/cli/handbook/contributing/) (engl.), um eine Einführung zu bekommen, wie du mitwirken kannst. Das Einhalten dieser Guidelines zeigt, dass du die Zeit respektierst, die andere in dieses Projekt investieren. Im Gegensatz werden andere Betreuer rund um den Globus diesen Respekt erwidern.

## Projektleitung

WP-CLI hat einen Projektbetreuer: [schlessera](http://github.com/schlessera) (engl.).

Gelegentlich [vergeben wir Schreibzugriff an Mitwirkende](https://make.wordpress.org/cli/handbook/committers-credo/), die über längere Zeit gezeigt haben, dass sie in der Lage sind, in das Projekt zu investieren und es voranzubringen.

Lies dir das [Verwaltungsdokument im Handbuch](https://make.wordpress.org/cli/handbook/governance/) (engl.) für mehr operative Informationen bezüglich dieses Projekts durch.

## Credits

Neben den Bibliotheken, die in der [composer.json](composer.json)-Datei erwähnt werden, benutzen wir Code oder Ideen von folgenden Projekten:

* [Drush](https://github.com/drush-ops/drush) (engl.) für… viele Dinge
* [wpshell](http://code.trac.wordpress.org/browser/wpshell) (engl.) für `wp shell`
* [Regenerate Thumbnails](http://de.wordpress.org/plugins/regenerate-thumbnails/) für `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) (engl.) für `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) (engl.) für `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) (engl.) für `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) (engl.) für `wp scaffold plugin-tests`
