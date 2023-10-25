---
layout: default
title: Interface para linha de comando para o WordPress
direction: ltr
---

[WP-CLI](https://wp-cli.org/) é a interface em linha de comando para o [WordPress](https://br.wordpress.org/). Você pode atualizar plugins, configurar instalações multisite e muito mais, sem utilizar um navegador web.

A manutenção contínua é possível graças aos seguintes patrocinadores:

<a href="https://automattic.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img src="https://make.wordpress.org/cli/files/2017/04/automattic-1.png" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" alt="" width="320" height="70" class="aligncenter size-full wp-image-347" /></a>
<a href="https://www.bluehost.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-335" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2017/04/bluehost.png" alt="" width="320" height="52" /></a>
<a href="https://pantheon.io/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2019/06/pantheon.png" alt="" width="320" height="100" /></a>
<a href="https://www.siteground.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-332" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2019/06/SG_logo.png" alt="" width="320" height="66" /></a>
<a href="https://wpengine.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2017/04/wpengine.png" alt="" width="320" height="60" /></a>
<a href="https://www.cloudways.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full wp-image-3229" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.wordpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="" width="320" height="62" /></a>

A versão estável mais recente é a [2.9.0](https://make.wordpress.org/cli/2023/10/25/wp-cli-v2-9-0-release-notes/). Para manter-se atualizado, siga [@wpcli no Twitter](https://twitter.com/wpcli) ou [assine nossa newsletter](https://make.wordpress.org/cli/subscribe/). [Leia nosso plano de ação](https://make.wordpress.org/cli/handbook/roadmap/) para uma visão geral do que está sendo planejado para próximas versões.

[![Testing](https://github.com/wp-cli/wp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/wp-cli/wp-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/wp-cli/wp-cli.svg)](http://isitmaintained.com/project/wp-cli/wp-cli "Tempo médio para resolver um issue") [![Percentage of issues still open](http://isitmaintained.com/badge/open/wp-cli/wp-cli.svg)](http://isitmaintained.com/project/wp-cli/wp-cli "Percentual de issues ainda abertos")

Links rápidos: [Usando](#usando) &#124; [Instalando](#instalando) &#124; [Suporte](#suporte) &#124; [Estendendo](#estendendo) &#124; [Contribuindo](#contribuindo) &#124; [Créditos](#créditos)

## Usando

O objetivo da WP-CLI é fornecer uma interface em linha de comando para muitas das ações que você pode executar na administração do WordPress. Por exemplo, `wp plugin install --activate` ([doc](https://developer.wordpress.org/cli/commands/plugin/install/)) permite a instalação e ativação de um plugin WordPress:

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

A WP-CLI também inclui muitos comandos para ações que não são possíveis através da administração do WordPress. Por exemplo, `wp transient delete --all` ([doc](https://developer.wordpress.org/cli/commands/transient/delete/)) permite excluir um ou todos os transients:

```bash
$ wp transient delete --all
Success: 34 transients deleted from the database.
```

Para uma introdução mais completa sobre como usar a WP-CLI, leia o [Guia rápido](https://make.wordpress.org/cli/handbook/quick-start/). Veja também os [shell friends](https://make.wordpress.org/cli/handbook/shell-friends/) para saber mais sobre utilitários de linha de comando.

Já se sente confortável com o básico? Vá para a [lista completa de comandos](https://developer.wordpress.org/cli/commands/) para informações detalhadas sobre gerenciamento de temas e plugins, importação e exportação de dados, operações de busca e substituição no banco de dados e muito mais.

## Instalando

Baixar o arquivo Phar é o método de instalação que recomendamos para a maioria dos usuários. Caso precise, veja também a documentação sobre [métodos alternativos de instalação](https://make.wordpress.org/cli/handbook/installing/) ([Composer](https://make.wordpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.wordpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.wordpress.org/cli/handbook/installing/#installing-via-docker)).

Antes de instalar a WP-CLI, tenha certeza de que seu ambiente cumpre os requisitos mínimos:

- Ambiente UNIX-like (OS X, Linux, FreeBSD, Cygwin); suporte limitado para ambientes Windows
- PHP 5.6 ou superior
- WordPress 3.7 ou superior. Versões do WordPress anteriores à mais recente podem ter funcionalidade reduzida

Após verificar os requisitos, baixe o arquivo [wp-cli.phar](https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar) usando `wget` ou `curl`:

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

Em seguida, verifique se o arquivo phar está funcionando:

```bash
php wp-cli.phar --info
```

Para usar a WP-CLI na linha de comando usando apenas `wp`, torne o arquivo executável e mova-o para algum diretório presente em sua variável de ambiente PATH. Por exemplo:

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

Se a WP-CLI foi instalada corretamente, ao executar `wp --info` você deverá ver algo como:

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
WP-CLI version: 2.9.0
```

### Atualizando

WP-CLI pode ser atualizada com `wp cli update` ([doc](https://developer.wordpress.org/cli/commands/cli/update/)) ou repetindo os passos da instalação.

Se o proprietário do arquivo da WP-CLI for root ou outro usuário do sistema, será necessário executar `sudo wp cli update`.

Quer viver no limite? Execute `wp cli update --nightly` para usar a última compilação de desenvolvimento da WP-CLI. Essa versão é estável o suficiente para ser usada em seu ambiente de desenvolvimento e sempre inclui as melhores e mais recentes funcionalidades da WP-CLI.

### Autocompletar com tab

A WP-CLI também possui scripts de autocompletar para Bash ou ZSH. Baixe [wp-completion.bash](https://raw.githubusercontent.com/wp-cli/wp-cli/v2.9.0/utils/wp-completion.bash) e carregue-o através do `~/.bash_profile`:

```bash
source /FULL/PATH/TO/wp-completion.bash
```

Não se esqueça de executar `source ~/.bash_profile` em seguida.

Se estiver usando zsh como shell, pode ser necessário carregar e iniciar `bashcompinit` antes de carregá-lo. Inclua o seguinte no seu `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/wp-completion.bash
```

## Suporte

Os responsáveis e os colaboradores da WP-CLI possuem disponibilidade limitada para atender a questões gerais de suporte. A [versão atual da WP-CLI](https://make.wordpress.org/cli/handbook/roadmap/) é a única com suporte oficial.

Ao procurar por suporte, pesquise primeiro por sua dúvida nas fontes abaixo:

* [Questões comuns e suas respostas](https://make.wordpress.org/cli/handbook/common-issues/)
* [Manual da WP-CLI](https://make.wordpress.org/cli/handbook/)
* [Questões abertas ou fechadas no GitHub da WP-CLI](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Awp-cli+is%3Aissue)
* [Tópicos com a tag 'WP-CLI' no fórum de suporte do WordPress.org](https://wordpress.org/support/topic-tag/wp-cli/)
* [Questões com a tag 'WP-CLI' no WordPress StackExchange](https://wordpress.stackexchange.com/questions/tagged/wp-cli)

Se você não encontrou uma resposta em nenhum dos endereços acima, você pode:

* Entrar para o canal `#cli` no [Slack Internacional do WordPress.org](https://make.wordpress.org/chat/) para conversar com quem estiver disponível no momento. Esta opção é a melhor para perguntas rápidas.
* [Criar um novo tópico](https://wordpress.org/support/forum/wp-advanced/#new-post) no fórum internacional do WordPress.org e colocar a tag 'WP-CLI' para que ele seja encontrado pela comunidade.

Issues do GitHub são usadas para acompanhar melhorias e erros dos comandos existentes, não para suporte em geral. Antes de informar um erro, veja [nossas boas práticas](https://make.wordpress.org/cli/handbook/bug-reports/) para que o problema possa ser resolvido em tempo hábil.

Não faça perguntas de suporte no Twitter. O Twitter não é um lugar aceitável para suporte porque: 1) é difícil conversar com apenas 280 caracteres e 2) o Twitter não é um lugar onde alguém com a mesma pergunta possa procurar por uma resposta de uma conversa anterior.

Lembre-se: libre != gratis; A licença do código aberto dá para você a liberdade de usar e modificar, mas não gera compromissos com o tempo dos outros. Seja respeitoso e regule suas expectativas.

## Estendendo

Um **comando** é a unidade atômica de funcionalidade da WP-CLI. `wp plugin install` ([doc](https://developer.wordpress.org/cli/commands/plugin/install/)) é um comando. `wp plugin activate` ([doc](https://developer.wordpress.org/cli/commands/plugin/activate/)) é outro.

A WP-CLI suporta o registro de qualquer classe ou função como um comando. Ela lê os detalhes de uso através do callback do PHPdoc. `WP_CLI::add_command()` ([doc](https://make.wordpress.org/cli/handbook/internal-api/wp-cli-add-command/)) é usado para registo de comandos internos e de terceiros.

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

A WP-CLI vem com vários comandos. Criar um comando personalizado para WP-CLI é mais fácil do que parece. Leia o [livro de receitas de comandos](https://make.wordpress.org/cli/handbook/commands-cookbook/) para saber mais. Navegue pela [documentação de API interna](https://make.wordpress.org/cli/handbook/internal-api/) para descobrir umaa variedade de funções úteis que você pode utilizar no seu comando personalizado para WP-CLI.

## Contribuindo

Nós agradecemos sua iniciativa em contribuir com a WP-CLI. É por sua causa, e pela comunidade à sua volta, que a WP-CLI é um projeto tão legal.

**Contribuir não é limitado somente a código.** Nós encorajamos você a contribuir da maneira que melhor se encaixar em suas habilidades, escrevendo tutoriais, com demonstrações em meetups locais, ajudando outros usuários respondendo suas dúvidas no fórum ou revisando nossa documentação.

No manual, dê uma olhada nas nossas [diretrizes para contribuir](https://make.wordpress.org/cli/handbook/contributing/) para uma introdução completa sobre como participar. Seguir esses passos ajuda a passar a ideia de que você respeita o tempo dos outros colaboradores. Por sua vez, eles farão o melhor para retribuir esse respeito ao trabalhar com você, nos diferentes fusos horários, em todo o mundo.

## Liderança

A WP-CLI tem um responsável pelo projeto: [schlessera](http://github.com/schlessera).

Quando necessário, [damos permissão de escrita para colaboradores](https://make.wordpress.org/cli/handbook/committers-credo/) que demonstraram sua capacidade durante algum tempo e que se esforçaram para levar o projeto adiante.

Leia o [documento sobre governança no manual](https://make.wordpress.org/cli/handbook/governance/) para mais detalhes operacionais do projeto.

## Créditos

Além das bibliotecas especificadas em [composer.json](/composer.json), usamos código ou ideias dos projetos abaixos:

* [Drush](https://github.com/drush-ops/drush) para... muitas coisas
* [wpshell](https://code.trac.wordpress.org/browser/wpshell) para `wp shell`
* [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/) para `wp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) para `wp search-replace`
* [WordPress-CLI-Exporter](https://github.com/Automattic/WordPress-CLI-Exporter) para `wp export`
* [WordPress-CLI-Importer](https://github.com/Automattic/WordPress-CLI-Importer) para `wp import`
* [wordpress-plugin-tests](https://github.com/benbalter/wordpress-plugin-tests/) para `wp scaffold plugin-tests`
