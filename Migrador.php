<?php 
class Migrador 
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
       //$this->createOrgao();
       //$this->createUnidade();
       //$this->createDepartamentos();
       $this->createEscolas();
       
    }
    public function setDb()
    {
        
        $this->db_ecidade = Zend_Db::factory($this->config->ecidade->db);
        $this->db_ieducar = Zend_Db::factory($this->config->ieducar->db);
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
    
    public function createDepartamentos()
    {  
         //Cada escola é um departamento no e-cidade
         //Colunas da tabela db_depart
         $departamento = array(
             'coddepto' =>'', 
             'descrdepto' =>'', 
             'instit' =>'', 
         );
         //Colunas da tabela db_departorg - Departamento - Orgão
         $departamento_orgao = array (
             'db01_coddepto' => '',
             'db01_anousu' => $this->config->orgao->exercicio,
             'db01_orgao' =>  $this->config->orgao->codigo,
             'db01_unidade' => $this->config->unidade->codigo,

         );
         
         //Select das escolas do i-Educar
         $select = new Zend_Db_Select($this->db_ieducar);
         $select->from(array('a'=>'escola'), array('a.cod_escola', 'a.ref_cod_escola_rede_ensino', 'a.ref_cod_escola_localizacao', 'a.sigla'), 'pmieducar')
                 ->join(array('b'=>'escola_complemento'), 'a.cod_escola = b.ref_cod_escola',
                         array('b.cep', 'b.numero','b.complemento','b.email','b.nm_escola','b.municipio', 'b.bairro','b.logradouro','b.telefone'), 'pmieducar')
                 ->order('a.cod_escola');
         $result = $this->db_ieducar->fetchAll($select);
        
         foreach ($result  as $r){
             
             $cod_depart = $r['cod_escola'] + (int)$this->config->departamento->codigo_variacao;
             //Cada escola é um departamento no e-cidade
             //Colunas da tabela db_depart
             $departamento = array(
                 'coddepto' =>  $cod_depart, 
                 'descrdepto' =>$r['sigla'], 
                 'instit' => $this->config->instituicao->codigo
             );
             
            $departamento_orgao = array (
                 'db01_coddepto' =>  $cod_depart,
                 'db01_anousu' => $this->config->orgao->exercicio,
                 'db01_orgao' =>  $this->config->orgao->codigo,
                 'db01_unidade' => $this->config->unidade->codigo

             );
           try {
               $resultado = $this->db_ecidade->insert('configuracoes.db_depart', $departamento);
               $resultado = $this->db_ecidade->insert('configuracoes.db_departorg',  $departamento_orgao );
               $this->showMessage('Departamento '. $r['sigla'].'-'.$cod_depart. ' criado.',1);
           } catch (Zend_Db_Exception $e){
               $this->showMessage($e->getMessage(),2);
               exit;
           }
         }
    }
    public function createOrgao()
    {
        //Colunas da tabela orcorgao - Orgão
        $orgao = array(
            'o40_anousu' => $this->config->orgao->exercicio,
            'o40_orgao' => $this->config->orgao->codigo,
            'o40_instit' => $this->config->instituicao->codigo,
            'o40_codtri' => $this->config->orgao->tribunal,
            'o40_descr' => Zend_Filter::filterStatic($this->config->orgao->descricao,'StringToUpper'),

        );
        
       try {
           $resultado = $this->db_ecidade->insert('orcamento.orcorgao', $orgao);
           $this->showMessage('Orgao criado.',1);
       } catch (Zend_Db_Exception $e){
           $this->showMessage($e->getMessage(),2);
           exit;
       }
       
       
    }
    
    public function createUnidade()
    {
        //Colunas da tabela orgunidade - Unidade
        $orgao = array(
            'o41_anousu' => $this->config->orgao->exercicio,
            'o41_orgao' => $this->config->orgao->codigo,
            'o41_unidade' => $this->config->unidade->codigo,
            'o41_codtri' => $this->config->orgao->tribunal,
            'o41_descr' => Zend_Filter::filterStatic($this->config->orgao->descricao,'StringToUpper'),
            'o41_instit' => $this->config->instituicao->codigo,
            'o41_ident' => $this->config->orgao->tribunal

        );        
      
       try {
           $resultado = $this->db_ecidade->insert('orcamento.orcunidade', $orgao);
           $this->showMessage('Unidade criada.');
       } catch (Zend_Db_Exception $e){
           $this->showMessage($e->getMessage(),2);
           exit;
       }
       
       
    }
    public function showMessage($message, $type = 1)
    {
        if ($type == 1){
             echo "\033[0;32m " .$message. " \033[0m".PHP_EOL;
        } elseif($type == 2) {
             echo "\033[0;31m " .$message. " \033[0m".PHP_EOL;
        }
    }
    public function createEscolas(){
        
         $escola = array(
             'ed18_i_codigo' =>'', 
             'ed18_i_rua' =>'', 
             'ed18_i_numero' =>'', 
             'ed18_c_compl' =>'', 
             'ed18_i_bairro' =>'', 
             'ed18_c_nome' =>'', 
             'ed18_c_abrev' =>'', 
             'ed18_c_mantenedora' =>'', 
             'ed18_i_anoinicio' =>'', 
             'ed18_c_email' =>'', 
             'ed18_c_tipo' =>'', 
             'ed18_c_codigoinep' =>'', 
             'ed18_c_local' =>'', 
             'ed18_c_cep' =>'', 
             'ed18_i_cnpj' =>'', 
             'ed18_i_locdiferenciada' =>'', 
             'ed18_i_credenciamento' =>'', 
             'ed18_i_censouf' =>'', 
             'ed18_i_censomunic' =>'', 
             'ed18_i_censodistrito' =>'', 
             'ed18_i_conveniada' =>'', 
             'ed18_c_mantprivada' =>''
         );
         $select = new Zend_Db_Select($this->db_ieducar);
         $select->from(array('a'=>'escola'), array('a.cod_escola', 'a.ref_cod_escola_rede_ensino', 'a.ref_cod_escola_localizacao', 'a.sigla'), 'pmieducar')
                 ->joinLeft(array('b'=>'escola_complemento'), 'a.cod_escola = b.ref_cod_escola',
                         array('b.cep', 'b.numero','b.complemento','b.email','b.nm_escola','b.municipio', 'b.bairro','b.logradouro','b.telefone'), 'pmieducar')
                  ->joinLeft(array('c'=>'educacenso_mapper_escola'), 'a.cod_escola = c.cod_escola',array('c.cod_escola_inep'), 'modules')
                  ->joinLeft(array('d'=>'educacenso_lay_escola'), 'd.cod_escola_inep = c.cod_escola_inep',array('cep_'=>'d.cep','endereco_'=>'d.endereco','numero_'=>'d.numero','bairro_'=>'d.bairro','uf_'=>'d.uf','municipio_'=>'d.municipio','distrito_'=>'d.distrito','ddd_'=>'d.ddd','telefone_'=>'d.telefone','telefone_publico_'=>'d.telefone_publico_1','email_'=>'d.email','d.cod_orgao_regional_ensino'), 'modules')
                 ->order('a.cod_escola');
         
         $result = $this->db_ieducar->fetchAll($select);
         
         $i=7876999;
         foreach ($result  as $r){
             //Cadastro de Ruas
              $rural = 0;
             if ($r['ref_cod_escola_localizacao'] == 2 ){
                 $rural = 1;
             }
             
             $ruas = array(
                 'j14_codigo'=>$i,
                 'j14_nome'=>$r['logradouro'],
                 'j14_tipo'=>1,
                 'j14_rural'=>$rural
             );
             
             $bairros = array(
                 'j13_codi'=>$i,
                 'j13_descr'=>$r['bairro'],
                 'j13_rural'=>$rural
             );
             
             // print_r($ruas);
             //Cadastro de Bairros
            try {
                    $rua_id = $this->db_ecidade->insert('cadastro.ruas', $ruas);
                    $this->showMessage('Rua criada.');
                    $bairro_id = $this->db_ecidade->insert('cadastro.bairro', $bairros);
                    $this->showMessage('Bairro criado.');
            } catch (Zend_Db_Exception $e){
                    $this->showMessage($e->getMessage(),2);
                    
                  
                    exit;
            }
             
             $cod_escola = $r['cod_escola'] + (int)$this->config->departamento->codigo_variacao;
             //Cada escola é um departamento no e-cidade
            
              $escola = array(
             'ed18_i_codigo' =>  $cod_escola, 
             'ed18_i_rua' => $i, 
             'ed18_i_numero' =>$r['numero'], 
             'ed18_c_compl' =>$r['complemento'], 
             'ed18_i_bairro' => $i, 
             'ed18_c_nome' =>$r['nm_escola'], 
             'ed18_c_abrev' =>$r['sigla'], 
             'ed18_c_mantenedora' =>3, //Municipal
            
             'ed18_c_email' =>Zend_Filter::filterStatic($r['email'],'StringToLower'),
             'ed18_c_tipo' =>'S', 
             'ed18_c_codigoinep' =>$r['cod_escola_inep'], 
             'ed18_c_local' =>$r['ref_cod_escola_localizacao'], 
             'ed18_c_cep' =>$r['cep_'], 
            
             'ed18_i_locdiferenciada' =>0, 
             'ed18_i_credenciamento' =>0, 
             'ed18_i_censouf' =>$r['uf_'], 
             'ed18_i_censomunic' =>$r['municipio_'], 
             'ed18_i_censodistrito' =>$r['distrito_'], 
             'ed18_i_conveniada' =>0, 
             'ed18_i_educindigena' =>0,
              'ed18_i_censoorgreg' => 193,
              'ed18_i_funcionamento' => 1, //Em Atividade
           

         );
           $i++;
           try {
                    $resultado= $this->db_ecidade->insert('escola.escola', $escola);
                    $this->showMessage('Escola Criada.');
                  
            } catch (Zend_Db_Exception $e){
                    $this->showMessage($e->getMessage(),2);
                    print_r($escola);
                    exit;
            }
         }
        
    }
}