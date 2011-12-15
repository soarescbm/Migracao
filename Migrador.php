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
       //$this->addAlunos();
       
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
    
    public function addDepartamentos()
    {  
         //Cada escola � um departamento no e-cidade
         //Colunas da tabela db_depart
         $departamento = array(
             'coddepto' =>'', 
             'descrdepto' =>'', 
             'instit' =>'', 
         );
         //Colunas da tabela db_departorg - Departamento - Org�o
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
             $r['sigla'] = Zend_Filter::filterStatic($r['sigla'] ,'StringToUpper');
             if(substr($r['sigla'], 0, 1) == 'C'){
                 $descricao = 'CRECHE - '.$r['sigla'];
             }else {
                 $descricao = 'ESCOLA - '.$r['sigla'];
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
               $this->showMessage('Departamento '. $r['sigla'].'-'.$cod_depart. ' criado.',1);
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
    
    public function addUnidade()
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
    public function addEscolas(){
        
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
         //N�o gerar inconsistencia em caso de integra��o com os outros m�dulos do e-cidade.
         $i = 100000;
         foreach ($result  as $r){
             //Cadastro de Ruas
              $rural = 0;
             if ($r['ref_cod_escola_localizacao'] == 2 ){
                 $rural = 1;
             }
             
           //Pesquisa a existencia do logradouro no sistema
            $where = $this->db_ecidade->quoteInto('a.j14_nome = ?',strtoupper($r['logradouro']));
            $selectlog = new Zend_Db_Select($this->db_ecidade);
            $selectlog->from(array('a'=>'ruas'),array('a.j14_codigo'), 'cadastro')
                         ->where($where);
            $resultlog = $this->db_ecidade->fetchAll($selectlog);
            if(count($resultlog) > 0){
                $rua_id = $resultlog[0]['j14_codigo'];
            } else {
                 $ruas = array(
                     'j14_codigo'=>$i,
                     'j14_nome'=>Zend_Filter::filterStatic($r['logradouro'],'StringToUpper'),
                     'j14_tipo'=>1,
                     'j14_rural'=>$rural
                 );
                 try {
                    $rua_id = $this->db_ecidade->insert('cadastro.ruas', $ruas);
                    $this->showMessage('Rua criada.');
                   
                } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2); 
                        exit;
                }
            }

            //Pesquisa a existencia do bairro no sistema
            $where = $this->db_ecidade->quoteInto('a.j13_descr = ?',strtoupper($r['bairro']));
            $selectbairro = new Zend_Db_Select($this->db_ecidade);
            $selectbairro->from(array('a'=>'bairro'),array('a.j13_codi'), 'cadastro')
                         ->where($where);
            $resultbairro = $this->db_ecidade->fetchAll($selectbairro);
            if(count($resultbairro) > 0){
                $bairro_id = $resultbairro[0]['j13_codi'];
            } else {
                  $bairros = array(
                     'j13_codi'=>$i,
                     'j13_descr'=>Zend_Filter::filterStatic($r['bairro'],'StringToUpper'),
                     'j13_rural'=>$rural
                 );
                 try {
                    $bairro_id = $this->db_ecidade->insert('cadastro.bairro', $bairros);
                    $this->showMessage('Bairro criada.');
                   
                } catch (Zend_Db_Exception $e){
                        $this->showMessage($e->getMessage(),2); 
                        exit;
                }
            }

                   
            
             
             $cod_escola = $r['cod_escola'] + (int)$this->config->departamento->codigo_variacao;
             //Cada escola � um departamento no e-cidade
            if($r['uf_'] == ''){
                $r['uf_'] =  $this->config->educacenso->uf;
            }
            if($r['municipio_'] == ''){
                $r['municipio_'] = $this->config->educacenso->municipio;
            }
            if($r['distrito_'] == ''){
                $r['distrito_'] = $this->config->educacenso->distrito;
            }
            
            
             
              $escola = array(
             'ed18_i_codigo' =>  $cod_escola, 
             'ed18_i_rua' => $rua_id, 
             'ed18_i_numero' =>$r['numero'], 
             'ed18_c_compl' =>$r['complemento'], 
             'ed18_i_bairro' => $bairro_id, 
             'ed18_c_nome' =>Zend_Filter::filterStatic($r['nm_escola'],'StringToUpper'), 
             'ed18_c_abrev' =>Zend_Filter::filterStatic($r['sigla'],'StringToUpper'), 
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
    
    public function addAlunos(){
        // aluno - Cadastro de Alunos
        $aluno =  array(
            'ed47_i_codigo' => '',  // C�digo - tipo: int8                                    
            'ed47_v_nome' => '',  // Nome - tipo: char(70)                                
            'ed47_v_ender' => '',  // Endere�o - tipo: varchar(100)                            
            'ed47_c_numero' => '',  // N�mero - tipo: char(10)                                
            'ed47_v_compl' => '',  // Complemento - tipo: varchar(20)                             
            'ed47_v_bairro' => '',  // Bairro - tipo: varchar(40)                             
            'ed47_v_cep' => '',  // CEP - tipo: varchar(8)                              
            'ed47_c_raca' => '',  // Ra�a - tipo: char(20)                                
            'ed47_v_cxpostal' => '',  // Caixa Postal - tipo: varchar(20)                             
            'ed47_v_telef' => '',  // Telefone - tipo: varchar(12)                             
            'ed47_d_cadast' => '',  // Data do Cadastramento - tipo: date                                    
            'ed47_v_ident' => '',  // N� Identidade - tipo: varchar(20)                             
            'ed47_i_login' => '',  // Login - tipo: int4                                    
            'ed47_c_nomeresp' => '',  // Respons�vel Legal - tipo: char(70)                                
            'ed47_c_emailresp' => '',  // Email do Respons�vel - tipo: char(50)                                
            'ed47_c_atenddifer' => '',  // Recebe Escolariza��o em Outro Espa�o - tipo: char(30)                                
            'ed47_t_obs' => '',  // Observa��es - tipo: text                                    
            'ed47_c_transporte' => '',  // Poder P�blico Respons�vel - tipo: char(20)                                
            'ed47_c_zona' => '',  // Zona - tipo: char(20)                                
            'ed47_c_certidaotipo' => '',  // Tipo de Certid�o - tipo: char(1)                                 
            'ed47_c_certidaonum' => '',  // N�mero do Termo - tipo: char(8)                                 
            'ed47_c_certidaolivro' => '',  // Livro - tipo: char(8)                                 
            'ed47_c_certidaofolha' => '',  // Folha - tipo: char(4)                                 
            'ed47_c_certidaocart' => '',  // Cart�rio - tipo: char(150)                               
            'ed47_c_certidaodata' => '',  // Data de Emiss�o - tipo: date                                    
            'ed47_c_nis' => '',  // N� NIS - tipo: char(11)                                
            'ed47_c_bolsafamilia' => '',  // Bolsa Fam�lia - tipo: char(1)                                 
            'ed47_c_passivo' => '',  // Passivo - tipo: char(1)                                 
            'ed47_d_dtemissao' => '',  // Emiss�o CNH - tipo: date                                    
            'ed47_d_dthabilitacao' => '',  // 1� CNH - tipo: date                                    
            'ed47_d_dtvencimento' => '',  // Vencimento CNH - tipo: date                                    
            'ed47_d_nasc' => '',  // Nascimento - tipo: date                                    
            'ed47_d_ultalt' => '',  // �ltima Altera��o - tipo: date                                    
            'ed47_i_estciv' => '',  // Estado Civil - tipo: int4                                    
            'ed47_i_nacion' => '',  // Nacionalidade - tipo: int4                                    
            'ed47_v_categoria' => '',  // Categoria CNH - tipo: varchar(2)                              
            'ed47_v_cnh' => '',  // N� CNH - tipo: varchar(20)                             
            'ed47_v_contato' => '',  // Contato - tipo: text                                    
            'ed47_v_cpf' => '',  // CPF - tipo: varchar(11)                             
            'ed47_v_email' => '',  // Email - tipo: varchar(100)                            
            'ed47_v_fax' => '',  // Fax - tipo: varchar(12)                             
            'ed47_v_hora' => '',  // Hora do Cadastramento - tipo: varchar(5)                              
            'ed47_v_mae' => '',  // M�e - tipo: char(70)                                
            'ed47_v_pai' => '',  // Pai - tipo: char(70)                                
            'ed47_v_profis' => '',  // Profiss�o - tipo: varchar(40)                             
            'ed47_v_sexo' => '',  // Sexo - tipo: varchar(1)                              
            'ed47_v_telcel' => '',  // Telefone Celular - tipo: varchar(12)                             
            'ed47_c_foto' => '',  // Foto - tipo: char(100)                               
            'ed47_o_oid' => '',  // Imagem - tipo: oid                                     
            'ed47_c_codigoinep' => '',  // C�digo INEP - tipo: char(12)                                
            'ed47_i_pais' => '',  // Pa�s - tipo: int8                                    
            'ed47_d_identdtexp' => '',  // Data Expedi��o Identidade - tipo: date                                    
            'ed47_v_identcompl' => '',  // Complemento - tipo: char(4)                                 
            'ed47_c_passaporte' => '',  // N� Passaporte - tipo: char(20)                                
            'ed47_i_transpublico' => '',  // Transporte Escolar P�blico - tipo: int4                                    
            'ed47_i_filiacao' => '',  // Filia��o - tipo: int4                                    
            'ed47_i_censoufend' => '',  // UF - tipo: int4                                    
            'ed47_i_censomunicend' => '',  // Munic�pio - tipo: int4                                    
            'ed47_i_censoorgemissrg' => '',  // �rg�o Emissor - tipo: int4                                    
            'ed47_i_censoufident' => '',  // UF Identidade - tipo: int4                                    
            'ed47_i_censoufcert' => '',  // UF Cart�rio - tipo: int4                                    
            'ed47_i_censomuniccert' => '',  // Munic�pio - tipo: int4                                    
            'ed47_i_censoufnat' => '',  // UF de Nascimento - tipo: int4                                    
            'ed47_i_censomunicnat' => '',  // Naturalidade - tipo: int4                                    
            'ed47_i_atendespec' => '',  // Atend. Especializado - tipo: int4                                    
        );
        
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
                ->order('a.cod_aluno');
              
         

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
        if (count($resultMunic)) {
            $where = $this->db_ieducar->quoteInto('a.ed261_c_nome = ?',strtoupper($resultMunic[0]['nome']));
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
        $where = $this->db_ieducar->quoteInto('a.ed261_c_nome = ?',strtoupper($r['cidade']));
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
        $where = $this->db_ieducar->quoteInto('a.ed260_c_sigla = ?',strtoupper($r['sigla_uf_cert_civil']));
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
        $where = $this->db_ieducar->quoteInto('a.ed260_c_sigla = ?',strtoupper($r['sigla_uf_exp_rg']));
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
        $where = $this->db_ieducar->quoteInto('a.ed132_c_descr = ?',strtoupper($r['descricao']));
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
            'ed47_v_nome' => strtoupper($r['nome']),  // Nome - tipo: char(70)                                
            'ed47_v_ender' => $r['idtlog'].' '.strtoupper($r['logradouro']),  // Endere�o - tipo: varchar(100)                            
            'ed47_c_numero' => $r['numero'],  // N�mero - tipo: char(10)                                
            'ed47_v_compl' => $r['complemento'],  // Complemento - tipo: varchar(20)                             
            'ed47_v_bairro' => strtoupper($r['bairro']),  // Bairro - tipo: varchar(40)                             
            'ed47_v_cep' => $r['cep'],  // CEP - tipo: varchar(8)                              
            'ed47_c_raca' =>  strtoupper($r['nm_raca']),  // Ra�a - tipo: char(20)                                
            'ed47_v_cxpostal' => '',  // Caixa Postal - tipo: varchar(20)                             
            'ed47_v_telef' => $fone,  // Telefone - tipo: varchar(12)                             
            'ed47_d_cadast' => $data_cadastro,  // Data do Cadastramento - tipo: date                                    
            'ed47_v_ident' => $r['rg'],  // N� Identidade - tipo: varchar(20)                             
            'ed47_i_login' => 0,  // Login - tipo: int4                                    
            'ed47_c_nomeresp' => strtoupper($respon),  // Respons�vel Legal - tipo: char(70)                                
            'ed47_c_emailresp' => $r['email'],  // Email do Respons�vel - tipo: char(50)                                
            'ed47_c_atenddifer' => '',  // Recebe Escolariza��o em Outro Espa�o - tipo: char(30)                                
            'ed47_t_obs' => '',  // Observa��es - tipo: text                                    
            'ed47_c_transporte' => '',  // Poder P�blico Respons�vel - tipo: char(20)                                
            'ed47_c_zona' => $zona,  // Zona - tipo: char(20)                                
            'ed47_c_certidaotipo' => $r['tipo_cert_civil'],  // Tipo de Certid�o - tipo: char(1)                                 
            'ed47_c_certidaonum' => $r['num_termo'],  // N�mero do Termo - tipo: char(8)                                 
            'ed47_c_certidaolivro' => $r['num_livro'],  // Livro - tipo: char(8)                                 
            'ed47_c_certidaofolha' => $r['num_folha'],  // Folha - tipo: char(4)                                 
            'ed47_c_certidaocart' =>strtoupper( $r['cartorio_cert_civil']),  // Cart�rio - tipo: char(150)                               
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
            'ed47_v_mae' => strtoupper($r['nm_mae']),  // M�e - tipo: char(70)                                
            'ed47_v_pai' => strtoupper($r['nm_pai']),  // Pai - tipo: char(70)                                
            'ed47_v_profis' => '',  // Profiss�o - tipo: varchar(40)                             
            'ed47_v_sexo' => strtoupper($r['sexo']),  // Sexo - tipo: varchar(1)                              
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
                     $this->showMessage('Aluno atualizado - '.$r['cod_aluno']);
                } else {
                     
                     $resultado= $this->db_ecidade->insert('escola.aluno', $aluno);
                     $this->showMessage('Aluno adicionadio - '.$r['cod_aluno']);
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
        
        // cursoedu - Cadastro de Cursos
        $cursoedu = array(
        'ed29_i_codigo' => '',  // C�digo - tipo: int8                                    
        'ed29_i_ensino' => '',  // N�vel de Ensino - tipo: int8                                    
        'ed29_c_descr' => '',  // Nome do Curso - tipo: char(40)                                
        'ed29_c_historico' => '',  // Incluir no Hist�rico - tipo: char(1)                                 
        );
        
        // ensino - Cadastro dos ensinos da escola
        $ensino = array(
        'ed10_i_codigo' => '',  // C�digo - tipo: int8                                    
        'ed10_i_tipoensino' => '',  // Modalidade de Ensino - tipo: int8                                    
        'ed10_i_grauensino' => '',  // Grau de Ensino - tipo: int4                                    
        'ed10_c_descr' => '',  // Descri��o - tipo: char(50)                                
        'ed10_c_abrev' => '',  // Abreviatura - tipo: char(5)                                 
        );
        
    }
}
