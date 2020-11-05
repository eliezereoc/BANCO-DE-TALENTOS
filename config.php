<?php
	define('DB_NAME', 'bd_telentos');// O nome do banco de dados
	define('DB_USER', 'root');// Usuário do banco de dados MySQL 
	define('DB_PASSWORD', '123456');// Senha do banco de dados MySQL
	define('DB_HOST', 'localhost');// nome do host do MySQL
	if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');// caminho absoluto para a pasta do sistema
	if ( !defined('BASEURL') ) define('BASEURL', '/formcad/');// caminho no server para o sistema 
	if ( !defined('DBAPI') ) define('DBAPI', ABSPATH . 'database.php');// caminho do arquivo de banco de dados
	define('HEADER_TEMPLATE', ABSPATH . 'includes/menu.php');// caminhos dos templates de menu	
	define('FOOTER_TEMPLATE', ABSPATH . 'includes/footer.php');// caminhos dos templates de footer
?>
