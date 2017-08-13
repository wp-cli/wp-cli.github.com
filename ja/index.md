---
layout: default
title: Command line interface for WordPress
---

[WP-CLI](https://wp-cli.org/) は [WordPress](https://wordpress.org/) を管理するためのコマンドラインインターフェースです。
プラグインのアップデートやマルチサイトのセットアップなどの多くのことをブラウザ無しで行うことができます。

現在のメンテナンスは、以下の企業のサポートにより支えられています。

<a href="https://automattic.com/"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full wp-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full wp-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://www.dreamhost.com/"><img class="aligncenter size-full wp-image-324" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/dreamhost.png" alt="" width="160" height="30" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full wp-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/siteground.png" alt="" width="160" height="33" /></a> <a href="https://wpengine.com/"><img class="aligncenter size-full wp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="160" height="30" /></a>

最新情報を得たい人は、[@wpcli on Twitter](https://twitter.com/wpcli) をフォローするか、[メーリングリストにサインアップ](http://wp-cli.us13.list-manage.com/subscribe?u=0615e4d18f213891fc000adfd&id=8c61d7641e)してください。[ロードマップ](https://make.wordpress.org/cli/handbook/roadmap/)で、今後のリリースの予定をしることができます。

[![Build Status](https://travis-ci.org/wp-cli/wp-cli.svg?branch=master)](https://travis-ci.org/wp-cli/wp-cli) [![Dependency Status](https://gemnasium.com/badges/github.com/wp-cli/wp-cli.svg)](https://gemnasium.com/github.com/wp-cli/wp-cli) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Percentage of issues still open")

Quick links: [使い方](#section) &#124; [インストール方法](#section-1) &#124; [サポート](#section-4) &#124; [拡張](#section-5) &#124; [貢献](#section-6) &#124; [クレジット](#section-8)

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

さらに WP-CLI は、WordPress の管理画面ではできない多くのことが可能です。たとえば、`wp transient delete --all` ([doc](https://developer.wordpress.org/cli/commands/transient/delete/)) は、Transient に保存されているすべてのデータを削除することを可能にしています。

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

WP-CLI の使い方に関するさらに詳しい情報は、[クイックスタートガイド](https://make.wordpress.org/cli/handbook/quick-start/)を読んでください。または、[shell friends](https://make.wordpress.org/cli/handbook/shell-friends/) で便利なコマンドラインユーティリティについて学ぶことができます。

もし、すでに基本的なことを理解しているなら、[コマンドリスト](https://developer.wordpress.org/cli/commands/)にジャンプして、テーマやプラグインの管理、データのインポートやエクスポート、データベースの操作などについての詳細をみてください。

## インストール方法

Phar ファイルをダウンロードする方法が、私たちが推奨するインストール方法です。必要なら[上級者向けインストール方法](https://make.wordpress.org/cli/handbook/installing/)(英語)を見てください。

WP-CLI をインストールする前に、動作環境を確認してください。

- UNIX 系の環境 (OS X, Linux, FreeBSD, Cygwin); Windows では一部の機能に制限があります。
- PHP 5.3.29 またはそれ以降のバージョン
- WordPress 3.7 またはそれ以降のバージョン

動作条件を再度確認してから、`wget`または`curl`を使用して [wp-cli.phar](https://raw.github.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) をダウンロードしてください。

```bash
$ curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

次に、Phar ファイルが動作していることを確認してください。

```bash
$ php wp-cli.phar --info
```

WP-CLI コマンドを`wp`で実行するには、それに実行権限があることと環境変数`PATH`に登録されていることが必要です。

```bash
$ chmod +x wp-cli.phar
$ sudo mv wp-cli.phar /usr/local/bin/wp
```

もし、WP-CLI のインストールが成功していれば、`wp --info`を実行したら以下のように出力されるはずです。

```bash
$ wp --info
PHP binary:    /usr/bin/php5
PHP version:    5.5.9-1ubuntu4.14
php.ini used:   /etc/php5/cli/php.ini
WP-CLI root dir:        /home/wp-cli/.wp-cli
WP-CLI packages dir:    /home/wp-cli/.wp-cli/packages/
WP-CLI global config:   /home/wp-cli/.wp-cli/config.yml
WP-CLI project config:
WP-CLI version: 1.2.1
```

## アップデート

WP-CLI をアップデートするには、`wp cli update` ([doc](https://developer.wordpress.org/cli/commands/cli/update/)) を実行するか、上述のインストール方法を再度行う必要があります。

WP-CLI のオーナーが root もしくは他のシステム管理者になっている場合は、`sudo wp cli update` と実行する必要があります。

もっととんがった生き方をしたい？ `wp cli update --nightly` を実行すれば、最新の開発者向けバージョンの WP-CLI を使用することができます。開発者向けバージョンは、あなたの開発環境で使用するのに十分な信頼性があり、つねに最新の機能を使用することができます。

## タブ補完

WP-CL には、Bash 及び ZSH 用のタブ補完用のスクリプトがあります。 [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/master/utils/wp-completion.bash) をダウンロードして、`~/.bash_profile` から読み込んでください。

```
source /FULL/PATH/TO/wp-completion.bash
```

`source ~/.bash_profile` を実行するのを忘れないでください。

ZSH の場合は、`bashcompinit` を読み込ませたあとに `wp-completion.bash` を読み込ませる必要があるかもしれません。`.zshrc` へ次のコードを追加してください。

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## サポート

WP-CLI のメンテナーとその貢献者たちが一般的な質問に答えられる時間は限られています。[最新版](https://make.wordpress.org/cli/handbook/roadmap/) のみが公式にサポートされるバージョンです。

もしサポートを探しているなら、まず初めに以下のリソースの中から答えを探してください。

* [Common issues and their fixes](https://make.wordpress.org/cli/handbook/common-issues/)
* [WP-CLI handbook](https://make.wordpress.org/cli/handbook/)
* [Open or closed issues on Github](https://github.com/wp-cli/wp-cli/issues?utf8=%E2%9C%93&q=is%3Aissue)
* [Threads tagged 'WP-CLI' in the WordPress.org support forum](https://wordpress.org/support/topic-tag/wp-cli/)
* [Questions tagged 'WP-CLI' in the WordPress StackExchange](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

もし、上のいずれかの方法で回答を見つけられなかった場合は:

* [WordPress.org Slack](https://make.wordpress.org/chat/) の `#cli` に参加して、そこにいる人に尋ねてみてください。これがもっとも手っ取り早い方法です。
* [WordPress サポートフォーラムで新しいスレッドを投稿](https://wordpress.org/support/forum/wp-advanced/#new-post) して、'wp-cli' というタグをつけてコミュニティが見つけやすくしてください。

GitHub Issues は、既存のコマンドの改良やバグを追跡するために使用されており、一般的なサポートのためには使用されていません。バグレポートを投稿する際には、[ベストプラクティス](https://make.wordpress.org/cli/handbook/bug-reports/)を確認して、あなたが抱える問題が適時確実に伝わるように心がけてください。

Twitterでサポート用の質問をたずねるのはおやめください。Twitterは、文字数が140文字以下であり会話を行うのが難しい、過去の会話から他の人の同じ質問を検索することが難しい、等の理由によりサポートを行う場としてふさわしくありません。

自由は無料とは違います。オープンソースはあなたに自由に使ったり編集したりする権利を保証しますが、他の誰かの時間を浪費することを保証しているわけではありません。敬意をもって、過度な期待をしないように心がけてください。

## 拡張

それぞれの **コマンド** は、WP-CLI の関数の一つとして定義されています。`wp plugin install` ([doc](https://developer.wordpress.org/cli/commands/plugin/install/)) はそのうちのひとつであり、`wp plugin activate` ([doc](https://developer.wordpress.org/cli/commands/plugin/activate/)) は別のもうひとつです。

WP-CLI では、様々な実行可能なクラス、関数、クロージャをコマンドとして実行することが可能です。コマンドとして実行されるために必要な情報は、PHPdoc によって記述します。 `WP_CLI::add_command()` ([doc](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)) は、内部コマンド及びサードパーティコマンドの登録に使用されています。

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

WP-CLI は、多くのコマンドにより構成されており、カスタムコマンドを作ることは意外と簡単です。[commands cookbook](https://make.wordpress.org/cli/handbook/commands-cookbook/)を読んでください。

## 貢献

ようこそ、そしてありがとう！

私たちは、みなさんが率先して貢献してくれることに感謝しています。あなたやあなたのまわりのコミュニティによって、WP-CLIはすばらしいプロジェクトになります。

**貢献は単にコードだけではありません。** 私たちは、チュートリアルを書く、地元のミートアップでデモを行う、ユーザーの質問への回答、ドキュメントの改訂など、あなたの日々の活動に応じた貢献をお願いしています。

プロジェクトに参加するには、ハンドブックの[貢献者向けガイドライン](https://make.wordpress.org/cli/handbook/contributing/)をよく読んでください。ここに書かれていることに従うことで、本プロジェクトの他の貢献者たちとのコミュニケーションを円滑にすることができます。彼らは、世界をまたがってあなたと一緒に働くことに、最大限の敬意を払う努力をします。

### プロジェクトリーダー

WP-CLI には2人のメンテナーがいます: [danielbachhuber](https://github.com/danielbachhuber) と [schlessera](http://github.com/schlessera) です。

能力があり、プロジェクトを発展させるために、時間をかけて投資していることを示してくれたコントリビューターへ、[コミット権限を与えることがあります](https://github.com/orgs/wp-cli/teams/committers)。

プロジェクトの運営に関する詳細については、[ハンドブック内のガバナンス](https://make.wordpress.org/cli/handbook/governance/) を読んで下さい。

## クレジット

[composer.json](composer.json) に記載されているライブラリに依存しており、以下のプロジェクトからコードやアイディアを得ています。

* [Drush](https://github.com/drush-ops/drush) for... a lot of things
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) for `wp shell`
* [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) for `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) for `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) for `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) for `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) for `wp scaffold plugin-tests`
