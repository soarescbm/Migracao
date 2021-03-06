<?php 
class Migrador 
{
    /**
     * Conexa��o do banco de dados do iecidade
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db_ecidade;
    
     /**
     * Conexa��o do banco de dados do ieducar
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db_ieducar;
    
    /**
     * Configura��es dos da aplica��o
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
       //$this->addOrgao();
       //$this->addUnidade();
       //$this->addDepartamentos();
       //$this->addEscolas();
       //$this->addDiasLetivos();
       //$this->addCursos();
       //$this->addEtapas();
       //$this->addCursoEscola();
       //$this->addAlunos();
       //$this->addDisciplinas();
       //$this->addCalendarioLetivo();
       //$this->addCalendarioLetivo2012();
      
       //$this->addSSdervidor();
       
    }
    /*
     * Setter as conex�es com os bancos de dados
     */
    public function setDb()
    {
        $this->db_ecidade = Zend_Db::factory($this->config->ecidade->db);
        $this->db_ieducar = Zend_Db::factory($this->config->ieducar->db);
    }
    /**
     * Testa as conex�es com os bancos de dados
     */
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
    /**
     * Inicia a fun��o de banco do banco de dados do e-cidade fc_startsession()
     */
    public function startSessionDb()
    {
        $this->db_ecidade->query('select fc_startsession();');
    }
    /*
     * Imprime o cabe�alho do scritp de migra��o
     */
    public function info()
    {   
        echo "\033[0;32m".PHP_EOL;
        echo "# Script de Migracao dos Dados do i-Educar para o Modulo Educacao do e-Cidade".PHP_EOL;
        echo "# Autor: Paulo Soares da Silva <pss18@educacao.arapiraca.al.gov.br".PHP_EOL;
        echo "# Versao: 1.0.0".PHP_EOL;
        echo "-----------------------------------------------------------------------------". PHP_EOL . PHP_EOL;
        echo "\033[0m";
    }
    /**
     * A
     */
    public function addDepartamentos()
    {  
        
         //Select das escolas do i-Educar
         $select = new Zend_Db_Select($this->db_ieducar);
         $select->from(array('a'=>'escola'), array('a.cod_escola', 'a.ref_cod_escola_rede_ensino', 'a.ref_cod_escola_localizacao', 'a.sigla'), 'pmieducar')
                 ->join(array('b'=>'escola_complemento'), 'a.cod_escola = b.ref_cod_escola',
                         array('b.cep', 'b.numero','b.complemento','b.email','b.nm_escola','b.municipio', 'b.bairro','b.logradouro','b.telefone'), 'pmieducar')
                 ->order('a.cod_escola');
         $result = $this->db_ieducar->fetchAll($select);
        
         //Intera��o
         foreach ($result  as $r){
             $r['nm_escola'] = Zend_Filter::filterStatic($r['nm_escola'] ,'FullStringToUpper');
             if(substr($r['sigla'], 0, 1) == 'C'){
                 $descricao = $r['nm_escola'];
             }else {
                 $descricao = $r['nm_escola'];
             }
            
             $cod_depart = $r['cod_escola'] + (int)$this->config->departamento->codigo_variacao;
             //Cada escola � um departamento no e-cidade
             //Colunas da tabela db_depart
             $departamento = array(
                 'coddepto' =>  $cod_depart, 
                 'descrdepto' =>$descricao, 
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
               $this->showMessage('Departamento - '. $descricao.'-'.$cod_depart. ' adicionado.',1);
           } catch (Zend_Db_Exception $e){
               $this->showMessage($e->getMessage(),2);
               exit;
           }
         }
    }
    public function addOrgao()
    {
        //Colunas da tabela orcorgao - Org�o
        $orgao = array(
            'o40_anousu' => $this->config->orgao->exercicio,
            'o40_orgao' => $this->config->orgao->codigo,
            'o40_instit' => $this->config->instituicao->codigo,
            'o40_codtri' => $this->config->orgao->tribunal,
            'o40_descr' => Zend_Filter::filterStatic($this->config->orgao->descricao,'FullStringToUpper'),

        );
        
       try {
           $resultado = $this->db_ecidade->insert('orcamento.orcorgao', $orgao);
           $this->showMessage('Orgao adicionado - '.Zend_Filter::filterStatic($this->config->orgao->descricao,'FullStringToUpper'),1);
       } catch (Zend_Db_Exception $e){
           $this->showMessage($e->getMessage(),2);
           exit;
       }
       
       
    }
    
    public function addUnidade()
    {
        //Colunas da tabela orgunidade - Unidade
        $orgao = array(
            'o41_anousu' => $this->config->orgao->exercicio,
            'o41_orgao' => $this->config->orgao->codigo,
            'o41_unidade' => $this->config->unidade->codigo,
            'o41_codtri' => $this->config->orgao->tribunal,
            'o41_descr' => Zend_Filter::filterStatic($this->config->orgao->descricao,'FullStringToUpper'),
            'o41_instit' => $this->config->instituicao->codigo,
            'o41_ident' => $this->config->orgao->tribunal

        );        
      
       try {
           $resultado = $this->db_ecidade->insert('orcamento.orcunidade', $orgao);
           $this->showMessage('Unidade adicionada - '.Zend_Filter::filterStatic($this->config->orgao->descricao,'FullStringToUpper'));
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
    public function addEscolas(){
        
         
         $select = new Zend_Db_Select($this->db_ieducar);
         $select->from(array('a'=>'escola'), array('a.cod_escola', 'a.ref_cod_escola_rede_ensino', 'a.ref_cod_escola_localizacao', 'a.sigla'), 'pmieducar')
                 ->joinLeft(array('b'=>'escola_complemento'), 'a.cod_escola = b.ref_cod_escola',
                         array('b.cep', 'b.numero','b.complemento','b.email','b.nm_escola','b.municipio', 'b.bairro','b.logradouro','b.telefone'), 'pmieducar')
                  ->joinLeft(array('c'=>'educacenso_mapper_escola'), 'a.cod_escola = c.cod_escola',array('c.cod_escola_inep'), 'modules')
                  ->joinLeft(array('d'=>'educacenso_lay_escola'), 'd.cod_escola_inep = c.cod_escola_inep',array('cep_'=>'d.cep','endereco_'=>'d.endereco','numero_'=>'d.numero','bairro_'=>'d.bairro','uf_'=>'d.uf','municipio_'=>'d.municipio','distrito_'=>'d.distrito','ddd_'=>'d.ddd','telefone_'=>'d.telefone','telefone_publico_'=>'d.telefone_publico_1','email_'=>'d.email','d.cod_orgao_regional_ensino'), 'modules')
                 ->order('a.cod_escola');
         
         $result = $this->db_ieducar->fetchAll($select);
         //N�o gerar inconsistencia em caso de integra��o com os outros m�dulos do e-cidade.
         $i = 300000;
         foreach ($result  as $r){
             //Cadastro de Ruas
              $rural = 0;
             if ($r['ref_cod_escola_localizacao'] == 2 ){
                 $rural = 1;
             }
             
           //Pesquisa a existencia do logradouro no sistema
            $where = "a.j14_nome like '%".Zend_Filter::filterStatic($r['logradouro'],'FullStringToUpper')."%'";
            $selectlog = new Zend_Db_Select($this->db_ecidade);
            $selectlog->from(array('a'=>'ruas'),array('a.j14_codigo'), 'cadastro')
                         ->where($where);
            $resultlog = $this->db_ecidade->fetchAll($selectlog);
            if(count($resultlog) > 0){
                $rua_id = $resultlog[0]['j14_codigo'];
            } else {
                 $ruas = array(
                     'j14_codigo'=>$i,
                     'j14_nome'=>Zend_Filter::filterStatic($r['logradouro'],'FullStringToUpper'),
                     'j14_tipo'=>1,
                     'j14_rural'=>$rural
                 );
                 try {
                    $this->db_ecidade->insert('cadastro.ruas', $ruas);
                    $rua_id = $i;
                    $this->showMessage('Logradouro adicionado - '.Zend_Filter::filterStatic($r['logradouro'],'FullStringToUpper'));
                   
                } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2); 
                        exit;
                }
            }

            //Pesquisa a existencia do bairro no sistema
            $where = "a.j13_descr like '%".Zend_Filter::filterStatic($r['bairro'],'FullStringToUpper')."%'";
            $selectbairro = new Zend_Db_Select($this->db_ecidade);
            $selectbairro->from(array('a'=>'bairro'),array('a.j13_codi'), 'cadastro')
                         ->where($where);
            $resultbairro = $this->db_ecidade->fetchAll($selectbairro);
            if(count($resultbairro) > 0){
                $bairro_id = $resultbairro[0]['j13_codi'];
            } else {
                  $bairros = array(
                     'j13_codi'=>$i,
                     'j13_descr'=>Zend_Filter::filterStatic($r['bairro'],'FullStringToUpper'),
                     'j13_rural'=>$rural
                 );
                 try {
                    $this->db_ecidade->insert('cadastro.bairro', $bairros);
                    $bairro_id = $i;
                    $this->showMessage('Bairro adicionado - '.Zend_Filter::filterStatic($r['bairro'],'FullStringToUpper'));
                   
                } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2); 
                        exit;
                }
            }
         
            
             
           
             //Cada escola � um departamento no e-cidade
            if($r['uf_'] == ''){
                $r['uf_'] =  $this->config->educacenso->uf;
            }
            if($r['municipio_'] == ''){
                $r['municipio_'] = $this->config->educacenso->municipio;
            }
         
            
            $where = $this->db_ecidade->quoteInto('a.ed262_i_censomunic = ?', $r['municipio_']);
            $selectdistrito = new Zend_Db_Select($this->db_ecidade);
            $selectdistrito->from(array('a'=>'censodistrito'),array('a.ed262_i_codigo'), 'escola')
                         ->where($where);
            $resultdistrito= $this->db_ecidade->fetchAll($selectdistrito);
            if (count($resultdistrito)>0){
                $distrito = $resultdistrito[0]['ed262_i_codigo'];
            } else {
                $distrito = $this->config->educacenso->distrito;
            }
             //C�digo da escola - possui o mesmo c�digo do departamento 
             //Varia��o para n�o causar conflito com integra��o com outros departamentos existentes
             $cod_escola = $r['cod_escola'] + (int)$this->config->departamento->codigo_variacao;
             
              $escola = array(
             'ed18_i_codigo' =>  $cod_escola, 
             'ed18_i_rua' => $rua_id, 
             'ed18_i_numero' =>$r['numero'], 
             'ed18_c_compl' =>$r['complemento'], 
             'ed18_i_bairro' => $bairro_id, 
             'ed18_c_nome' =>Zend_Filter::filterStatic($r['nm_escola'],'FullStringToUpper'), 
             'ed18_c_abrev' =>Zend_Filter::filterStatic($r['sigla'],'FullStringToUpper'), 
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
             'ed18_i_censodistrito' =>$distrito, 
             'ed18_i_conveniada' =>0, 
             'ed18_i_educindigena' =>0,
             'ed18_i_censoorgreg' => 193,
             'ed18_i_funcionamento' => 1, //Em Atividade
           

         );
           $i++;
           try {
                    $resultado= $this->db_ecidade->insert('escola.escola', $escola);
                    $this->showMessage('Escola adicionada - '.Zend_Filter::filterStatic($r['nm_escola'],'FullStringToUpper'));
                  
            } catch (Zend_Db_Exception $e){
                    $this->showMessage($e->getMessage(),2);
                    print_r($escola);
                    exit;
            }
         }
        
    }
    public function addDiasLetivos()
    {
         $selectEscolas = new Zend_Db_Select($this->db_ecidade);
         $selectEscolas->from(array('a'=>'escola'),array('ed18_i_codigo','ed18_c_nome'), 'escola');
         $result= $this->db_ecidade->fetchAll($selectEscolas);
         
         //Codigos dos dias semana letivos 
         $dias_semana = array('1','2','3','4','5','6','7');
         foreach ($result as $r){
             
             foreach ($dias_semana as $d){
                    
                    
                    $next_codigo = $this->db_ecidade->nextSequenceId('escola.dialetivo_ed04_i_codigo_seq');
                    if ($d == 1) {
                        $letivo = 'N';
                    } else {
                        $letivo = 'S';
                    }
                     // dialetivo - Dias da Semana Letivos
                    $dialetivo = array(
                    'ed04_i_codigo' => $next_codigo,  // C�digo - tipo: int8                                    
                    'ed04_i_escola' => $r['ed18_i_codigo'],  // Escola - tipo: int8                                    
                    'ed04_i_diasemana' => $d,  // Dia da Semana - tipo: int8                                    
                    'ed04_c_letivo' => $letivo,  // Dia Letivo - tipo: char(1)                                 
                    );
                    
                    try {
                        $resultado= $this->db_ecidade->insert('escola.dialetivo', $dialetivo);
                        $this->showMessage('Dia Letivo Adicionado - '.$r['ed18_c_nome']);

                    } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2);
                       
                    }
             }
             
             
         }
    }
    
    // Adicionando S�ries
    public function addEtapas()
    {
         //Lista s�ries do ieducar
         $selectSerie = new Zend_Db_Select($this->db_ieducar);
         $selectSerie->from(array('a'=>'serie'),array('a.cod_serie', 'a.ref_cod_curso', 'a.nm_serie', 'a.etapa_curso'), 'pmieducar')
                     ->joinLeft(array('b' => 'educacenso_tax_etapa_ensino'), 'a.cod_serie = b.cod_serie' ,array('b.cod_etapa_ensino_inep'), 'modules');
         $result= $this->db_ieducar->fetchAll($selectSerie);
         
        
         foreach ($result as $r){
             
            //Nivel do curso no e-cidade conforme c�digo do curso
             $selecNivelEnsino = new Zend_Db_Select($this->db_ecidade);
             $selecNivelEnsino->from(array('a'=>'cursoedu'), array('a.ed29_i_codigo','a.ed29_i_ensino'), 'escola')
                              ->where('a.ed29_i_codigo = ?', $r['ref_cod_curso']);
             $resultNivelEnsino= $this->db_ecidade->fetchAll($selecNivelEnsino);
             
             if (count($resultNivelEnsino) > 0){
                 
                 $nivelEnsino = $resultNivelEnsino[0]['ed29_i_ensino'];
                 
                 if($r['cod_etapa_ensino_inep'] == ''){
                     $censo_cod = 0;
                 } else {
                     $censo_cod = $r['cod_etapa_ensino_inep'];
                 }
                    // serie - Cadastro de S�ries
                    $serie = array(
                    'ed11_i_codigo' => $r['cod_serie'],  // C�digo - tipo: int8                                    
                    'ed11_i_ensino' => $nivelEnsino,  // N�vel de Ensino - tipo: int8                                    
                    'ed11_c_descr' => Zend_Filter::filterStatic($r['nm_serie'], 'FullStringToUpper'),  // Nome da Etapa - tipo: char(20)                                
                    'ed11_c_abrev' => Zend_Filter::filterStatic($r['nm_serie'], 'FullStringToUpper'),  // Abreviatura - tipo: char(10)                                
                    'ed11_i_sequencia' => $r['etapa_curso'],  // Ordena��o - tipo: int4                                    
                    'ed11_i_codcenso' => $censo_cod,  // C�digo Censo - tipo: int4  
                    );
                    
                    // serieregimemat - Regime de Matr�cula das S�ries
                    $serieregimemat = array(
                    'ed223_i_codigo' => $r['cod_serie'],  // C�digo - tipo: int8                                    
                    'ed223_i_serie' => $r['cod_serie'],  // Etapa - tipo: int8                                    
                    'ed223_i_regimemat' => 1,  // Regime de Matr�cula - tipo: int8                                    
                    //'ed223_i_regimematdiv' => '',  // Divis�o do Regime de Matr�cula - tipo: int8                                    
                    'ed223_i_ordenacao' => $r['etapa_curso'],  // Ordena��o - tipo: int8                                    
                    );
                    
                    try {
                        $this->db_ecidade->insert('escola.serie', $serie);
                        $this->db_ecidade->insert('escola.serieregimemat', $serieregimemat);                        
                        $this->showMessage('S�rie Adicionada - '.Zend_Filter::filterStatic($r['nm_serie'], 'FullStringToUpper'));

                    } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2);
                       
                    }
             }
             
                      
             
         }
    }
    
    public function addAlunos(){
       
        
         $select = new Zend_Db_Select($this->db_ieducar);
         $select->from(array('a'=>'aluno'),array('a.cod_aluno', 'a.ref_cod_religiao', 'a.ref_usuario_exc', 'a.ref_idpes', 'a.data_cadastro','a.ativo', 'a.analfabeto', 'a.nm_pai', 'a.nm_mae', 'a.tipo_responsavel'), 'pmieducar')
                ->joinLeft(array('b'=>'fisica'), 'a.ref_idpes = b.idpes',array( 'b.data_nasc', 'b.sexo', 'b.cpf','b.ideciv','b.nacionalidade', 'b.idpais_estrangeiro', 'idmun_nascimento'), 'cadastro')
                ->joinLeft(array('c'=>'pessoa'), 'a.ref_idpes = c.idpes',array('c.nome', 'c.email'), 'cadastro')
                ->joinLeft(array('e'=>'educacenso_cod_aluno'), 'a.cod_aluno = e.cod_aluno',array('e.cod_aluno_inep'), 'modules')
                ->joinLeft(array('d'=>'endereco_externo'), 'a.ref_idpes = d.idpes',array('idpes', 'tipo', 'idtlog', 'logradouro', 'numero', 'letra', 'complemento', 'bairro', 'cep', 'cidade', 'sigla_uf', 'bloco', 'andar', 'apartamento', 'zona_localizacao'), 'cadastro')
                ->joinLeft(array('f'=>'documento'), 'a.ref_idpes = f.idpes',array('rg','idorg_exp_rg', 'data_exp_rg', 'sigla_uf_exp_rg', 'tipo_cert_civil', 'num_termo', 'num_livro', 'num_folha', 'data_emissao_cert_civil', 'sigla_uf_cert_civil', 'cartorio_cert_civil', 'num_cart_trabalho', 'serie_cart_trabalho', 'data_emissao_cart_trabalho', 'sigla_uf_cart_trabalho', 'num_tit_eleitor', 'zona_tit_eleitor', 'secao_tit_eleitor', 'idorg_exp_rg'),'cadastro')
                ->joinLeft(array('g'=>'fisica_raca'), 'a.ref_idpes = g.ref_idpes',array('ref_cod_raca'),'cadastro')
                ->joinLeft(array('h'=>'fisica_deficiencia'), 'a.ref_idpes = h.ref_idpes',array('ref_cod_deficiencia'),'cadastro')
                ->joinLeft(array('i'=>'fone_pessoa'), 'a.ref_idpes = i.idpes',array('tipo', 'ddd', 'fone'),'cadastro')
                ->joinLeft(array('j'=>'raca'), 'g.ref_cod_raca = j.cod_raca',array('nm_raca'),'cadastro')
                ->joinLeft(array('k'=>'orgao_emissor_rg'), 'f.idorg_exp_rg = k.idorg_rg',array('k.descricao'),'cadastro')
                ->order('a.cod_aluno')
                ->where('a.cod_aluno > 28333');
              
         

        $result = $this->db_ieducar->fetchAll($select);
        $i = 0;
        $date = new Zend_Date();
        $idlast = 0;
        
        foreach ($result as $r) {
        
        //Estado Civil
        switch ($r['ideciv']) {
            case 5 :
                $r['ideciv']  = 3;
                break;
            case 3 :
                $r['ideciv']  = 4;
                break;
            case 2 :
                $r['ideciv']  = 2;
                break;
            default:
                $r['ideciv'] = 1;
                break;
        }
        //Tipo de certid�o
        switch ($r['tipo_cert_civil']) {
            case 91 :
                $r['tipo_cert_civil']  = 'N';
                break;         
            case 92:
                $r['tipo_cert_civil']  = 'C';
                break;      
            default:
                $r['tipo_cert_civil'] = '';
        break;
        }
        //C�digo da Cidade de Nascimento conforme Educacenso
        if($r['idmun_nascimento'] == '') { $r['idmun_nascimento'] = 0;}
        $where = $this->db_ieducar->quoteInto('a.idmun = ?',$r['idmun_nascimento']);
        $selectMunic = new Zend_Db_Select($this->db_ieducar);
        $selectMunic->from(array('a'=>'municipio'),array('a.idmun','a.nome', 'a.sigla_uf'), 'public')
                     ->where($where);
        $resultMunic = $this->db_ieducar->fetchAll($selectMunic);
        if (count($resultMunic) > 0) {
            $where = $this->db_ecidade->quoteInto('a.ed261_c_nome = ?',Zend_Filter::filterStatic($resultMunic[0]['nome'], 'FullStringToUpper'));
            $selectMunic = new Zend_Db_Select($this->db_ecidade);
            $selectMunic->from(array('a'=>'censomunic'),array('a.ed261_i_codigo', 'a.ed261_i_censouf', 'a.ed261_c_nome'), 'escola')
                 ->where($where);
            $resultMunic = $this->db_ecidade->fetchAll($selectMunic);
            
            if(count($resultMunic) > 0){
                $cidadeNasc = $resultMunic[0]['ed261_i_codigo'];
                $ufNasc = $resultMunic[0]['ed261_i_censouf'];
            } else {
                $cidadeNasc = 0;
                $ufNasc = 0;
            }
            
        } else {
            $cidadeNasc = 0;
            $ufNasc = 0;
        }
        
        
           
        //C�digos da Cidade e Uf
        $where = $this->db_ecidade->quoteInto('a.ed261_c_nome = ?',Zend_Filter::filterStatic($r['cidade'],'FullStringToUpper'));
        $selectMunic = new Zend_Db_Select($this->db_ecidade);
        $selectMunic->from(array('a'=>'censomunic'),array('a.ed261_i_codigo', 'a.ed261_i_censouf', 'a.ed261_c_nome'), 'escola')
                     ->where($where);
        $resultMunic = $this->db_ecidade->fetchAll($selectMunic);
        if(count($resultMunic) > 0){
            $cidade = $resultMunic[0]['ed261_i_codigo'];
            $uf = $resultMunic[0]['ed261_i_censouf'];
        } else {
            $cidade = 0;
            $uf = 0;
        }
        
        //C�digo Uf Certid�o
        $where = $this->db_ieducar->quoteInto('a.ed260_c_sigla = ?',Zend_Filter::filterStatic($r['sigla_uf_cert_civil'],'FullStringToUpper'));
        $selectUf = new Zend_Db_Select($this->db_ecidade);
        $selectUf->from(array('a'=>'censouf'),array('a.ed260_i_codigo', 'a.ed260_c_sigla', 'a.ed260_c_nome'), 'escola')
                     ->where($where);
        $resultUf = $this->db_ecidade->fetchAll($selectUf);
        if(count($resultUf) > 0){            
            $ufCert = $resultUf[0]['ed260_i_codigo'];
        } else {
           
            $ufCert = 0;
        }
        
        //C�digo Uf RG
        $where = $this->db_ieducar->quoteInto('a.ed260_c_sigla = ?',Zend_Filter::filterStatic($r['sigla_uf_exp_rg'],'FullStringToUpper'));
        $selectUf = new Zend_Db_Select($this->db_ecidade);
        $selectUf->from(array('a'=>'censouf'),array('a.ed260_i_codigo', 'a.ed260_c_sigla', 'a.ed260_c_nome'), 'escola')
                     ->where($where);
        $resultUf = $this->db_ecidade->fetchAll($selectUf);
        if(count($resultUf) > 0){            
            $ufIdent = $resultUf[0]['ed260_i_codigo'];
        } else {
           
            $ufIdent = 0;
        }
        
        
        //C�digo �rg�o RG Emissor
      
        $where = $this->db_ieducar->quoteInto('a.ed132_c_descr = ?',Zend_Filter::filterStatic($r['descricao'],'FullStringToUpper'));
        $selectOrgaoRG = new Zend_Db_Select($this->db_ecidade);
        $selectOrgaoRG->from(array('a'=>'censoorgemissrg'),array('a.ed132_i_codigo', 'a.ed132_c_descr'), 'escola')
                     ->where($where);
        $resultOrgaoRG = $this->db_ecidade->fetchAll($selectOrgaoRG);
        if(count($resultOrgaoRG) > 0){            
            $orgaoEmissor = $resultOrgaoRG[0]['ed132_i_codigo'];
        } else {
           
            $orgaoEmissor = 10;
        }
        //Zona    
        $zona = ($r['zona_localizacao'] == 2) ? 'RURAL' : 'URBANO';
        //Respons�vel Legal
        $respon = ($r['tipo_responsavel'] == 'm') ? $r['nm_mae'] : $r['nm_pai'];
         
        //Datas
        $data_cadastro = $date->toString('YYYY-MM-dd');
        if (!$r['data_cadastro'] == '') {
            $date->set($r['data_cadastro'],'YYYY-MM-dd');
            $data_cadastro = $date->toString('YYYY-MM-dd');
        }
        
        //Celular
        $fone = '';
        $celular = '';
        if($r['tipo'] == 1) {
            $fone = $r['fone'];
        } else {
            $celular = $r['fone'];
        }
          // aluno - Cadastro de Alunos
        $aluno =  array(
            'ed47_i_codigo' => $r['cod_aluno'],  // C�digo - tipo: int8                                    
            'ed47_v_nome' => Zend_Filter::filterStatic($r['nome'],'FullStringToUpper'),  // Nome - tipo: char(70)                                
            'ed47_v_ender' => $r['idtlog'].' '.Zend_Filter::filterStatic($r['logradouro'],'FullStringToUpper'),  // Endere�o - tipo: varchar(100)                            
            'ed47_c_numero' => $r['numero'],  // N�mero - tipo: char(10)                                
            'ed47_v_compl' => $r['complemento'],  // Complemento - tipo: varchar(20)                             
            'ed47_v_bairro' => Zend_Filter::filterStatic($r['bairro'],'FullStringToUpper'),  // Bairro - tipo: varchar(40)                             
            'ed47_v_cep' => $r['cep'],  // CEP - tipo: varchar(8)                              
            'ed47_c_raca' =>  Zend_Filter::filterStatic($r['nm_raca'],'FullStringToUpper'),  // Ra�a - tipo: char(20)                                
            'ed47_v_cxpostal' => '',  // Caixa Postal - tipo: varchar(20)                             
            'ed47_v_telef' => $fone,  // Telefone - tipo: varchar(12)                             
            'ed47_d_cadast' => $data_cadastro,  // Data do Cadastramento - tipo: date                                    
            'ed47_v_ident' => $r['rg'],  // N� Identidade - tipo: varchar(20)                             
            'ed47_i_login' => 0,  // Login - tipo: int4                                    
            'ed47_c_nomeresp' => Zend_Filter::filterStatic($respon,'FullStringToUpper'),  // Respons�vel Legal - tipo: char(70)                                
            'ed47_c_emailresp' => $r['email'],  // Email do Respons�vel - tipo: char(50)                                
            'ed47_c_atenddifer' => '',  // Recebe Escolariza��o em Outro Espa�o - tipo: char(30)                                
            'ed47_t_obs' => '',  // Observa��es - tipo: text                                    
            'ed47_c_transporte' => '',  // Poder P�blico Respons�vel - tipo: char(20)                                
            'ed47_c_zona' => $zona,  // Zona - tipo: char(20)                                
            'ed47_c_certidaotipo' => $r['tipo_cert_civil'],  // Tipo de Certid�o - tipo: char(1)                                 
            'ed47_c_certidaonum' => $r['num_termo'],  // N�mero do Termo - tipo: char(8)                                 
            'ed47_c_certidaolivro' => $r['num_livro'],  // Livro - tipo: char(8)                                 
            'ed47_c_certidaofolha' => $r['num_folha'],  // Folha - tipo: char(4)                                 
            'ed47_c_certidaocart' =>Zend_Filter::filterStatic( $r['cartorio_cert_civil'],'FullStringToUpper'),  // Cart�rio - tipo: char(150)                               
            'ed47_c_certidaodata' => $r['data_emissao_cert_civil'],  // Data de Emiss�o - tipo: date                                    
            'ed47_c_nis' => '',  // N� NIS - tipo: char(11)                                
            'ed47_c_bolsafamilia' => '',  // Bolsa Fam�lia - tipo: char(1)                                 
            'ed47_c_passivo' => '',  // Passivo - tipo: char(1)                                 
            //'ed47_d_dtemissao' =>'',  // Emiss�o CNH - tipo: date                                    
            //'ed47_d_dthabilitacao' => '',  // 1� CNH - tipo: date                                    
            //'ed47_d_dtvencimento' => '',  // Vencimento CNH - tipo: date                                    
            'ed47_d_nasc' => $r['data_nasc'],  // Nascimento - tipo: date                                    
            'ed47_d_ultalt' => $data_cadastro,  // �ltima Altera��o - tipo: date                                    
            'ed47_i_estciv' =>  $r['ideciv'],  // Estado Civil - tipo: int4                                    
            'ed47_i_nacion' => 1, // Nacionalidade - tipo: int4                                    
            'ed47_v_categoria' => '',  // Categoria CNH - tipo: varchar(2)                              
            'ed47_v_cnh' => '',  // N� CNH - tipo: varchar(20)                             
            'ed47_v_contato' => '',  // Contato - tipo: text                                    
            'ed47_v_cpf' => $r['cpf'],  // CPF - tipo: varchar(11)                             
            'ed47_v_email' => $r['email'],  // Email - tipo: varchar(100)                            
            'ed47_v_fax' => '',  // Fax - tipo: varchar(12)                             
            //'ed47_v_hora' => '',  // Hora do Cadastramento - tipo: varchar(5)                              
            'ed47_v_mae' => Zend_Filter::filterStatic($r['nm_mae'],'FullStringToUpper'),  // M�e - tipo: char(70)                                
            'ed47_v_pai' => Zend_Filter::filterStatic($r['nm_pai'],'FullStringToUpper'),  // Pai - tipo: char(70)                                
            'ed47_v_profis' => '',  // Profiss�o - tipo: varchar(40)                             
            'ed47_v_sexo' => Zend_Filter::filterStatic($r['sexo'],'FullStringToUpper'),  // Sexo - tipo: varchar(1)                              
            'ed47_v_telcel' => '',  // Telefone Celular - tipo: varchar(12)                             
            'ed47_c_foto' => '',  // Foto - tipo: char(100)                               
            //'ed47_o_oid' => '',  // Imagem - tipo: oid                                     
            'ed47_c_codigoinep' => $r['cod_aluno_inep'],  // C�digo INEP - tipo: char(12)                                
            'ed47_i_pais' => 10,  // Pa�s - tipo: int8                                    
            'ed47_d_identdtexp' => $r['data_exp_rg'],  // Data Expedi��o Identidade - tipo: date                                    
            'ed47_v_identcompl' => '',  // Complemento - tipo: char(4)                                 
            'ed47_c_passaporte' => '',  // N� Passaporte - tipo: char(20)                                
            'ed47_i_transpublico' =>0,  // Transporte Escolar P�blico - tipo: int4                                    
            'ed47_i_filiacao' => 1,  // Filia��o - tipo: int4                                    
            'ed47_i_censoufend' => $uf,  // UF - tipo: int4                                    
            'ed47_i_censomunicend' => $cidade,  // Munic�pio - tipo: int4                                    
            'ed47_i_censoorgemissrg' => $orgaoEmissor,  // �rg�o Emissor - tipo: int4                                    
            'ed47_i_censoufident' => $ufIdent,  // UF Identidade - tipo: int4                                    
            'ed47_i_censoufcert' => $ufCert,  // UF Cart�rio - tipo: int4                                    
            'ed47_i_censomuniccert' => 0,  // Munic�pio - tipo: int4                                    
            'ed47_i_censoufnat' => $ufNasc,  // UF de Nascimento - tipo: int4                                    
            'ed47_i_censomunicnat' => $cidadeNasc,  // Naturalidade - tipo: int4                                    
            'ed47_i_atendespec' => 0,  // Atend. Especializado - tipo: int4                                    
        );
        
        //Update Celular
         $alunoUpdate = array(
              'ed47_v_telcel' => $celular
         );
       
        
        try {
                if($idlast == $r['cod_aluno']){
                    
                     $resultado= $this->db_ecidade->update('escola.aluno', $alunoUpdate,'ed47_i_codigo ='.$r['cod_aluno']);
                     $this->showMessage('Aluno atualizado - '.$r['cod_aluno'].' - '.Zend_Filter::filterStatic($r['nome'],'FullStringToUpper'));
                } else {
                     
                     $resultado= $this->db_ecidade->insert('escola.aluno', $aluno);
                     $this->showMessage('Aluno adicionadio - '.$r['cod_aluno'].' - '.Zend_Filter::filterStatic($r['nome'],'FullStringToUpper'));
                }
                
                $idlast = $r['cod_aluno'];

        } catch (Zend_Db_Exception $e){
                $this->showMessage($e->getMessage(),2);
                print_r($aluno);
                exit;
        }
    }
            
          
          


    }
    
    public function addCursos(){
        
                         
        //Select dos Cursos, N�veis de Educa��o e Tipos de Ensino - i-Educar
        //Mapeamento correspondente entre o i-Educar e M�dulo Educa��o
        //Nivel de Ensino -> Modalidade de Ensino (Ensino Regular, Educa��o Especial...)
        //Tipo de Ensino  -> N�vel de Ensino (Educa��o Infantil, Ensino Fundamental...)
        
        $select = new Zend_Db_Select($this->db_ieducar);
        $select->from(array('a' => 'curso'), array('a.cod_curso', 'a.ref_cod_nivel_ensino', 'a.ref_cod_tipo_ensino', 'a.nm_curso', 'a.qtd_etapas', 'a.carga_horaria', 'a.ato_poder_publico', 'a.objetivo_curso', 'a.publico_alvo', 'a.ativo'), 'pmieducar')
               ->joinLeft(array('b' => 'nivel_ensino'), 'a.ref_cod_nivel_ensino = b.cod_nivel_ensino', array('b.cod_nivel_ensino', 'b.nm_nivel'),'pmieducar')
               ->joinLeft(array('c' => 'tipo_ensino'), 'a.ref_cod_tipo_ensino = c.cod_tipo_ensino', array('c.cod_tipo_ensino', 'c.nm_tipo'),'pmieducar')
               ->order('c.cod_tipo_ensino')
               ->where('a.cod_curso in (1,2,4,21,22,23,24,26)');
        $result = $this->db_ieducar->fetchAll($select);
        
        //Cria��o dos N�veis de Ensino (Modalidade - N�vel de Ensino)
        foreach ($result as $r){
                      
            //Ajustar o nomes dos n�veis de ensino ap�s a migraca��o                      
            $ensino = array(
                'ed10_i_codigo' => $r['cod_curso'],  // C�digo - tipo: int8                                    
                'ed10_i_tipoensino' => $r['cod_nivel_ensino'],  // Modalidade de Ensino - tipo: int8                                    
                //'ed10_i_grauensino' => '',  // Grau de Ensino - tipo: int4                                    
                'ed10_c_descr' => Zend_Filter::filterStatic($r['nm_curso'],'FullStringToUpper'),  // Descri��o - tipo: char(50)                                
                //'ed10_c_abrev' => '',  // Abreviatura - tipo: char(5)                                 
            );
                       
            
            //Adicionando Curso            
            // cursoedu - Cadastro de Cursos
            $cursoedu = array(
            'ed29_i_codigo' => $r['cod_curso'],  // C�digo - tipo: int8                                    
            'ed29_i_ensino' => $r['cod_curso'],  // N�vel de Ensino - tipo: int8                                    
            'ed29_c_descr' => Zend_Filter::filterStatic($r['nm_curso'],'FullStringToUpper'),  // Nome do Curso - tipo: char(40)                                
            'ed29_c_historico' => 'S',  // Incluir no Hist�rico - tipo: char(1)                                 
            );
            
            try {
                    $this->db_ecidade->insert('escola.ensino', $ensino);
                    $this->db_ecidade->insert('escola.cursoedu', $cursoedu);
                    $this->showMessage('Curso Adicionado - '.Zend_Filter::filterStatic($r['nm_curso'],'FullStringToUpper'));

            } catch (Zend_Db_Exception $e){
                    $this->showMessage($e->getMessage(),2);
                    exit;
            }

        }
        
        
    }   
    
    public function addCursoEscola(){
       
        $select = new Zend_Db_Select($this->db_ieducar);
        $select->from(array('a' => 'escola_curso'), array('a.ref_cod_escola', 'a.ref_cod_curso','a.ativo' ),'pmieducar')
                ->where('a.ref_cod_curso in (1,2,4,21,22,23,24,26)');
        $result = $this->db_ieducar->fetchAll($select);
        
        foreach ($result as $r){
            
            if($r['ativo'] == 1){
                $ativo = 'S';
            } else {
                 $ativo = 'N';
            }
            
            //Varia��o para n�o causar conflito com integra��o com outros departamentos existentes
            $cod_escola = $r['ref_cod_escola'] + (int)$this->config->departamento->codigo_variacao;
            
           // cursoescola - Cursos associados a Escola
           $proximo_id = $this->db_ecidade->nextSequenceId('escola.cursoescola_ed71_i_codigo_seq');
           // cursoescola - Cursos associados a Escola
            $cursoescola = array(
                'ed71_i_codigo' => $proximo_id,  // C�digo - tipo: int8                                    
                'ed71_i_escola' => $cod_escola,  // Escola - tipo: int8                                    
                'ed71_i_curso' => $r['ref_cod_curso'],  // Curso - tipo: int8                                    
                'ed71_c_situacao' => $ativo,  // Ativo - tipo: char(1)                                 
                'ed71_c_turmasala' => 'S',  // Permitir mais de uma turma por sala - tipo: char(1)                                 
            );
            
            try {
                    $cod_ensino = $this->db_ecidade->insert('escola.cursoescola', $cursoescola);
                    $this->showMessage('Curso vinculado a escola');

            } catch (Zend_Db_Exception $e){
                    $this->showMessage($e->getMessage(),2);
                    exit;
            }
        }
        
    }
   
    public function addServidor() {
        
       
        
         $select = new Zend_Db_Select($this->db_ieducar);
         $select->from(array('a'=>'servidor'),array('a.cod_servidor', 'a.ref_cod_deficiencia', 'a.ref_idesco', 'a.carga_horaria', 'data_cadastro', 'a.ativo'), 'pmieducar')
                ->joinLeft(array('b'=>'fisica'), 'a.cod_servidor = b.idpes',array( 'b.data_nasc', 'b.sexo', 'b.cpf','b.ideciv','b.nacionalidade', 'b.idpais_estrangeiro', 'idmun_nascimento'), 'cadastro')
                ->joinLeft(array('c'=>'pessoa'), 'a.cod_servidor = c.idpes',array('c.nome', 'c.email'), 'cadastro')
                ->joinLeft(array('e'=>'educacenso_cod_docente'), 'a.cod_servidor = e.cod_servidor',array('e.cod_docente_inep'), 'modules')
                ->joinLeft(array('d'=>'endereco_externo'), 'a.cod_servidor = d.idpes',array('idpes', 'tipo', 'idtlog', 'logradouro', 'numero', 'letra', 'complemento', 'bairro', 'cep', 'cidade', 'sigla_uf', 'bloco', 'andar', 'apartamento', 'zona_localizacao'), 'cadastro')
                ->joinLeft(array('f'=>'documento'), 'a.cod_servidor = f.idpes',array('rg','idorg_exp_rg', 'data_exp_rg', 'sigla_uf_exp_rg', 'tipo_cert_civil', 'num_termo', 'num_livro', 'num_folha', 'data_emissao_cert_civil', 'sigla_uf_cert_civil', 'cartorio_cert_civil', 'num_cart_trabalho', 'serie_cart_trabalho', 'data_emissao_cart_trabalho', 'sigla_uf_cart_trabalho', 'num_tit_eleitor', 'zona_tit_eleitor', 'secao_tit_eleitor', 'idorg_exp_rg'),'cadastro')
                ->joinLeft(array('g'=>'fisica_raca'), 'a.cod_servidor = g.ref_idpes',array('ref_cod_raca'),'cadastro')
                ->joinLeft(array('h'=>'fisica_deficiencia'), 'a.cod_servidor = h.ref_idpes',array('ref_cod_deficiencia'),'cadastro')
                ->joinLeft(array('i'=>'fone_pessoa'), 'a.cod_servidor = i.idpes',array('tipo', 'ddd', 'fone'),'cadastro')
                ->joinLeft(array('j'=>'raca'), 'g.ref_cod_raca = j.cod_raca',array('nm_raca'),'cadastro')
                ->joinLeft(array('k'=>'orgao_emissor_rg'), 'f.idorg_exp_rg = k.idorg_rg',array('k.descricao'),'cadastro')
                ->order('a.cod_servidor');
         
          $result = $this->db_ieducar->fetchAll($select);
         
    }
    
    public function addCalendarioLetivo(){
        
        // Select pmieducar.ano_letivo_modulo
        $select = new Zend_Db_Select($this->db_ieducar);
        $select->from(array('a' => 'ano_letivo_modulo'),  array('ref_ano', 'ref_ref_cod_escola', 'sequencial', 'ref_cod_modulo', 'data_inicio', 'data_fim', ),'pmieducar')
                ->order(array('ref_ano','ref_ref_cod_escola','sequencial'));
        $result = $this->db_ieducar->fetchAll($select);
        
        $calendario = array();
        $periodo = array();
        
        foreach ($result as $r) {            
                     
            if($r['sequencial'] == 1){
                $ano = $r['ref_ano'];
                $escola = $r['ref_ref_cod_escola'];
                $data_inicio = $r['data_inicio'];
                
                $periodo[1]['ed53_i_periodoavaliacao'] = $r['sequencial'];
                $periodo[1]['ed53_d_inicio'] = $r['data_inicio'];
                $periodo[1]['ed53_d_fim'] = $r['data_fim'];
            } 
            if($r['sequencial'] == 2){                
                
                if( $ano == $r['ref_ano'] AND  $escola ==$r['ref_ref_cod_escola']){
                    
                    $periodo[2]['ed53_i_periodoavaliacao'] = $r['sequencial'];
                    $periodo[2]['ed53_d_inicio'] = $r['data_inicio'];
                    $periodo[2]['ed53_d_fim'] = $r['data_fim'];
                }
                
            }
            if($r['sequencial'] == 3){                
                
                if( $ano == $r['ref_ano'] AND  $escola ==$r['ref_ref_cod_escola'])   {
                    
                    $periodo[3]['ed53_i_periodoavaliacao'] = $r['sequencial'];
                    $periodo[3]['ed53_d_inicio'] = $r['data_inicio'];
                    $periodo[3]['ed53_d_fim'] = $r['data_fim'];
                }
                
            }
            
            if($r['sequencial'] == 4){                
                
                if( $ano == $r['ref_ano'] AND  $escola ==$r['ref_ref_cod_escola']){
                    
                    $data_final = $r['data_fim']; 
                    
                    $periodo[4]['ed53_i_periodoavaliacao'] = $r['sequencial'];
                    $periodo[4]['ed53_d_inicio'] = $r['data_inicio'];
                    $periodo[4]['ed53_d_fim'] = $r['data_fim'];
                    
                    // calendario - Cadastro de Calend�rio Escolar 
                    $proximo_codigo_calen = $this->db_ecidade->nextSequenceId('escola.calendario_ed52_i_codigo_seq');
                    
                    $calendario = array(
                        'ed52_i_codigo' => $proximo_codigo_calen,  // C�digo - tipo: int8                                    
                        'ed52_c_descr' => 'CALEND�RIO ' . $ano ,  // Nome do Calend�rio - tipo: char(20)                                
                        'ed52_i_ano' => $ano,  // Ano - tipo: int4                                    
                        'ed52_d_inicio' => $data_inicio,  // Data Inicial - tipo: date                                    
                        'ed52_d_fim' => $data_final,  // Data Final - tipo: date                                    
                        'ed52_d_resultfinal' => $data_final,  // Data Resultado Final - tipo: date                                    
                        'ed52_c_aulasabado' => 'N',  // Aula aos S�bados - tipo: char(1)                                 
                        'ed52_i_diasletivos' => 0,  // Dias Letivos - tipo: int4                                    
                        'ed52_i_semletivas' => 0,  // Semanas Letivas - tipo: int4                                    
                        'ed52_i_calendant' => 0,  // Calend�rio Anterior - tipo: int4                                    
                        'ed52_i_periodo' => 0,  // Per�odo - tipo: int4                                    
                        'ed52_c_passivo' => 'N',  // Passivo - tipo: char(1)                                 
                        'ed52_i_duracaocal' => 1,  // Dura��o - tipo: int8        //Anual                             
                    );
                    
                    //Configurando os per�odos de avalia��o com o calend�rio
                    
                    $periodo[1]['ed53_i_calendario'] = $proximo_codigo_calen;
                    $periodo[2]['ed53_i_calendario'] = $proximo_codigo_calen;
                    $periodo[3]['ed53_i_calendario'] = $proximo_codigo_calen;
                    $periodo[4]['ed53_i_calendario'] = $proximo_codigo_calen;
                   
                    //C�digo calend�rioescola
                    $proximo_codigo = $this->db_ecidade->nextSequenceId('escola.calendarioescola_ed38_i_codigo_seq');
                                        
                    // calendarioescola - Calend�rios ligados a escola
                    $calendarioescola = array(
                        'ed38_i_codigo' => $proximo_codigo,  // C�digo - tipo: int8                                    
                        'ed38_i_escola' => $escola + (int)$this->config->departamento->codigo_variacao,  // Escola - tipo: int8                                    
                        'ed38_i_calendario' => $proximo_codigo_calen,  // Calend�rio - tipo: int8                                    
                    );
                    
                    try {
                        $this->db_ecidade->insert('escola.calendario', $calendario);
                        $this->db_ecidade->insert('escola.calendarioescola', $calendarioescola);
                        
                        $periodo[1]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[1]);
                        
                        $periodo[2]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[2]);
                        
                        $periodo[3]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[3]);
                        
                        $periodo[4]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[4]);
                        $this->showMessage('Calend�rio adicionado!');

                    } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2);
                        exit;
                    }
                    
                }
                
            }
            
        }
       
    }
    public function addCalendarioLetivo2012(){
        
        // Select pmieducar.ano_letivo_modulo das escolas com previs�o para encerrar o ano de 2011!
        $select = new Zend_Db_Select($this->db_ieducar);
        $select->from(array('a' => 'ano_letivo_modulo'),  array('ref_ano', 'ref_ref_cod_escola', 'sequencial', 'ref_cod_modulo', 'data_inicio', 'data_fim', ),'pmieducar')
                ->order(array('ref_ref_cod_escola'))
                ->where("ref_ano = 2011  and sequencial  = 4 and data_fim < '2011-12-31'");
        $result = $this->db_ieducar->fetchAll($select);
        
        //Ano
        $ano = 2012;
        //Valores Definidos        
        $periodo = array(); 
        
        $periodo[1]['ed53_i_periodoavaliacao'] = 1;
        $periodo[1]['ed53_d_inicio'] = '2012-02-09';
        $periodo[1]['ed53_d_fim'] = '2012-04-24';
        
        $periodo[2]['ed53_i_periodoavaliacao'] = 2;
        $periodo[2]['ed53_d_inicio'] = '2012-04-25';
        $periodo[2]['ed53_d_fim'] = '2012-07-06';
        
        $periodo[3]['ed53_i_periodoavaliacao'] = 3;
        $periodo[3]['ed53_d_inicio'] = '2012-07-23';
        $periodo[3]['ed53_d_fim'] = '2012-10-01';
        
        $periodo[4]['ed53_i_periodoavaliacao'] = 4;
        $periodo[4]['ed53_d_inicio'] = '2012-10-02';
        $periodo[4]['ed53_d_fim'] = '2012-12-17';
        
        foreach ($result as $r) {            
                               
                    // calendario - Cadastro de Calend�rio Escolar 
                    $proximo_codigo_calen = $this->db_ecidade->nextSequenceId('escola.calendario_ed52_i_codigo_seq');
                    
                    $calendario = array(
                        'ed52_i_codigo' => $proximo_codigo_calen,  // C�digo - tipo: int8                                    
                        'ed52_c_descr' => 'CALEND�RIO ' . $ano ,  // Nome do Calend�rio - tipo: char(20)                                
                        'ed52_i_ano' => $ano,  // Ano - tipo: int4                                    
                        'ed52_d_inicio' => $periodo[1]['ed53_d_inicio'],  // Data Inicial - tipo: date                                    
                        'ed52_d_fim' => $periodo[4]['ed53_d_fim'],  // Data Final - tipo: date                                    
                        'ed52_d_resultfinal' => $periodo[4]['ed53_d_fim'],  // Data Resultado Final - tipo: date                                    
                        'ed52_c_aulasabado' => 'N',  // Aula aos S�bados - tipo: char(1)                                 
                        'ed52_i_diasletivos' => 0,  // Dias Letivos - tipo: int4                                    
                        'ed52_i_semletivas' => 0,  // Semanas Letivas - tipo: int4                                    
                        'ed52_i_calendant' => 0,  // Calend�rio Anterior - tipo: int4                                    
                        'ed52_i_periodo' => 0,  // Per�odo - tipo: int4                                    
                        'ed52_c_passivo' => 'N',  // Passivo - tipo: char(1)                                 
                        'ed52_i_duracaocal' => 1,  // Dura��o - tipo: int8        //Anual                             
                    );
                    
                    //Configurando os per�odos de avalia��o com o calend�rio
                    
                    $periodo[1]['ed53_i_calendario'] = $proximo_codigo_calen;
                    $periodo[2]['ed53_i_calendario'] = $proximo_codigo_calen;
                    $periodo[3]['ed53_i_calendario'] = $proximo_codigo_calen;
                    $periodo[4]['ed53_i_calendario'] = $proximo_codigo_calen;
                   
                    //C�digo calend�rioescola
                    $proximo_codigo = $this->db_ecidade->nextSequenceId('escola.calendarioescola_ed38_i_codigo_seq');
                                        
                    // calendarioescola - Calend�rios ligados a escola
                    $calendarioescola = array(
                        'ed38_i_codigo' => $proximo_codigo,  // C�digo - tipo: int8                                    
                        'ed38_i_escola' => $r['ref_ref_cod_escola'] + (int)$this->config->departamento->codigo_variacao,  // Escola - tipo: int8                                    
                        'ed38_i_calendario' => $proximo_codigo_calen,  // Calend�rio - tipo: int8                                    
                    );
                    
                    try {
                        $this->db_ecidade->insert('escola.calendario', $calendario);
                        $this->db_ecidade->insert('escola.calendarioescola', $calendarioescola);
                        
                        $periodo[1]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[1]);
                        
                        $periodo[2]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[2]);
                        
                        $periodo[3]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[3]);
                        
                        $periodo[4]['ed53_i_codigo']= $this->db_ecidade->nextSequenceId('escola.periodocalendario_ed53_i_codigo_seq');                        
                        $this->db_ecidade->insert('escola.periodocalendario', $periodo[4]);
                        $this->showMessage('Calend�rio adicionado!');

                    } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2);
                        exit;
                    }
                    
                }
                
            }
  
       
    public function addDisciplinas(){
        
        // modules.componente_curricular
        $select = new Zend_Db_Select($this->db_ieducar);
        $select->from(array('a' => 'componente_curricular'),  array('id', 'instituicao_id', 'area_conhecimento_id', 'nome', 'abreviatura', 'tipo_base'),'modules');
        $result = $this->db_ieducar->fetchAll($select);
      
        foreach ($result as $r){
            
            // caddisciplina - Cadastro de Disciplinas
            $caddisciplina = array(
                'ed232_i_codigo' => $r['id'],  // C�digo - tipo: int8                                    
                'ed232_c_descr' => Zend_Filter::filterStatic($r['nome'], 'FullStringToUpper'),  // Descri��o - tipo: char(30)                                
                'ed232_c_abrev' => Zend_Filter::filterStatic($r['abreviatura'], 'FullStringToUpper'),  // Abreviatura - tipo: char(10)                                
                'ed232_i_codcenso' => 99,  // C�digo Censo - tipo: int4                                    
            );
            
            try {
                                
                $this->db_ecidade->insert('escola.caddisciplina', $caddisciplina);
                $this->showMessage('Disciplina adicionada!');

            } catch (Zend_Db_Exception $e){
                $this->showMessage($e->getMessage(),2);
                exit;
            }
        }
    }
    
    public function addBasesCurrigulares(){
        
        //Curso - Regular Ensino fundamental Anos
        
        $select = new Zend_Db_Select($this->db_ecidade);
        $select->from(array('a' => 'cursoescola '), array('*'),'escola')
                //Esola Pontes de Miranda - Configurada
               ->where('ed71_i_escola <> 2088');
        $result = $this->db_ieducar->fetchAll($select);
        
         $cursoescola = array(
                'ed71_i_codigo' => $proximo_id,  // C�digo - tipo: int8                                    
                'ed71_i_escola' => $cod_escola,  // Escola - tipo: int8                                    
                'ed71_i_curso' => $r['ref_cod_curso'],  // Curso - tipo: int8                                    
                'ed71_c_situacao' => $ativo,  // Ativo - tipo: char(1)                                 
                'ed71_c_turmasala' => 'S',  // Permitir mais de uma turma por sala - tipo: char(1)                                 
            );
        foreach ($result as $r){
            
            switch ($r['ed71_i_curso']){
                //ENSINO REGULAR - EDUCA��O INFANTIL - CRECHE 
                case 1 :
                    break;
                
                //ENSINO REGULAR - EDUCA��O INFANTIL - PR�-ESCOLA
                case 2 :
                    break;
                
                //ENSINO REGULAR - ENSINO FUNDAMENTAL - 9 ANOS / 1� AO 5� ANO
                case 4 :
                    break;
                // base - Cadastro da Base Curricular
                $base_cod = $this->db_ecidade->nextSequenceId('escola.base_ed31_i_codigo_seq'); 
                $base = array(
                    'ed31_i_codigo' => $base_cod,  // C�digo - tipo: int8                                    
                    'ed31_i_curso' => $r['ed71_i_curso'],  // Curso - tipo: int8                                    
                    'ed31_c_descr' => 'ANOS INICIAIS',  // Nome da Base - tipo: char(40)                                
                    'ed31_c_turno' => 'DIURNO',  // Turno - tipo: char(20)                                
                    'ed31_c_medfreq' => 'D',  // Frequ�ncia - tipo: char(1)                                 
                    'ed31_c_contrfreq' => 'I',  // Controle de Frequ�ncia - tipo: char(1)                                 
                    'ed31_t_obs' => '',  // Observa��es - tipo: text                                    
                    'ed31_c_conclusao' => 'N',  // Base conclui curso - tipo: char(1)                                 
                    'ed31_i_regimemat' => '1',  // Regime de Matr�cula - tipo: int8                                    
                    'ed31_c_ativo' => 'S',  // Ativa - tipo: char(1)                                 
                    'ed31_c_matricula' => '',  // Regime de Matr�cula - tipo: char(10)                                
                );
                
                // escolabase - Liga��o da base curricular na escola
                $escolabase = array(
                    'ed77_i_codigo' => '',  // C�digo - tipo: int8                                    
                    'ed77_i_escola' => '',  // Escola - tipo: int8                                    
                    'ed77_i_base' => '',  // Base - tipo: int8                                    
                    'ed77_i_atolegal' => '',  // Ato Legal - tipo: int8                                    
                    'ed77_i_basecont' => '',  // Base Continua��o - tipo: int8                                    
                );
                
                                // basemps - Cadastro das disciplinas da base curricular por s�rie
                $basemps = array(
                'ed34_i_codigo' => '',  // Base - tipo: int8                                    
                'ed34_i_base' => '',  // Base - tipo: int8                                    
                'ed34_i_serie' => '',  // Etapa - tipo: int8                                    
                'ed34_i_disciplina' => '',  // Disciplina - tipo: int8                                    
                'ed34_i_qtdperiodo' => '',  // Quantidade de Per�odos - tipo: int4                                    
                'ed34_i_chtotal' => '',  // Carga Hor�ria Total - tipo: int4                                    
                'ed34_c_condicao' => '',  // Matr�cula - tipo: char(2)                                 
                'ed34_i_ordenacao' => '',  // Ordenar Disciplinas - tipo: int4                                    
                );
                
                // baseserie - S�rie Inicial e Final da Base MPS
                $baseserie = array(
                    'ed87_i_codigo' => '',  // Base - tipo: int8                                    
                    'ed87_i_serieinicial' => '',  // Etapa Inicial - tipo: int8                                    
                    'ed87_i_seriefinal' => '',  // Etapa Final - tipo: int8                                    
                );
                                
                //ENSINO REGULAR - ENSINO FUNDAMENTAL - 9 ANOS / 6� AO 9� ANO
                case 26 :
                    // base - Cadastro da Base Curricular
                    $base_cod = $this->db_ecidade->nextSequenceId('escola.base_ed31_i_codigo_seq'); 
                    $base = array(
                        'ed31_i_codigo' => $base_cod,  // C�digo - tipo: int8                                    
                        'ed31_i_curso' => $r['ed71_i_curso'],  // Curso - tipo: int8                                    
                        'ed31_c_descr' => 'ANOS FINAIS',  // Nome da Base - tipo: char(40)                                
                        'ed31_c_turno' => 'DIURNO',  // Turno - tipo: char(20)                                
                        'ed31_c_medfreq' => 'P',  // Frequ�ncia - tipo: char(1)                                 
                        'ed31_c_contrfreq' => 'I',  // Controle de Frequ�ncia - tipo: char(1)                                 
                        'ed31_t_obs' => '',  // Observa��es - tipo: text                                    
                        'ed31_c_conclusao' => 'S',  // Base conclui curso - tipo: char(1)                                 
                        'ed31_i_regimemat' => '1',  // Regime de Matr�cula - tipo: int8                                    
                        'ed31_c_ativo' => 'S',  // Ativa - tipo: char(1)                                 
                        'ed31_c_matricula' => '',  // Regime de Matr�cula - tipo: char(10)                                
                    );
                    
                    // baseserie - S�rie Inicial e Final da Base MPS
                    $baseserie = array(
                        'ed87_i_codigo' => $base_cod,  // Base - tipo: int8                                    
                        'ed87_i_serieinicial' => 31,  // Etapa Inicial - tipo: int8                                    
                        'ed87_i_seriefinal' => 65,  // Etapa Final - tipo: int8                                    
                    );
                    
                    // escolabase - Liga��o da base curricular na escola
                    $escolabase_cod = $this->db_ecidade->nextSequenceId('escola.escolabase_ed77_i_codigo_seq'); 
                    $escolabase = array(
                        'ed77_i_codigo' => $escolabase_cod,  // C�digo - tipo: int8                                    
                        'ed77_i_escola' => $r['ed71_i_escola'],  // Escola - tipo: int8                                    
                        'ed77_i_base' => $base_cod,  // Base - tipo: int8                                    
                        'ed77_i_atolegal' => '',  // Ato Legal - tipo: int8                                    
                        'ed77_i_basecont' => '',  // Base Continua��o - tipo: int8                                    
                    );
                    
                    try {

                        $this->db_ecidade->insert('escola.caddisciplina', $caddisciplina);
                        $this->showMessage('Disciplina adicionada!');

                    } catch (Zend_Db_Exception $e){
                        
                        $this->showMessage($e->getMessage(),2);
                        exit;
                    }
                    $etapas('31','33','35','65');
                    $disciplinas(
                            array('d'=>'51','p'=>'4','o'=>'1'), //portugues
                            array('d'=>'52','p'=>'4','o'=>'2'), //matem�tica
                            array('d'=>'45','p'=>'3','o'=>'3'), //ciencias
                            array('d'=>'49','p'=>'2','o'=>'4'), //historia
                            array('d'=>'48','p'=>'2','o'=>'5'), //Geografia
                            array('d'=>'44','p'=>'1','o'=>'6'), //Artes
                            array('d'=>'46','p'=>'2','o'=>'7'), //Ed_F�sica
                            array('d'=>'47','p'=>'1','o'=>'8'), //Ensino Religioso
                            array('d'=>'50','p'=>'2','o'=>'9')  //Ingl�s
                            );
                    
                    foreach ($etapas as $etapa){
                        foreach ($disciplinas as $d){
                                // basemps - Cadastro das disciplinas da base curricular por s�rie
                                $basemps_cod = $this->db_ecidade->nextSequenceId('escola.basemps_ed34_i_codigo_seq'); 
                                $basemps = array(
                                'ed34_i_codigo' => $basemps_cod,  // Base - tipo: int8                                    
                                'ed34_i_base' => $base_cod,  // Base - tipo: int8                                    
                                'ed34_i_serie' => $etapa,  // Etapa - tipo: int8                                    
                                'ed34_i_disciplina' => $d['d'],  // Disciplina - tipo: int8                                    
                                'ed34_i_qtdperiodo' => $d['p'],  // Quantidade de Per�odos - tipo: int4                                    
                                'ed34_i_chtotal' => 0,  // Carga Hor�ria Total - tipo: int4                                    
                                'ed34_c_condicao' => 'OB',  // Matr�cula - tipo: char(2)                                 
                                'ed34_i_ordenacao' => $d['o'],  // Ordenar Disciplinas - tipo: int4                                    
                                );
                            }
                    }
                    break;
                
                //ENSINO DE JOVENS E ADULTOS - EJA - EJA 1� SEGMENT..
                case 23 :
                    break;
                
                //ENSINO DE JOVENS E ADULTOS - EJA - EJA 2� SEGMENT..
                case 24 :
                    break;
                
                //ENSINO ESPECIAL - ENSINO DE JOVENS E ADULTOS - EJA - EJA 1� SEGMENT..
                case 21 :
                    break;
                
                //ENSINO ESPECIAL -ENSINO DE JOVENS E ADULTOS - EJA - EJA 2� SEGMENT..
                case 22 :
                    break;
            }
        }
    }
}
