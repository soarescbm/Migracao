<?php 
class Servidor 
{
    /**
     * Conexação do banco de dados do iecidade
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db_ecidade;
    
     /**
     * Conexação do banco de dados do ieducar
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db_ieducar;
    
     /**
     * Conexação do banco de dados do ieducar
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db_arapiraca;
    
    /**
     * Configurações dos da aplicação
     * @var Zend_Config
     */
    protected $config;
    
    public function __construct(Zend_Config $config)
    {
       $this->config = $config;
       $this->setDb();
       
    }
    public function run()
    {  $this->info();
       $this->testConnection();
      $this->addServidor();
       
    }
    public function setDb()
    {
        
        $this->db_ecidade = Zend_Db::factory($this->config->ecidade->db);
        $this->db_ieducar = Zend_Db::factory($this->config->ieducar->db);
        $this->db_arapiraca = Zend_Db::factory($this->config->arapiraca->db);
    }
    public function testConnection()
    {
        try {
           $this->db_ecidade->getConnection();
           $this->db_ecidade->closeConnection();
        } catch (Zend_Db_Exception $e){
            $this->showMessage('Conexao com o banco de dados do e-Cidade falhou!',2);
            exit();
        }
        try {
             $this->db_ieducar->getConnection();
             $this->db_ieducar->closeConnection();
        } catch (Zend_Db_Exception $e){
            $this->showMessage('Conexao com o banco de dados do i-Educar falhou!',2);
            exit();
        }
         try {
             $this->db_arapiraca->getConnection();
             $this->db_arapiraca->closeConnection();
        } catch (Zend_Db_Exception $e){
            $this->showMessage('Conexao com o banco de dados da Prefeitura falhou!',2);
            exit();
        }
        
       
    }
    
    public function info()
    {   
        echo "\033[0;32m".PHP_EOL;
        echo "# Script de Migracao dos Dados do i-Educar para o Modulo Educacao do e-Cidade".PHP_EOL;
        echo "# Autor: Paulo Soares da Silva <pss18@educacao.arapiraca.al.gov.br".PHP_EOL;
        echo "# Versao: 1.0.0".PHP_EOL;
        echo "-----------------------------------------------------------------------------". PHP_EOL . PHP_EOL;
        echo "\033[0m";
    }
    
    
   
    public function showMessage($message, $type = 1)
    {
        if ($type == 1){
             echo "\033[0;32m " .$message. " \033[0m".PHP_EOL;
        } elseif($type == 2) {
             echo "\033[0;31m " .$message. " \033[0m".PHP_EOL;
        }
    }
   
    public function addServidor() {
        
       
        
         $select = new Zend_Db_Select($this->db_ieducar);
         $select->from(array('a'=>'servidor'),array('a.cod_servidor', 'a.ref_cod_deficiencia', 'a.ref_idesco', 'a.carga_horaria', 'data_cadastro', 'a.ativo'), 'pmieducar')
                ->joinLeft(array('b'=>'fisica'), 'a.cod_servidor = b.idpes',array( 'b.data_nasc', 'b.sexo', 'b.cpf','b.ideciv','b.nacionalidade', 'b.idpais_estrangeiro', 'idmun_nascimento'), 'cadastro')
                ->order('a.cod_servidor');
         
          $result = $this->db_ieducar->fetchAll($select);
          
          $i = 0;
          $tudo  = '$servidor  = array('.PHP_EOL;
          foreach ($result as $r){
              if( $r['cpf'] != ''){
                  $cpf = $r['cpf'];
                  
                  //tratamento de cpf: zeros iniciais são desconsiderados no db do ieducar
                  $zeros = '';
                  $tamanho = strlen($cpf);
                  switch ($tamanho) {
                      case 10:  $zeros = '0';                           
                          break;
                      case 9:  $zeros = '00';                           
                          break;
                      default: $zeros = '';
                          break;
                  }
                  $cpf = $zeros.$cpf;
                  
                  $where = $this->db_arapiraca->quoteInto('a.z01_cgccpf = ?', $cpf);
                  $selectCGM = new Zend_Db_Select($this->db_arapiraca);
                  $selectCGM->from(array('a'=>'cgm'),array('*'), 'protocolo')
                        ->where($where);
                  
                  $resultCGM = $this->db_arapiraca->fetchAll($selectCGM);
                  
                  if(count($resultCGM) > 0 ){
                      
                      $cgm = $resultCGM[0];
                      
                      /**
                      
                      if($cgm['z01_trabalha'] == ''){
                         $cgm['z01_trabalha'] = 'false';
                      }
                  
                      try {
                        //var_dump($cgm);
                        $this->db_ecidade->insert('protocolo.cgm', $cgm);
                        $this->showMessage($i .': CGM - '.$cgm['z01_numcgm'].' importado');
                   
                     } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2); 
                        exit;
                     }
                      **/
                                          

                   $conteudo = ' array('.PHP_EOL;
    
                    foreach ($cgm as $key => $value){

                        $conteudo .= '\''.$key.'\' => \''.$value. '\','.PHP_EOL; 

                    }
                    $conteudo = substr($conteudo, 0, -2);
                    $conteudo .= ')';
                    
                  
                    $tudo .=   $conteudo.','.PHP_EOL;  
                     

                  }
                   
              }
          }
          $tudo = substr($tudo, 0,-2); 
          $tudo .= ');';
                 
          $gerator = new Zend_CodeGenerator_Php_File();
          $gerator->setBody($tudo);
          file_put_contents('tmp/servidores.php', $gerator->generate());
          include_once 'tmp/servidores.php';
          $total = count($servidor);
          $this->showMessage($total.' - Servidores identificados',1); 
          
    }  
  
}
