---
layout: default
title: WP-CLI | WP-CLI
direction: ltr
---

[WP-CLI](https://wp-cli.org/) 是 [WordPress](https://wordpress.org/) 的命令行接口。无需使用浏览器，你即可更新插件、配置多站点安装以及完成更多操作。

持续维护由以下机构赞助：

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

当前稳定版本为 [2.12.0](https://make.wordpress.org/cli/2025/05/07/wp-cli-v2-12-0-release-notes/)。获取公告可关注 [Twitter 上的 @wpcli](https://twitter.com/wpcli) 或 [订阅邮件更新](https://make.wordpress.org/cli/subscribe/)。前往[路线图](https://make.wordpress.org/cli/handbook/roadmap/)查看未来版本的规划概览。

[![Testing](https://github.com/wp-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/wp-cli/automated-tests/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](https://isitmaintained.com/project/wp-cli/wp-cli "Percentage of issues still open")

快速链接：[使用](#使用) &#124; [安装](#安装) &#124; [支持](#支持) &#124; [扩展](#扩展) &#124; [贡献](#贡献) &#124; [致谢](#致谢)

## 使用

WP-CLI 为许多你可能在 WordPress 管理后台执行的操作提供了命令行界面。例如，`wp plugin install --activate`（[文档](https://developer.wordpress.org/cli/commands/plugin/install/)）可以让你安装并激活一个 WordPress 插件：

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

WP-CLI 也包含许多你无法在后台直接完成的命令。例如，`wp transient delete --all`（[文档](https://developer.wordpress.org/cli/commands/transient/delete/)）可以删除一个或所有 transient（临时缓存）：

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

如需更完整的使用介绍，请阅读[快速入门指南](https://make.wordpress.org/cli/handbook/quick-start/)。或者，查看[shell friends](https://make.wordpress.org/cli/handbook/shell-friends/)学习常用的命令行工具。

已经熟悉基础？前往[完整命令列表](https://developer.wordpress.org/cli/commands/)获取关于管理主题与插件、数据导入导出、执行数据库搜索替换等的详细信息。

## 安装

对于大多数用户，我们推荐通过下载 Phar 文件的方式安装。必要时也可以参阅[其它安装方法](https://make.wordpress.org/cli/handbook/installing/)（[Composer](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer)、[Homebrew](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew)、[Docker](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker)）。

在安装 WP-CLI 之前，请确保你的环境满足以下最低要求：

- 类 UNIX 环境（OS X、Linux、FreeBSD、Cygwin）；Windows 环境支持有限
- PHP 5.6 或更高版本
- WordPress 3.7 或更高版本。低于最新版的 WordPress 可能会有功能退化

确认满足要求后，使用 `wget` 或 `curl` 下载 [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) 文件：

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

接着，检查 Phar 文件以确认其是否可用：

```bash
php wp-cli.phar --info
```

若希望在命令行中通过 `wp` 使用 WP-CLI，请将该文件设为可执行并移动到 `PATH` 中的某个位置。例如：

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

如果 WP-CLI 安装成功，运行 `wp --info` 应看到类似如下的输出：

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

### 更新

你可以通过 `wp cli update`（[文档](https://developer.wordpress.org/cli/commands/cli/update/)）更新 WP-CLI，或重复安装步骤进行更新。

如果 WP-CLI 由 root 或其他系统用户拥有，你需要运行 `sudo wp cli update`。

想体验前沿版本？运行 `wp cli update --nightly` 以使用最新的每夜构建。每夜构建在开发环境中总体上足够稳定，并且始终包含最新与最棒的 WP-CLI 功能。

### Tab 自动补全

WP-CLI 还提供适用于 Bash 与 ZSH 的 Tab 补全脚本。只需下载 [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v2.12.0/utils/wp-completion.bash) 并在 `~/.bash_profile` 中进行 source：

```bash
source /FULL/PATH/TO/wp-completion.bash
```

别忘了随后运行 `source ~/.bash_profile`。

如果你的 shell 使用 zsh，在 source 之前可能需要加载并启动 `bashcompinit`。将以下内容放入你的 `.zshrc`：

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## 支持

WP-CLI 的维护者与贡献者在处理一般支持问题上的时间有限。[WP-CLI 的当前版本](https://make.wordpress.org/cli/handbook/roadmap/)是唯一官方支持的版本。

在寻找支持时，请先在以下渠道搜索你的问题：

- [常见问题与解决方案](https://make.wordpress.org/cli/handbook/common-issues/)
- [WP-CLI 手册](https://make.wordpress.org/cli/handbook/)
- [WP-CLI 组织下的 GitHub 问题（开放或已关闭）](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue)
- [WordPress.org 论坛中标记为“WP-CLI”的讨论串](https://wordpress.org/support/topic-tag/wp-cli/)
- [WordPress StackExchange 上标记为“WP-CLI”的问题](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

如果在上述渠道仍未找到答案，你可以：

- 加入 [WordPress.org Slack](https://make.wordpress.org/chat/) 的 `#cli` 频道，与当时在线的社区成员交流。该选项最适合快速问题。
- 在 WordPress.org 支持论坛[发布新帖](https://wordpress.org/support/forum/wp-advanced/#new-post)，并添加“WP-CLI”标签，以便被社区看到。

GitHub issue 用于跟踪现有命令的增强与缺陷，而不是一般支持。提交缺陷报告之前，请先[阅读我们的最佳实践](https://make.wordpress.org/cli/handbook/bug-reports/)，以帮助确保你的问题能得到及时处理。

请不要在 Twitter 上提出支持问题。Twitter 并非合适的支持渠道，因为：1）在 280 个字符内难以进行对话；2）Twitter 不是一个可以让有相同问题的人检索以往对话的地方。

请记住，libre != gratis；开源许可赋予你使用与修改的自由，但并不意味着他人的时间承诺。请保持尊重，并合理设置你的期望。

## 扩展

**命令** 是 WP-CLI 功能的原子单位。`wp plugin install`（[文档](https://developer.wordpress.org/cli/commands/plugin/install/)）是一个命令，`wp plugin activate`（[文档](https://developer.wordpress.org/cli/commands/plugin/activate/)）是另一个命令。

WP-CLI 支持将任意可调用的类、函数或闭包注册为命令。它会从回调的 PHPDoc 中读取用法细节。`WP_CLI::add_command()`（[文档](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)）既用于内部命令也用于第三方命令的注册。

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

WP-CLI 自带数十个命令。创建自定义 WP-CLI 命令并没有看起来那么难。阅读[命令手册](https://make.wordpress.org/cli/handbook/commands-cookbook/)了解更多。浏览[内部 API 文档](https://make.wordpress.org/cli/handbook/internal-api/)，发现可在自定义命令中使用的多种辅助函数。

## 贡献

感谢你主动为 WP-CLI 做出贡献。正因为有你以及你周围的社区，WP-CLI 才能成为如此优秀的项目。

**贡献不局限于代码。** 我们鼓励你以最适合自己能力的方式贡献，比如撰写教程、在本地聚会上进行演示、帮助其他用户解决支持问题，或完善我们的文档。

请阅读[手册中的贡献指南](https://make.wordpress.org/cli/handbook/contributing/)，以全面了解你可以如何参与。遵循这些指南能传达你尊重项目其他贡献者时间的态度。相应地，他们也会尽力在与你合作时回馈这种尊重，不论时区与地域。

## 管理者

WP-CLI 目前有一位项目维护者：[schlessera](https://github.com/schlessera)。

在特定情况下，我们会[授予贡献者写入权限](https://make.wordpress.org/cli/handbook/committers-credo/)，前提是他们在一段时间内证明了自己有能力并致力于推动项目前进。

请阅读[手册中的治理文档](https://make.wordpress.org/cli/handbook/governance/)，了解项目的更多运作细节。

## 致谢

除了在 [composer.json](composer.json) 中定义的库之外，我们还使用或借鉴了以下项目的代码或思想：

- [Drush](https://github.com/drush-ops/drush)
- [wpshell](https://code.trac.wordpress.org/browser/wpshell)（用于 `wp shell`）
- [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)（用于 `wp media regenerate`）
- [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB)（用于 `wp search-replace`）
- [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter)（用于 `wp export`）
- [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer)（用于 `wp import`）
- [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/)（用于 `wp scaffold plugin-tests`）
