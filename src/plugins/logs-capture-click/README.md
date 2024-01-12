# WP-CLI Report

## Descrição

Este é um plugin WP-CLI que permite imprimir um relatório de histórico de cliques capturados.

## Instalação

1. Certifique-se de ter o WP-CLI instalado em seu sistema. Se não, você pode instalá-lo seguindo as instruções na [página oficial do WP-CLI](https://wp-cli.org/).

2. Clone este repositório para o diretório de plugins do seu projeto WordPress.

3. Ative o plugin através da interface de administração do WordPress ou usando o comando `wp plugin activate nome-do-plugin`.

## Uso

Depois de instalar e ativar o plugin, você pode usar o comando `wp report_capture` para imprimir um relatório de histórico de cliques capturados.

Por padrão, o comando imprimirá as 5 últimas entradas. Se você quiser imprimir um número diferente de entradas, você pode fazer isso passando um argumento para o comando. Por exemplo, para imprimir as 10 últimas entradas, você pode digitar `wp report_capture --number=10`.

## Licença

Este plugin é licenciado sob a licença GPL2.
