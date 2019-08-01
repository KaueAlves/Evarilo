<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'db_evarilo' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|3zPnks@[E77n:+%r;B9Fn`=)2OhF]!F5:Nz$gRjlU}@7P4A0_0s=z4VB#=SxG@/' );
define( 'SECURE_AUTH_KEY',  '3$1N=EYha >+23D?vmpde su>_C$ J99:7#&cH;,m5FH?mvxqB~xlD4GJtjlk0.6' );
define( 'LOGGED_IN_KEY',    '::DRdf;&Hkd6M2N6_;#5Xa6V#?A8HPr1)B^GoBp-Y)GMoPKJ;=N;8#uOP3hr O)S' );
define( 'NONCE_KEY',        '.;f5_YOHd+}O^_Hh/BXwn*Tjc^/J)K{}[HP.J41Z,+?_9zqcdQU}As-Q.KBOP.5]' );
define( 'AUTH_SALT',        'QN+?aJ9NKH;?]7+T`dw+6$Jp>J:*%wpD-W/h`ANcoGcjt$>g>o9#C!UCOf4jw@vc' );
define( 'SECURE_AUTH_SALT', '(C3=6 <q(Z|FDQ3KdA~gHxDyMy;tvBMGv=o:80y[+>zn3%@iEo,rJdat@qR$qOwX' );
define( 'LOGGED_IN_SALT',   '7a%g@~F.)0,w3Fs$~v,N!(wb*(y@^DjC,VYNcIl0!E=8s-:4h?7Gq3y7Ue+L$%6)' );
define( 'NONCE_SALT',       '{=S?WL5dO;Y}nRUhH>MsI^Jy|2|TmG-e!!^5ho|@iln6` _NdiRkb%pwW`jWZ2;,' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
