WP-CLI
======

[WP-CLI](https://wp-cli.org/) ist das Kommandozeilen-Werkzeug für [WordPress](https://de.wordpress.org/). Du kannst Plugins aktualisieren, Multisite-Installationen konfigurieren und vieles mehr, ohne einen Browser zu benutzen.

Die laufende Pflege wird ermöglicht durch:

<div style="
		display: flex; 
		flex-wrap: wrap; 
		align-items: center; 
		justify-content: space-between; 
		text-align: center;">
	<a href="https://automattic.com/" style="width:49%; margin-bottom: 10px">
		<img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" alt="Automattic" width="320" height="70" style="height: auto" />
	</a>
	<a href="https://www.bluehost.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="Bluehost" width="320" height="52" />
	</a>
	<a href="https://pantheon.io/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.wordpress.org/cli/files/2019/06/pantheon.png" alt="Pantheon" width="320" height="100" />
	</a>
	<a href="https://www.siteground.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.wordpress.org/cli/files/2019/06/SG_logo.png" alt="SiteGround" width="320" height="66" />
	</a>
	<a href="https://wpengine.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="WP Engine" width="320" height="60" />
	</a>
	<a href="https://www.cloudways.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.wordpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="Cloudways" width="320" height="62" />
	</a>
</div>

Das aktuelle stabile Release ist [Version 2.12.0](https://make.wordpress.org/cli/2025/05/07/wp-cli-v2-12-0-release-notes/) (engl.). Folge für Ankündigungen [@wpcli auf Twitter](https://twitter.com/wpcli) oder [registriere dich für Aktualisierungen per E-Mail](https://make.wordpress.org/cli/subscribe/) (engl.). [Sieh dir die Roadmap an](https://make.wordpress.org/cli/handbook/roadmap/) (engl.), um einen Überblick zu erhalten, was in zukünftigen Releases geplant ist.

[![Testing](https://github.com/wp-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/wp-cli/wp-cli/actions/workflows/testing.yml) [![Durchschnittliche Zeit, bis ein Problem behoben wurde](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Durchschnittliche Zeit, bis ein Problem behoben wurde") [![Prozentuale Anzahl an offenen Problemen](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Prozentuale Anzahl an offenen Problemen")

Quick links: [Benutzung](#benutzung) &#124; [Installation](#installation) &#124; [Support](#support) &#124; [Erweitern](#erweitern) &#124; [Mitwirken](#mitwirken) &#124; [Credits](#credits)

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
- PHP 5.6 oder neuer
- WordPress 3.7 oder neuer. Ältere Versionen als das aktuelle WordPress-Release haben funktionelle Einschränkungen

Sobald du die Mindestanforderungen geprüft hast, lade die [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar)-Datei mittels `wget` oder `curl` herunter:

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
OS:     Linux 5.10.60.1-microsoft-standard-WSL2 #1 SMP Wed Aug 25 23:20:18 UTC 2021 x86_64
Shell:  /usr/bin/zsh
PHP binary:     /usr/bin/php8.1
PHP version:    8.1.0
php.ini used:   /etc/php/8.1/cli/php.ini
MySQL binary:   /usr/bin/mysql
MySQL version:  mysql  Ver 8.0.27-0ubuntu0.20.04.1 for Linux on x86_64 ((Ubuntu))
SQL modes:
WP-CLI root dir:        /home/wp-cli/
WP-CLI vendor dir:      /home/wp-cli/vendor
WP_CLI phar path:
WP-CLI packages dir:    /home/wp-cli/.wp-cli/packages/
WP-CLI global config:
WP-CLI project config:  /home/wp-cli/wp-cli.yml
WP-CLI version: 2.12.0
```

### Aktualisieren

Du kannst WP-CLI mittels `wp cli update` ([Dok.](https://developer.wordpress.org/cli/commands/cli/update/) (engl.)) aktualisieren oder indem du die obigen Installationsschritte wiederholst.

Wenn WP-CLI dem root-Benutzer oder einem anderen Systembenutzer gehört, musst du `sudo wp cli update` ausführen.

Lebst du gerne gefährlich? Führe `wp cli update --nightly` aus, um den letzten Nightly Build von WP-CLI zu benutzen. Der Nightly Build ist mehr oder weniger stabil genug für die Nutzung in deiner Entwicklungsumgebung und enthält jeweils die neusten und besten Funktionen von WP-CLI.

### Tab-Vervollständigung

Für WP-CLI gibt es auch ein Skript zur Autovervollständigung von Befehlen für Bash und ZSH. Lade einfach die [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v2.12.0/utils/wp-completion.bash) herunter und referenziere sie in der `~/.bash_profile`-Datei:

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

WP-CLI hat einen Projektbetreuer: [schlessera](https://github.com/schlessera) (engl.).

Gelegentlich [vergeben wir Schreibzugriff an Mitwirkende](https://make.wordpress.org/cli/handbook/committers-credo/), die über längere Zeit gezeigt haben, dass sie in der Lage sind, in das Projekt zu investieren und es voranzubringen.

Lies dir das [Verwaltungsdokument im Handbuch](https://make.wordpress.org/cli/handbook/governance/) (engl.) für mehr operative Informationen bezüglich dieses Projekts durch.

## Credits

Neben den Bibliotheken, die in der [composer.json](composer.json)-Datei erwähnt werden, benutzen wir Code oder Ideen von folgenden Projekten:

* [Drush](https://github.com/drush-ops/drush) (engl.) für… viele Dinge
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) (engl.) für `wp shell`
* [Regenerate Thumbnails](https://de.wordpress.org/plugins/regenerate-thumbnails/) für `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) (engl.) für `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) (engl.) für `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) (engl.) für `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) (engl.) für `wp scaffold plugin-tests`
