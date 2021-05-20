---
layout: default
title: Command line interface for WordPress
direction: ltr
---

[WP-CLI](https://wp-cli.org/) は [WordPress](https://wordpress.org/) を管理するためのコマンドラインインターフェースです。
プラグインのアップデートやマルチサイトのセットアップなどの多くのことをブラウザなしで行うことができます。

下記のサポーターの協力で継続的なメンテナンスが行われています。

<a href="https://automattic.com/" style="height:80px;width:27%;display:inline-block;position:relative;margin:20px;"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" alt="" width="964" height="auto" class="aligncenter size-full wp-image-347" /></a>
<a href="https://www.bluehost.com/" style="height:80px;width:27%;display:inline-block;position:relative;margin:20px;"><img class="aligncenter size-full wp-image-335" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="1200" height="auto" /></a>
<a href="https://pantheon.io/" style="height:80px;width:27%;display:inline-block;position:relative;margin:20px;"><img class="aligncenter size-full wp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2019/06/pantheon.png" alt="" width="1512" height="auto" /></a>
<a href="https://www.siteground.com/" style="height:80px;width:27%;display:inline-block;position:relative;margin:20px;"><img class="aligncenter size-full wp-image-332" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2019/06/SG_logo.png" alt="" width="1435" height="auto" /></a>
<a href="https://wpengine.com/" style="height:80px;width:27%;display:inline-block;position:relative;margin:20px;"><img class="aligncenter size-full wp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="1200" height="auto" /></a>
<a href="https://www.cloudways.com/" style="height:80px;width:27%;display:inline-block;position:relative;margin:20px;"><img class="aligncenter size-full wp-image-3229" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="" width="1766" height="auto" /></a>

現在の安定バージョンは [2.5.0](https://make.wordpress.org/cli/2021/05/19/wp-cli-v2-5-0-release-notes/) です。 最新情報を得たい人は、[@wpcli on Twitter](https://twitter.com/wpcli) をフォローするか、[メーリングリストにサインアップ](https://make.wordpress.org/cli/subscribe/)してください。[ロードマップ](https://make.wordpress.org/cli/handbook/roadmap/)で、今後のリリースの予定を知ることができます。

[![Testing](https://github.com/wp-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/wp-cli/automated-tests/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Percentage of issues still open")

Quick links: [使い方](#使い方) &#124; [インストール方法](#インストール方法) &#124; [サポート](#サポート) &#124; [拡張](#拡張) &#124; [貢献](#貢献) &#124; [クレジット](#クレジット)

## 使い方

WP-CLI は、みなさんが WordPress の管理画面でやりたいと思っていることに対するコマンドラインインターフェースを提供しています。
たとえば、`wp plugin install --activate` ([ドキュメント](https://developer.wordpress.org/cli/commands/plugin/install/)) は、プラグインをインストールし有効化します。

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

さらに WP-CLI では、WordPress の管理画面ではできない多くのことを行えます。たとえば、`wp transient delete --all` ([ドキュメント](https://developer.wordpress.org/cli/commands/transient/delete/)) は、一時的に保存されているすべてのデータを削除することを可能にしています。

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

WP-CLI の使い方について詳しく知りたいときは、[クイックスタートガイド](https://make.wordpress.org/cli/handbook/quick-start/)を読んでください。[Shell friends](https://make.wordpress.org/cli/handbook/shell-friends/) で便利なコマンドラインユーティリティについて学ぶこともできます。

基本的なことをすでに理解しているなら、[コマンドリスト](https://developer.wordpress.org/cli/commands/)にジャンプして、テーマやプラグインの管理、データのインポートやエクスポート、データベースの検索・置換操作などについての詳細を見てください。

## インストール方法

Phar ファイルのダウンロードによるインストールを推奨します。必要に応じて[上級者向けインストール方法](https://make.wordpress.org/cli/handbook/installing/) ([Composer](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker)) も見てください。

WP-CLI をインストールする前に、動作環境を確認してください。

- UNIX 系の環境 (OS X, Linux, FreeBSD, Cygwin) ; Windows では一部の機能に制限があります。
- PHP 5.4 またはそれ以降のバージョン
- WordPress 3.7 またはそれ以降のバージョン。WordPress 最新版ではない古いバージョンでは、機能が低下する可能性があります。

動作条件を再度確認してから、`wget` または `curl` を使用して [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) をダウンロードしてください。

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

次に、Phar ファイルが動作していることを確認してください。

```bash
php wp-cli.phar --info
```

WP-CLI コマンドを `wp` で実行するには、wp-cli.phar が実行可能であることと、環境変数 `PATH` に登録された場所に置かれていることが必要です。例を示します。

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

もし、WP-CLI のインストールが成功していれば、`wp --info` の実行で以下のように出力されるはずです。

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
WP-CLI version: 2.5.0
```

## アップデート

WP-CLI のアップデートは、`wp cli update` ([ドキュメント](https://developer.wordpress.org/cli/commands/cli/update/)) の実行、または上述のインストール方法を再度行うことで可能です。

WP-CLI のオーナーが root もしくは他のシステム管理者になっている場合は、`sudo wp cli update` と実行する必要があります。

もっととんがった生き方をしたい ? `wp cli update --nightly` を実行すれば、最新の開発者向けバージョンの WP-CLI を使用できます。開発者向けバージョンは、あなたの開発環境で使用するのに十分な信頼性があり、常に最新の機能を含んでいます。

## タブ補完

WP-CLI には、Bash および ZSH 向けのタブ補完スクリプトがあります。 [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v2.5.0/utils/wp-completion.bash) をダウンロードして、`~/.bash_profile` で読み込んでください。

```bash
source /FULL/PATH/TO/wp-completion.bash
```

`source ~/.bash_profile` を実行するのを忘れないでください。

ZSH の場合は、`bashcompinit` をロードした後に `wp-completion.bash` を読み込ませる必要があるかもしれません。`.zshrc` へ次のコードを追加してください。

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## サポート

WP-CLI のメンテナーとその貢献者たちが一般的な質問に答えられる時間は限られています。[最新版](https://make.wordpress.org/cli/handbook/roadmap/)のみが公式にサポートされるバージョンです。

サポートを受けたいときは、まず、以下のリソースの中から答えを探してみてください。

* [Common issues and their fixes](https://make.wordpress.org/cli/handbook/common-issues/)
* [WP-CLI handbook](https://make.wordpress.org/cli/handbook/)
* [Open or closed issues in the WP-CLI GitHub organization](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue)
* [Threads tagged 'WP-CLI' in the WordPress.org support forum](https://wordpress.org/support/topic-tag/wp-cli/)
* [Questions tagged 'WP-CLI' in the WordPress StackExchange](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

もし、上のいずれかの方法で回答を見つけられなかった場合は:

* [WordPress.org Slack](https://make.wordpress.org/chat/) の `#cli` チャンネルに参加して、そこにいる人に尋ねてみてください。これがもっとも手っ取り早い方法です。
* WordPress サポートフォーラムに[新しいスレッドを投稿](https://wordpress.org/support/forum/wp-advanced/#new-post)し、'wp-cli' というタグを付けてコミュニティ内で見つけやすくします。

GitHub Issues は、既存のコマンドの改良やバグを追跡するために使用されており、一般的なサポートのためには使用されていません。バグレポートを投稿する際には、[ベストプラクティス](https://make.wordpress.org/cli/handbook/bug-reports/)を確認して、あなたが抱える問題が適時確実に伝わるように心がけてください。

Twitter でサポート用の質問を尋ねるのはおやめください。Twitter は、1) 文字数が280文字以下であり会話を行うのが難しい、2) 過去の会話から他の人の同じ質問を検索することが難しい、などの理由によりサポートを行う場としてふさわしくありません。

自由は無料とは違います。オープンソースはあなたに自由に使ったり編集したりする権利を保証しますが、他の誰かの時間を浪費することを保証しているわけではありません。敬意をもって、過度な期待をしないように心がけてください。

## 拡張

それぞれの **コマンド** は、WP-CLI の関数の一つとして定義されています。`wp plugin install` ([ドキュメント](https://developer.wordpress.org/cli/commands/plugin/install/)) はそのうちの一つで、`wp plugin activate` ([ドキュメント](https://developer.wordpress.org/cli/commands/plugin/activate/)) もまたそのうちの一つです。

WP-CLI では、さまざまな実行可能なクラス、関数、クロージャをコマンドとして実行することが可能です。コマンドとして実行されるために必要な情報は、PHPdoc によって記述します。 `WP_CLI::add_command()` ([ドキュメント](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)) は、内部コマンドおよびサードパーティコマンドの登録に使用されています。

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

WP-CLI は、多くのコマンドにより構成されており、カスタムコマンドを作ることは意外と簡単です。詳しくは [commands cookbook](https://make.wordpress.org/cli/handbook/commands-cookbook/) を読んでください。[内部 API のドキュメント](https://make.wordpress.org/cli/handbook/references/internal-api/)を参照すると、カスタムコマンドで使用できるさまざまな便利機能が見つかります。

## 貢献

ようこそ、そしてありがとう ！

私たちは、みなさんが率先して貢献してくれることに感謝しています。あなたやあなたのまわりのコミュニティによって、WP-CLI はすばらしいプロジェクトになります。

**貢献は単にコードだけではありません。** 私たちは、チュートリアルを書いたり、地元のミートアップでデモを行ったり、ユーザーの質問に回答したり、ドキュメントを改訂したりと、あなたの能力に合った方法で貢献していただきたいと思っています。

ハンドブックに掲載されている[貢献者向けガイドライン](https://make.wordpress.org/cli/handbook/contributions/contributing/)を読めば、あなたがどのように参加できるか詳しく知ることができます。このガイドラインに従うことで、本プロジェクトの他の貢献者たちとのコミュニケーションを円滑にすることができます。彼らは、世界をまたがってあなたと一緒に働くことに、最大限の敬意を払う努力をします。

### プロジェクトリーダー

WP-CLI にはプロジェクトメンテナーがいます: [schlessera](http://github.com/schlessera) です。

能力があり、プロジェクトを発展させるために時間をかけて投資していることを示してくれたコントリビューターへ、[コミット権限を与えることがあります](https://make.wordpress.org/cli/handbook/committers-credo/)。

プロジェクトの運営に関する詳細については、[ハンドブック内のガバナンス](https://make.wordpress.org/cli/handbook/governance/)を読んでください。

## クレジット

[composer.json](https://github.com/wp-cli/wp-cli/blob/master/composer.json) に記載されているライブラリに依存しており、以下のプロジェクトからコードやアイディアを得ています。

* [Drush](https://github.com/drush-ops/drush) for... a lot of things
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) for `wp shell`
* [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) for `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) for `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) for `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) for `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) for `wp scaffold plugin-tests`
