---
layout: default
title: Interfață de linie de comandă pentru WordPress
---

[WP-CLI](https://wp-cli.org/) este interfața de linie de comandă pentru [WordPress](https://wordpress.org/). Poți actualiza module, configura instalări multisit și multe altele, fără să folosești un navigator web.

Întreținerea continuă este <a href="https://make.wordpress.org/cli/2017/04/03/new-co-maintainer-alain-thanks-2017-sponsors/#sponsors">făcută posibilă de către</a>:

<a href="https://automattic.com/"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full wp-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full wp-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full wp-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/siteground.png" alt="" width="160" height="33" /></a> <a href="https://wpengine.com/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="160" height="30" /></a>

Lansarea stabilă curentă este [versiunea 2.2.0](https://make.wordpress.org/cli/2019/04/25/wp-cli-v2-2-0-release-notes/). Pentru anunțuri, urmărește [@wpcli pe Twitter](https://twitter.com/wpcli) sau [înregistrează-te pentru actualizări pe email](https://make.wordpress.org/cli/subscribe/). [Consultă foaia de parcurs](https://make.wordpress.org/cli/handbook/roadmap/) pentru o prezentare generală a ceea ce este plănuit pentru lansările viitoare.

[![Stare compilare](https://travis-ci.org/wp-cli/wp-cli.svg?branch=master)](https://travis-ci.org/wp-cli/wp-cli) [![Durata medie pentru rezolvarea unei probleme](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Durata medie pentru rezolvarea unei probleme") [![Procentul problemelor încă deschise](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Procentul problemelor încă deschise")

Legături rapide: [Folosire](#folosire) &#124; [Instalare](#instalare) &#124; [Asistență](#asistenta) &#124; [Extindere](#extindere) &#124; [Contribuire](#contribuire) &#124; [Recunoștințe](#recunoștințe)

## Folosire

WP-CLI oferă o interfață de linie de comandă pentru multe acțiuni pe care le-ai putea executa în administrarea WordPress. De exemplu, `wp plugin install --activate` ([documentație](https://developer.wordpress.org/cli/commands/plugin/install/)) îți permite să instalezi și să activezi un modul WordPress:

```bash
$ wp plugin install user-switching --activate
Installing Comutare utilizatori (1.5.0)
Descarc pachetul de instalare de la https://downloads.wordpress.org/plugin/user-switching.1.5.0.zip...
Despachetez pachetul...
Instalez modulul...
Modulul a fost instalat cu succes.
Activating 'user-switching'...
Plugin 'user-switching' activated.
Success: Installed 1 of 1 plugins.
```

WP-CLI include de asemenea comenzi pentru multe lucruri pe care nu le poți face în administrarea WordPress. De exemplu, `wp transient delete --all` ([documentație](https://developer.wordpress.org/cli/commands/transient/delete/)) îți permite să ștergi unul sau toți tranzienții:

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

Pentru o introducere mai completă a utilizării WP-CLI, citește [Ghidul de inițiere rapidă](https://make.wordpress.org/cli/handbook/quick-start/). Sau vino alături de [prietenii shell](https://make.wordpress.org/cli/handbook/shell-friends/) pentru a afla despre utilitățile liniei de comandă.

Deja te simți confortabil cu elementele de bază? Sari în [lista completă de comenzi](https://developer.wordpress.org/cli/commands/) pentru informații detaliate despre gestionarea temelor și modulelor, importarea și exportarea datelor, efectuarea operațiunilor de căutare-înlocuire în baza de date și mai multe.

## Instalare

Descărcarea fișierului Phar este metoda noastră de instalare recomandată pentru cei mai mulți utilizatori. Dacă ai nevoie, vezi și documentația noastră despre [metodele de instalare alternative](https://make.wordpress.org/cli/handbook/installing/) ([Composer](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker)).

Înainte să instalezi WP-CLI, te rog asigură-te că mediul tău respectă cerințele minime:

- Mediu asemănător UNIX (OS X, Linux, FreeBSD, Cygwin); asistență limitată pentru mediul Windows
- PHP 5.4 sau mai recent
- WordPress 3.7 sau mai recent. Versiuniile mai vechi decât ultima versiune WordPress ar putea avea funcționalități degradate

Odată ce ai verificat cerințele, descarcă fișierul [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) folosind `wget` sau `curl`:

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

Mai departe, verifică fișierul Phar pentru a vedea dacă funcționează:

```bash
php wp-cli.phar --info
```

Pentru a folosi WP-CLI din lina de comandă tastând `wp`, fă fișierul executabil și mută-l undeva în PATH-ul tău. De exemplu:

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

Dacă WP-CLI a fost instalat cu succes, ar trebui să vezi ceva asemănător când rulezi `wp --info`:

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
WP-CLI version: 2.1.0
```

### Actualizare

Poți actualiza WP-CLI cu `wp cli update`  ([documentație](https://developer.wordpress.org/cli/commands/cli/update/)) sau repetând pașii de instalare.

Dacă WP-CLI este deținut de root sau un alt utilizator de sistem, trebuie să rulezi `sudo wp cli update`.

Vrei să trăiești viața la limită? Rulează `wp cli update --nightly` pentru a folosi ultima compilare nocturnă a WP-CLI. Compilarea nocturnă este mai mult sau mai puțin stabilă pentru a fi utilizată în mediul tău de dezvoltare și întotdeauna include ultimele și cele mai grozave funcționalități WP-CLI.

### Auto-completare

WP-CLI vine de asemenea cu un script de auto-completare pentru Bash și ZSH. Doar descarcă [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v1.5.1/utils/wp-completion.bash) și rulează source pe el din `~/.bash_profile`:

```bash
source /FULL/PATH/TO/wp-completion.bash
```

Nu uita să rulezi apoi și `source ~/.bash_profile`.

Dacă folosești zsh pentru shell-ul tău, trebuie să încarci și să pornești `bashcompinit` înainte de comanda source. Pune următoarele în `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## Asistență

Întreținătorii WP-CLI și contribuitorii au disponibilitate limitată pentru a răspunde la întrebările de asistență generală. [Versiunea curentă WP-CLI](https://make.wordpress.org/cli/handbook/roadmap/) este singura versiune oficială pentru care se oferă asistență.

Când ai nevoie de asistență, te rog să cauți mai întâi întrebarea ta în aceste locuri:

* [Probleme comune și remedierea lor](https://make.wordpress.org/cli/handbook/common-issues/)
* [Manual WP-CLI](https://make.wordpress.org/cli/handbook/)
* [Probleme deschise sau închise în WP-CLI GitHub](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue)
* [Subiecte etichetate cu „WP-CLI” în forumul de asistență WordPress.org](https://wordpress.org/support/topic-tag/wp-cli/)
* [Întrebări etichetate cu „WP-CLI” în WordPress StackExchange](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

Dacă n-ai găsit un răspuns într-unul dintre locațiile de mai sus, poți:

* Să te alături canalului `#cli` în [WordPress.org Slack](https://make.wordpress.org/chat/) pentru a vorbi cu cineva care ar putea fi disponibil în acel moment. Această opțiune este cea mai bună pentru întrebări rapide.
* [Să postezi un subiect nou](https://wordpress.org/support/forum/wp-advanced/#new-post) în forumul de asistență WordPress.org și să-l etichetezi „WP-CLI” pentru a fi văzut de comunitate.

Tichetele GitHub sunt menite să urmărească îmbunătățirile și erorile comenzilor existente, nu pentru asistență generală. Înainte să trimiți un raport de eroare, te rog să [revezi cele mai bune practici ale noastre](https://make.wordpress.org/cli/handbook/bug-reports/) pentru a te asigura că problema ta este abordată în timp util.

Te rog nu adresa întrebări de asistență pe Twitter. Twitter nu este un loc acceptat pentru asistență pentru că: 1) este greu să ții conversații sub 280 de caractere și 2) Twitter nu este un loc unde cineva cu aceeași întrebare ca a ta poate căuta un răspuns într-o conversație anterioară.

Ține minte, libre != gratis; licența pentru sursa deschisă îți oferă libertate de folosire și modificare, dar nu angajamentul timpului altor persoane. Te rog fii respectuos și setează-ți așteptările în consecință.

## Extindere

O **comandă** este unitatea atomică a funcționalității WP-CLI. `wp plugin install` ([documentație](https://developer.wordpress.org/cli/commands/plugin/install/)) este o comandă. `wp plugin activate` ([documentație](https://developer.wordpress.org/cli/commands/plugin/activate/)) este alta.

WP-CLI suportă înregistrarea oricărei clase, funcție, sau închidere apelabilă ca o comandă. Ea citește detalii de folosire din blocul PHPdoc al funcției de apel. `WP_CLI::add_command()` ([documentație](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)) este folosită și intern, și pentru înregistrarea comenzilor din terțe părți.

```php
/**
 * Șterge o opțiune din baza de date.
 *
 * Returnează o eroare dacă opțiunea nu există.
 *
 * ## OPȚIUNI
 *
 * <key>
 * : Cheie pentru opțiune.
 *
 * ## EXEMPLE
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
WP-CLI vine cu zeci de comenzi. Este mai ușor decât pare să creezi o comandă personalizată WP-CLI. Citește [cartea de bucate a comenzilor](https://make.wordpress.org/cli/handbook/commands-cookbook/) pentru a afla mai multe. Răsfoiește [documentația internă API](https://make.wordpress.org/cli/handbook/internal-api/) pentru a descoperi o varietate de funcții ajutătoare pe care le poți folosi în comanda ta personalizată WP-CLI.

## Contribuire

Apreciem că ai inițiativa de a contribui la WP-CLI. Datorită ție și comunității din jurul tău, acest WP-CLI este un proiect grozav.

**Contribuirea nu este limitată doar la cod.** Te încurajăm să contribui în modul care se potrivește cel mai bine abilităților tale, scriind tutoriale, oferind un demo la meetup-ul tău local, ajutând alți utilizatori cu întrebările lor de asistență sau revizuind documentația.

Citește prin [ghidul de contribuire din manual](https://make.wordpress.org/cli/handbook/contributing/) pentru o introducere detaliată a modului în care te poți implica. Urmând aceste instrucțiuni te ajută să comunici că respecți timpul altor contribuitori în proiect. La rândul lor, ei vor face tot ce le stă în putință pentru a-ți întoarce acest respect atunci când lucrează cu tine, în zonele de fus orar și în întreaga lume.

## Leadership

WP-CLI are un întreținător de proiect: [schlessera](http://github.com/schlessera).

Ocazional, noi [acordăm acces de scriere contribuitorilor](https://make.wordpress.org/cli/handbook/committers-credo/) care au demonstrat, de-a lungul unei perioade de timp, că sunt capabili și investesc în avansarea proiectului.

Citește [documentul de guvernanță din manual](https://make.wordpress.org/cli/handbook/governance/) pentru mai multe detalii operaționale despre proiect.

## Recunoștințe

Pe lângă bibliotecile definite în [composer.json](composer.json), am folosit cod sau idei din următoarele proiecte:

* [Drush](https://github.com/drush-ops/drush) pentru... o grămadă de lucruri
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) pentru `wp shell`
* [Regenerează miniaturile](https://wordpress.org/plugins/regenerate-thumbnails/) pentru `wp media regenerate`
* [Caută-Înlocuiește-DB](https://github.com/interconnectit/Search-Replace-DB) pentru `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) pentru `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) pentru `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) pentru `wp scaffold plugin-tests`
