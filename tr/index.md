---
layout: default
title: WordPress için Komut Satırı Arayüzü
direction: ltr
---

[WP-CLI](https://wp-cli.org/), [WordPress](https://wordpress.org/) için komut satırı arayüzüdür. Eklenti güncellemesi, multisite kurulumların yapılandırılması ve daha birçok şeyi web tarayıcısına ihtiyaç duymadan gerçekleştirebilirsiniz.

Süregelen bakım, <a href="https://make.wordpress.org/cli/2019/06/27/thanks-to-the-2019-sponsors/">aşağıdakiler sayesinde</a>:

<a href="https://automattic.com/"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full wp-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full wp-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://pantheon.io/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2019/06/pantheon.png" alt="" width="160" height="50" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full wp-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2019/06/SG_logo.png" alt="" width="160" height="33" /></a> <a href="https://wpengine.com/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="160" height="30" /></a>

Mevcut kararlı sürüm [versiyon 2.3.0](https://make.wordpress.org/cli/2025/05/07/wp-cli-v2-12-0-release-notes/). Duyurular için [@wpcli Twitter](https://twitter.com/wpcli) hesabını takip edebilir ya da [eposta bültenine abone olabilirsiniz](https://make.wordpress.org/cli/subscribe/). Gelecek sürüm planına genel bir bakış için [yol haritasına göz atın](https://make.wordpress.org/cli/handbook/roadmap/).

[![Testing](https://github.com/wp-cli/wp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/wp-cli/wp-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Percentage of issues still open")



Bağlantılar: [Kullanım](#kullanm) &#124; [Kurulum](#kurulum) &#124; [Destek](#destek) &#124; [Genişletmek](#geniletmek) &#124; [Katkıda Bulunmak](#katkda-bulunmak) &#124; [Jenerik](#jenerik)

## Kullanım

WP-CLI, WordPress yönetim panelinden gerçekleştirebileceğiniz çoğu işlem için komut-satırı arabirimi sunar. Örneğin `wp plugin install --activate` ([belge](https://developer.wordpress.org/cli/commands/plugin/install/)) bir WordPress eklentisini kurmanızı ve aktifleştirmenizi sağlar:


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

WP-CLI ayrıca WordPress yönetim panelinden gerçekleştiremeyeceğiniz komutları da barındırır. Örneğin, `wp transient delete --all` ([belge](https://developer.wordpress.org/cli/commands/transient/delete/)) bir veya daha fazla transient'i silmenizi sağlar:


```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

WP-CLI kullanımı hakkında daha detaylı bilgi için, [Hızlı Giriş belgesini](https://make.wordpress.org/cli/handbook/quick-start/) okuyun. Veya [shell friends](https://make.wordpress.org/cli/handbook/shell-friends/) belgesini okuyarak yararlı komut satırı yardımcı programları hakkında bilgi edinin.

Temel şeyleri zaten biliyorum diyorsanız, direkt [komutlara](https://developer.wordpress.org/cli/commands/) dalıp  tema ve eklenti yönetimi, veri aktarımı, veritabanı bul-değiştir işlemi ve dahası hakkında detaylı bilgiye ulaşabilirsiniz.

## Kurulum

Çoğu kullanıcı için Phar dosyasını indirerek kurmalarını öneririz. Ayrıca, ihtiyacınız olursa [alternatif kurulum yöntemlerine](https://make.wordpress.org/cli/handbook/installing/) kurulum dökümanından ulaşabilirsiniz. ([Composer](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker)).


Lütfen WP-CLI'i kurmadan önce minimum ortam gereksinimlerin karşılandığından emin olunuz:

- UNIX-benzeri işletim sistemi (OS X, Linux, FreeBSD, Cygwin); Windows kısıtlı desteklenir
- PHP 5.6 veya sonrası
- WordPress 3.7 veya daha üst sürüm. Son WordPress sürümden eski sürümler daha az işlevsellik sunabilir

Gerensinimleri karşıladıktan sonra, [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) dosyasını `wget` veya `curl` ile indirin:

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

Sonra, çalışıp çalışmadığını kontrol edin:

```bash
php wp-cli.phar --info
```

WP-CLI'e komut satırından `wp` yazarak erişebilmek için dosyayı çalıştırılabilir hale getirin ve PATH'de tanımlı olan bir yere taşıyın. Örneğin:

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

Eğer kurulum başarılı bir şekilde tamamlandıysa, `wp --info` komutunu çalıştırdığınızda buna benzer birşey göreceksiniz:

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
WP-CLI version: 2.3.0
```


### Güncelleme

WP-CLI'i  `wp cli update` komutu ([belge](https://developer.wordpress.org/cli/commands/cli/update/)) ile veya kurulum adımlarını tekrarlayarak güncelleyebilirsiniz.

Eğer WP-CLI, root veya başka bir sistem kullanıcısı tarafından sahiplenildiyse `sudo wp cli update` çalıştırmanız gerekecektir.

Sınırda yaşamayı seviyor musunuz?  `wp cli update --nightly` komutu ile nightly build sürümüne güncelleyebilirsiniz. Geliştirme ortamınız için nightly build sürümler daha çok ya da az stabil olabilir ve her zaman en son ve yeni WP-CLI özelliklerini içerir.

### Sekme tamamlama

WP-CLI ayrıca, Bash ve ZSH için sekme tamamlama scripti sunar. Yapmanız gereken sadece [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v2.12.0/utils/wp-completion.bash) dosyasını indirmek ve kaynak olarak `~/.bash_profile` dosyanıza tanımlamak:

```bash
source /FULL/PATH/TO/wp-completion.bash
```

Ekledikten sonra `source ~/.bash_profile` komutunu çalıştırmayı unutmayın.

Shell için zsh kullanıyorsanız, kaynak olarak tanımlamadan önce `bashcompinit` i yükleyip çalıştırmanız gerekebilir. Aşağıdaki kodları `.zshrc` dosyanıza ekleyin:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## Destek

WP-CLI'nin bakımcıları ve katılımcıları genel destek soruları için sınırlı müsaitliğe sahiptir. [Mevcut WP-CLI sürümu](https://make.wordpress.org/cli/handbook/roadmap/) resmi olarak desteklenen tek sürümdür.

Lütfen desteğe ihtiyacınız olduğünda, öncelikle sorunuzu aşağıdaki kaynaklarda arayın:

* [Ortak sorunlar ve çözümleri](https://make.wordpress.org/cli/handbook/common-issues/)
* [WP-CLI el kitabı](https://make.wordpress.org/cli/handbook/)
* [GitHub organizasyonu üzerindeki açık veya kapalı konular](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue)
* ['WP-CLI' ile etiketlenmiş WordPress.org destek forumları](https://wordpress.org/support/topic-tag/wp-cli/)
* ['WP-CLI' ile etiketlenmiş WordPress StackExchange soruları](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

Eğer bu kaynaklarda sorularınıza cevap bulamazsanız:

* [WordPress.org Slack](https://make.wordpress.org/chat/) üzerinden `#cli` kanalında müsait olanlarla sohbet edebilirsiniz. Hızlı sorular için en iyi seçenektir.
* WordPress.org destek forumlarında [yeni bir konu](https://wordpress.org/support/forum/wp-advanced/#new-post) açıp, 'WP-CLI' etiketi ekleyin, böylece topluluk tarafından görülür.

Github konuları mevcut komutlar için yenilik ve hata takibi icin kullanılmaktadır, genel destek için değildir. Hata bildirimi göndermeden önce, sorununuz zamanında ele alınması için lütfen [hata bildirimi yöntemini](https://make.wordpress.org/cli/handbook/bug-reports/) gözden geçirin.

Lütfen Twitter üzerinden destek soruları sormayın. Twitter destek için iyi bir yer değildir, çünkü: 1) Yazışmaları 280 karakterin altında tutmak zor, ve 2) Twitter sizinle aynı soruna sahip birisinin önceki cevabı arayarak bulabileceği bir yer değil.


Unutmayın, özgür != ücretsiz; açık kaynak lisansı size özgürce kullanma ve değiştirme hakkı verir, başkalarının zamanını değil. Lütfen buna saygı duyun ve beklentilerinizi buna göre ayarlayın.


## Genişletmek

Bir **Komut** WP-CLI'nin atomik birimidir. `wp plugin install` ([belge](https://developer.wordpress.org/cli/commands/plugin/install/)) bir komuttur.  `wp plugin activate` ([belge](https://developer.wordpress.org/cli/commands/plugin/activate/)) başka bir komuttur.

WP-CLI çağrılabilen herhangi bir sınıfı, fonksiyonu ya da anonim fonksiyonu komut olarak kaydetmeyi destekler. Kullanım detaylarını callback'in PHP dökümanından (PHPdoc) okur. `WP_CLI::add_command()` ([belge](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)) dahili ve üçüncü-parti komutların kaydedilmesi için kullanılmaktadır.

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


WP-CLI onlarca komutla hazır olarak gelir. Özel bir WP-CLI komutu oluşturmak görünenden daha kolaydır. Detaylar için [komutlar tarif kitabına](https://make.wordpress.org/cli/handbook/commands-cookbook/) bakabilirsiniz. [Dahili API dökümantasyonunu](https://make.wordpress.org/cli/handbook/internal-api/) gözden geçirerek kendi WP-CLI komutunuzda kullanabileceğiniz faydalı fonksiyonları keşfedebilirsiniz.


## Katkıda Bulunmak

WP-CLI'e katkıda bulunmak istediğiniz için teşekkür ederiz. WP-CLI siz ve sizin gibi topluluk üyeleri sayesinde bu kadar büyük bir proje olmayı başarabildi.

**Katkıda bulunmak sadece kod yazmakla sınırlı değildir.** Kendi yeteneklerinize uygun olacak şekilde; tanıtım yazıları yazarak, yerel etkinliklerde demo göstererek, başkalarının sorunlarına yardımcı olarak veya dökümantasyonumuzu gözden geçirerek katkıda bulunabilirsiniz.


Lütfen bir dakikanızı ayırıp [dökümanı detaylıca okuyun](https://wp-cli.org/docs/contributing/). Bunları takip ederek, katkıda bulunan diğer katılımcıların ayırdığı zamana saygı gösteriniz. Buna karşılık, onlar da aynı saygıyı sizinle çalışırken göstereceklerdir (zaman farkı gözetmeksizin, dünya genelinde).

Nasıl katılacağınıza dair kapsamlı bir giriş için [el kitabındaki katkı kurallarını](https://make.wordpress.org/cli/handbook/contributing/) okuyun. Bu kurallara uymak, projeye katkıda bulunan diğer üyelerin zamanına saygı duyduğunuzu bildirmenize yardımcı olur. Buna karşılık, onlar da bu saygıya karşılık vermek için ellerinden geleni zaman farkı gözetmeksizin, dünya genelinde yapacaktır.

## Yönetim

WP-CLI'nın bir proje sorumlusu vardır: [schlessera](https://github.com/schlessera).

Zaman zaman, belli bir süre için yetenekli olduklarını kanıtlamış ve projeyi ileriye taşıyabilecek katılımcılara [yazma izni veriyoruz](https://make.wordpress.org/cli/handbook/committers-credo/).

Proje hakkında daha operasyonel ayrıntılar için [el kitabındaki yönetim belgesini](https://make.wordpress.org/cli/handbook/governance/) okuyabilirsiniz.

## Jenerik

[composer.json](composer.json) dosyasında tanımlanan kütüphanelerin yanında, aşağıdaki projeleri de kod veya fikir için kullandık:

* [Drush](https://github.com/drush-ops/drush) birçok şey içın
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) `wp shell` komutu için
* [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) `wp media regenerate` komutu için
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) `wp search-replace` komutu içın
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) `wp export` komutu içın
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) `wp import` komutu içın
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) `wp scaffold plugin-tests` komutu için
