<?php 
class Logradouro 
{
    /**
     * Conexação do banco de dados do iecidade
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db_ecidade;
    
        
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
       $this->addLogradouro();
       
    }
    public function setDb()
    {
        
        $this->db_ecidade = Zend_Db::factory($this->config->ecidade->db);
        
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
        
       
    }
    
    public function info()
    {   
        echo "\033[0;32m".PHP_EOL;
        echo "# Script de Migracao dos logradoros de Arapiraca".PHP_EOL;
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
   
    public function addLogradouro() {
        
        $csv = APPLICATION_PATH."/ruas_bairros_arapiraca.csv";
        
        $fp = fopen($csv, 'r');
        // processa os dados do arquivo
        while(($dados = fgetcsv($fp, 0, ";")) !== FALSE){
            $quant_campos = count($dados);
                if ($dados[2] != '')  {      
                    //Adiciona Bairros
                    //Pesquisa a existencia do bairro no sistema
                    $where = $this->db_ecidade->quoteInto('a.j13_codi = ?',$dados[5]);
                    $selectbairro = new Zend_Db_Select($this->db_ecidade);
                    $selectbairro->from(array('a'=>'bairro'),array('a.j13_codi'), 'cadastro')
                                 ->where($where);
                    $resultbairro = $this->db_ecidade->fetchAll($selectbairro);
                    if(count($resultbairro) == 0){
                        $bairros = array(
                             'j13_codi'=>$dados[5],
                             'j13_descr'=>Zend_Filter::filterStatic(utf8_decode($dados[6]),'FullStringToUpper'),
                             'j13_rural'=>$dados[7]
                         );
                         try {
                            $bairro_id = $this->db_ecidade->insert('cadastro.bairro', $bairros);
                            $this->showMessage('Bairro adicionado.');

                        } catch (Zend_Db_Exception $e){
                                $this->showMessage($e->getMessage(),2); 
                                exit;
                        }
                    } 

                        //Pesquisa a existencia do logradouro no sistema
                    $where = $this->db_ecidade->quoteInto('a.j14_codigo = ?',$dados[2]);
                    $selectlog = new Zend_Db_Select($this->db_ecidade);
                    $selectlog->from(array('a'=>'ruas'),array('a.j14_codigo'), 'cadastro')
                                 ->where($where);
                    $resultlog = $this->db_ecidade->fetchAll($selectlog);
                    if(count($resultlog) == 0){
                        $ruas = array(
                             'j14_codigo'=>$dados[2],
                             'j14_nome'=>Zend_Filter::filterStatic(utf8_decode($dados[3]),'FullStringToUpper'),
                             'j14_tipo'=>$dados[0],
                             'j14_rural'=>$dados[4]
                         );
                        $ruascep = array();
                        if($dados[6] != ''){
                            $ruascep = array(
                                'j29_codigo' => $dados[2],
                                'j29_cep' => $dados[8]
                            );
                        }
                        $ruasbairro = array(
                            'j16_codigo' => $dados[2],
                            'j16_lograd' => $dados[2],
                            'j16_bairro' => $dados[5]
                        );


                         try {
                            $rua_id = $this->db_ecidade->insert('cadastro.ruas', $ruas);
                            $this->db_ecidade->insert('cadastro.ruasbairro', $ruasbairro);
                            if(count($ruascep) != 0){
                                $this->db_ecidade->insert('cadastro.ruascep', $ruascep);
                            }
                            $this->showMessage('Rua adicionada. - ' .$dados[3]);

                        } catch (Zend_Db_Exception $e){
                                $this->showMessage($e->getMessage(),2); 
                                exit;
                        }
                    } 
                
            }
        }
       
        fclose($fp);
          
    }  
  
}
