<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__)));


set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../lib'),
    get_include_path(),
)));

require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();


$config = new Zend_Config_Ini(APPLICATION_PATH.'/config.ini');


$gerator = new Zend_CodeGenerator_Php_File();

$db_ieducar = Zend_Db::factory($config->ieducar->db);

$sql_tables = new Zend_Db_Select($db_ieducar);

$sql_tables->from('information_schema.tables')->where('table_schema = ?', $config->ieducar->schema);

$tables = $db_ieducar->fetchAll($sql_tables);

foreach ($tables as $table){

    $result = $db_ieducar->describeTable($table['table_name'], $config->ieducar->schema);

    $conteudo = '// '.$config->ieducar->schema.'.'.$table['table_name'].PHP_EOL;
    $conteudo .= '$'.$table['table_name'].' = array(';

    foreach ($result as $coluna)
    {

       $conteudo .= '\''.$coluna['COLUMN_NAME'].'\', ';

    }
     $conteudo .= ');'.PHP_EOL.PHP_EOL; 
     $conteudo .= '$'.$table['table_name'].' = array('.PHP_EOL;
    foreach ($result as $coluna)
    {


        $conteudo .= '\''.$coluna['COLUMN_NAME'].'\',     // Tipo: '.$coluna['DATA_TYPE'].' Valor Padrão: '.$coluna['DEFAULT'].' Tamanho: '.$coluna['LENGTH'].PHP_EOL;

    }
      $conteudo .= ');'; 

    $gerator->setBody($conteudo);

    file_put_contents('tmp/ieducar/'.$config->ieducar->schema.'.'.$table['table_name'].'.php', $gerator->generate());

}