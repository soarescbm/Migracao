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

$db_ecidade = Zend_Db::factory($config->ecidade->db);

$sql_arquivos = new Zend_Db_Select($db_ecidade);
$sql_campos = new Zend_Db_Select($db_ecidade);

// Sql da consulta dos arquivos dos módulo especificado
$sql_arquivos->from(array('a' => 'db_sysarquivo'), array('a.*'), $config->ecidade->schema)
                                ->join(array('b' => 'db_sysarqmod'), 'a.codarq = b.codarq',array('b.codmod'), $config->ecidade->schema)
                                ->where('b.codmod = ?', $config->ecidade->modulo);
// Arquivos
$arquivos = $db_ecidade->fetchAll($sql_arquivos);


$sql_campos->from(array('a' => 'db_syscampo'), array('a.*'), $config->ecidade->schema)
                        ->join(array('b' => 'db_sysarqcamp'), 'a.codcam = b.codcam',array('b.codarq'), $config->schema);
                              

foreach ($arquivos as $arquivo){
    
    $sql_campos = new Zend_Db_Select($db_ecidade);
    $sql_campos->from(array('a' => 'db_syscampo'), array('a.*'), $config->ecidade->schema)
                        ->join(array('b' => 'db_sysarqcamp'), 'a.codcam = b.codcam',array('b.codarq'), $config->ecidade->schema);
    $sql_campos->where('b.codarq = ?', $arquivo['codarq']);
    
    $campos = $db_ecidade->fetchAll($sql_campos);
    $nomeArquivo = Zend_Filter::filterStatic($arquivo['nomearq'], 'StringTrim');
    
    $conteudo = '// '.$nomeArquivo. ' - '.$arquivo['descricao'].PHP_EOL;
    $conteudo .= '$'.$nomeArquivo.' = array('.PHP_EOL;
    
    foreach ($campos as $campo){
       
        $conteudo .= '\''.Zend_Filter::filterStatic($campo['nomecam'], 'StringTrim').'\' => \'\',  // '.Zend_Filter::filterStatic($campo['rotulo'], 'StringTrim').' - tipo: '.$campo['conteudo'].PHP_EOL; 
        
    }
    $conteudo .= ');';
    $gerator->setBody($conteudo);
    
       
    
    file_put_contents('tmp/ecidade/pessoal/'.$nomeArquivo.'.php', $gerator->generate());
}




?>
