---
layout: default
title: Command line interface for WordPress
direction: rtl
---

[WP-CLI](https://wp-cli.org/) رابط خط فرمان برای [وردپرس](https://wordpress.org/) است. به‌روزرسانی افزونه‌ها، پیکربندی نصب چندسایته و چیزهای بیشتر را بدون استفاده از مرورگر وب انجام دهید.

نگهداری مداوم توسط  <a href="https://make.wordpress.org/cli/2017/04/03/new-co-maintainer-alain-thanks-2017-sponsors/#sponsors">حامیان</a> امکان پذیر شده است:

<a href="https://automattic.com/"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full wp-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full wp-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://pantheon.io/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2019/06/pantheon.png" alt="" width="160" height="50" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full wp-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2019/06/SG_logo.png" alt="" width="160" height="33" /></a> <a href="https://wpengine.com/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="160" height="30" /></a>

نگارش پایدار فعلی [version 2.9.0](https://make.wordpress.org/cli/2023/10/25/wp-cli-v2-9-0-release-notes/)است. برای پیگیری اعلانات، [@wpcli on Twitter](https://twitter.com/wpcli) را دنبال کنید یا [برای دریافت ایمیل ثبت‌نام کنید](https://make.wordpress.org/cli/subscribe/). برای بررسی برنامه‌ریزی‌های آینده انتشار [نقشه راه را برررسی کنید](https://make.wordpress.org/cli/handbook/roadmap/).

[![وضعیت ساخت](https://github.com/wp-cli/wp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/wp-cli/wp-cli/actions/workflows/testing.yml) [![زمان متوسط برای رفع مشکل](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "زمان متوسط برای رفع مشکل") [![درصد مشکلات باز](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "درصد مشکلات باز")

پیوندهای سریع: [استفاده](#using) &#124; [نصب](#installing) &#124; [پشتیبانی](#support) &#124; [گسترش](#extending) &#124; [مشارکت](#contributing) &#124; [همکاران](#credits)

## استفاده

WP-CLI یک رابط برپایه خط فرمان برای عملیاتی است که شما در محیط مدیریت وردپرس انجام می‌دهید. برای مثال `wp plugin install --activate` ([doc](https://developer.wordpress.org/cli/commands/plugin/install/)) به شما امکان نصب و فعال‌سازی افزونه وردپرس را می‌دهد:

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

WP-CLI همچنین حاوی دستوراتی برای بسیاری چیزهاست که نمی‌توانید در مدیریت وردپرس انجام دهید. برای مثال، `wp transient delete --all` ([doc](https://developer.wordpress.org/cli/commands/transient/delete/)) به شما امکان حذف یکی یا همه transients را می‌دهد:

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

برای پیش‌درآمد کامل استفاده از WP-CLI، [راهنمای سریع](https://make.wordpress.org/cli/handbook/quick-start/) را مطالعه کنید. یا، برای آموزش دستورات مفید خط فرمان [دوستان شل](https://make.wordpress.org/cli/handbook/shell-friends/) را مطالعه کنید.

در مورد مدیریت پوسته‌ها و افزونه‌ها، درون‌ریزی و برون‌بری، جستجو و جایگزینی در پایگاه‌داده و چیزهای بیشتر به [لیست کامل دستورات](https://developer.wordpress.org/cli/commands/) مراجعه کنید. 

## نصب

دریافت پرونده Pahr روش پیشنهادی ما برای نصب به بیشتر کاربران است. در صورت نیاز، مستندات ما را برای [روش‌های جایگزین نصب](https://make.wordpress.org/cli/handbook/installing/) ([کمپوزر](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer), [هوم‌بریو](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew), [داکر](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker)). ببینید.

قبل از نصب WP-CLI، لطفا از دارا بودن حداقل امکانات مورد نیاز مطمئن شوید:

- سیستم‌های یونیکسی (OS X, Linux, FreeBSD, Cygwin); در ویندوز کمتر پشتیبانی می‌شود
- PHP 5.6 or later
- وردپرس 3.7 به بالا. در نسخه‌های قدیمی‌تر ممکن است با مشکل روبرو شوید

 وقتی از داشتن حداقل امکانات مطمئن شدید، پرونده [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) را بصورت `wget` یا `curl` دریافت کیند:
 
```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

سپس پرونده Phar را از نظر کارکرد معتبرسازی کنید:

```bash
php wp-cli.phar --info
```

جهت استفاده WP-CLI در خط فرمان `wp` را بنویسید، پرونده را قابل اجرا و سپس در PATH خود بگذارید. برای مثال:

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

اگر WP-CLI به درستی نصب شده باشد، شما در صورت اجرای `wp --info` باید چیزی شبیه به این را ببینید:

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
WP-CLI version: 2.9.0
```

### به‌روزرسانی

شما می‌توانید WP-CLI را با `wp cli update` ([doc](https://developer.wordpress.org/cli/commands/cli/update/))، یا با اجرای دوباره مراحل نصب به‌روزرسانی کنید.

اگر دسترسی به WP-CLI با روت است یا کاربر سیستمی دیگری است، شما احتیاج به اجرای `sudo wp cli update` دارید.

به‌روزرسانی زنده می‌خواهید؟ برای استفاده از آخرین نسخه‌های شبانه دستور `wp cli update --nightly` را اجرا کنید. نسخه‌های شبانه به جهت پایداری کمتر برای کار در محیط توسعه مناسب نیستند، اما حاوی آخرین و بهترین امکانات WP-CLI هستند.

### کامل‌سازی با تب

WP-CLI دارای قابلیت کامل‌سازی با تب برای بش و ZSH است. کافیست [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v2.9.0/utils/wp-completion.bash) را دریافت و از `~/.bash_profile` سورس کنید:

```bash
source /FULL/PATH/TO/wp-completion.bash
```

فراموش نکنید که بعد از آن `source ~/.bash_profile` را اجرا کنید.

اگر از zsh برای شل استفاده می‌کنید، شاید به `bashcompinit` برای شروع قبل از سورس کردن نیاز داشته باشید. کد زیر را در `.zshrc` خود قرار دهید:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## پشتیبانی

توسعه‌دهندگان و مشارکت کنندگان WP-CLI برای پاسخ‌دهی به سوالات زمان محدودی دارند. نسخه فعلی [WP-CLI](https://make.wordpress.org/cli/handbook/roadmap/) تنها نسخه قابل پشتیبانی رسمی است. 

قبل از سوال، لطفا در مورد مشکل خود جستجو کنید:

* [مشکلات عمومی و رفع آنها](https://make.wordpress.org/cli/handbook/common-issues/)
* [کتابچه WP-CLI](https://make.wordpress.org/cli/handbook/)
* [مشکلات باز و بسته WP-CLI در گیتهاب رسمی](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue)
* [تاپیک‌های مرتبط با 'WP-CLI' در انجمن پشتیبانی وردپرس](https://wordpress.org/support/topic-tag/wp-cli/)
* [سوالات مطرح شده مرتبط با 'WP-CLI' در StackExchange](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

اگر جواب خود را از طریق راه‌های بالا پیدا نکردید، می‌توانید:

* وارد کانال `#cli` در [اسلک WordPress.org](https://make.wordpress.org/chat/) شوید تا شاید به جواب سوالاتتان برسید. این راه برای سوالات کوتاه مناسب است.
* در انجمن پشتیبانی وردپرس [تاپیک چدید ایجاد کنید](https://wordpress.org/support/forum/wp-advanced/#new-post) و برچسب 'WP-CLI' بزنید.

مشکلات گیتهاب برای پیگیری بهینه کردن و رفع باگ‌های موجود است، نه برای پشتیبانی عمومی. قبل از ارسال گزارش باگ، لطفا [بخش تمرین را بررسی کنید](https://make.wordpress.org/cli/handbook/bug-reports/)تا گزارش شما به درستی آدرس داده شده باشد و کمک شود که در زمان صرفه جویی شود.

لطفا در توییتر درخواست پشتیبانی نکنید. توییتر جای مناسبی برای پشتیبانی نیست چون: 1) نگه داشتن صحبت با 200 کاراکتر و کمتر سخت است 2) توییتری جای مناسبی برای سوال شما نیست چون شخصی که سوالی مشابه شما دارد امکان جستجوی آن را ندارد.

بخاطر داشته باشید، آزادی != رایگان؛ گواهی کدباز به شما دسترسی آزاد به استفاده و ویرایس را می‌دهد، اما نه الزاما با زمان افراد دیگر. لطفا باوقار باشید و انتظارات خود را براین اساس تنظیم کنید. 

## گسترش

یک **دستور** یک بخش کوچک از عملکرد WP-CLI است. `wp plugin install` ([doc](https://developer.wordpress.org/cli/commands/plugin/install/)) یک دستور است. `wp plugin activate` ([doc](https://developer.wordpress.org/cli/commands/plugin/activate/)) یک دستور دیگر است.

WP-CLI قابلیت ثبت هر کلاس، تابع یا بسته قابل فراخوانی را بصورت دستور دارد. جزئیات استفاده را از بخش توضیحات مندرج شده می‌خواند. `WP_CLI::add_command()` ([doc](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)) برای هر دو حالت ثبت دستور داخلی و ثالث استفاده می‌شود. 

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

WP-CLI دارای ده‌ها دستور است. ایجاد یک  دستور بسیار ساده‌تر از چیزی است که بنظر می‌رسد. بخش [کتابچه دستورات](https://make.wordpress.org/cli/handbook/commands-cookbook/) را برای آموزش مطالعه کنید. [API داخلی docs](https://make.wordpress.org/cli/handbook/internal-api/) را برای آشنایی با انواع عملکردهای مفید که می‌توانید در دستور دلخواه WP-CLI استفاده کنید را ببینید. 

## مشارکت

ما از شما برای مشارکت در WP-CLI قدردانی می‌کنیم. به خاطر شما و جامعه اطراف شماست که WP-CLI چنین پروژه‌ای عالی است.

**مشارکت فقط به یک کد محدود نمی‌شود.** ما شما را تشویق می‌کنیم تا به روشی که متناسب با توانایی‌های شما است مشارکت کنید
با نوشتن آموزش, ارائه یک نسخه‌ی نمایشی در میتاپ شما، کمک به کاربران دیگر با پشتیبانی و پاسخگویی و یا بررسی مستندات ما.

برای معرفی کامل نحوه مشارکت [راهنمای مشارکت در ددفترچه راهنما](https://make.wordpress.org/cli/handbook/contributing/) را مطالعه کنید. پیروی از این دستورالعمل‌ها به شما برای احترام به زمان دیگر مشارکت کنندگان پروژه کمک می‌کند. به نوبه خود، آنها همه تلاش خود را برای تکرار این احترام هنگام همکاری با شما، در مناطق زمانی مختلف و سراسر جهان انجام می دهند.

## رهبری

WP-CLI یک نگهدارنده دارد: [schlessera](http://github.com/schlessera).

به تناسب، ما [دسترسی برا نوشتن به مشارکت کنندگان می‌دهیم](https://make.wordpress.org/cli/handbook/committers-credo/)،آنهایی که توانایی خود را در طی زمان برای جلو بردن پروژه نشان دمی‌دهند.

توضیحات [سند مدیریت در کتابچه راهنمای کاربر](https://make.wordpress.org/cli/handbook/governance/) را برای جزئیات عملیاتی در مورد پروژه بخوانید.

## همکاران

علاوه بر کتابخانه های تعریف شده در [composer.json](composer.json) ما از پروژه‌ها یا کدهای زیر استفاده کرده‌ایم:

* [Drush](https://github.com/drush-ops/drush) برای خیلی چیزها
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) برای `wp shell`
* [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) برای `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) برای `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) برای `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) برای `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) برای `wp scaffold plugin-tests`
