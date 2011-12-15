<?php

// pessoal - Cadastro de Funcionarios
$pessoal = array(
'r01_anousu' => '',  // Ano do Exercicio - tipo: int4                                    
'r01_mesusu' => '',  // Mes do Exercicio - tipo: int4                                    
'r01_numcgm' => '',  // No. CGM - tipo: int4                                    
'r01_regist' => '',  // Matr�cula do Servidor - tipo: int4                                    
'r01_admiss' => '',  // Admiss�o - tipo: date                                    
'r01_regime' => '',  // Regime - tipo: int4                                    
'r01_lotac' => '',  // Lota��o - tipo: char(4)                                 
'r01_vincul' => '',  // V�nculo - tipo: int4                                    
'r01_cbo' => '',  // CBO - tipo: int4                                    
'r01_padrao' => '',  // Padr�o - tipo: char(10)                                
'r01_salari' => '',  // Sal�rio - tipo: float8                                  
'r01_tipsal' => '',  // Tipo de Sal�rio - tipo: char(1)                                 
'r01_folha' => '',  // Tipo de Folha - tipo: char(1)                                 
'r01_fpagto' => '',  // Forma de Pagamento - tipo: int4                                    
'r01_banco' => '',  // Banco - tipo: char(3)                                 
'r01_agenc' => '',  // Ag�ncia - tipo: char(5)                                 
'r01_contac' => '',  // Conta Corrente - tipo: char(15)                                
'r01_ctps' => '',  // CTPS - tipo: char(12)                                
'r01_pis' => '',  // PIS/PASEP - tipo: char(11)                                
'r01_fgts' => '',  // Op��o do FGTS - tipo: date                                    
'r01_bcofgt' => '',  // Codigo do Bco onde paga o FGTS - tipo: char(     3)                            
'r01_agfgts' => '',  // Agencia onde e Cadast. o FGTS - tipo: char(     5)                            
'r01_ccfgts' => '',  // Conta  do FGTS - tipo: char(11)                                
'r01_hrssem' => '',  // Horas Semanais - tipo: int4                                    
'r01_situac' => '',  // Codigo da Tabela de Situacoes - tipo: int4                                    
'r01_nasc' => '',  // Nascimento - tipo: date                                    
'r01_nacion' => '',  // Nacionalidade - tipo: int4                                    
'r01_anoche' => '',  // Ano de Chegado func. no BRASIL - tipo: int4                                    
'r01_instru' => '',  // Grau de Instru��o - tipo: int4                                    
'r01_sexo' => '',  // Sexo - tipo: char(1)                                 
'r01_recis' => '',  // Data da Rescis�o - tipo: date                                    
'r01_causa' => '',  // Causa da Rescisao - tipo: int4                                    
'r01_ponto' => '',  // Cart�o Ponto - tipo: int4                                    
'r01_alim' => '',  // Percentual Pensao Alimenticia - tipo: float8                                  
'r01_digito' => '',  // Digito de Controle do registro - tipo: char(     1)                            
'r01_tpvinc' => '',  // Tipo de V�nculo - tipo: char(1)                                 
'r01_arredn' => '',  // Arredondamento do ponto - tipo: float8                                  
'r01_progr' => '',  // Codigo da Tabela de Progressao - tipo: char(     1)                            
'r01_carth' => '',  // Cart. de Habilita��o - tipo: int8                                    
'r01_rubric' => '',  // Codigo da Rubrica do Arred. - tipo: char(     4)                            
'r01_tbprev' => '',  // Tab.  Previd�ncia - tipo: int4                                    
'r01_adia13' => '',  // valor adto do 13o salario - tipo: float8                                  
'r01_anter' => '',  // Data Anterior - tipo: date                                    
'r01_dtafas' => '',  // data do afastamento - tipo: date                                    
'r01_ctpsuf' => '',  // unidade federativa da ctps - tipo: char(     2)                            
'r01_dadi13' => '',  // data do adto do 13o salario - tipo: date                                    
'r01_estciv' => '',  // Estado Civil - tipo: char(1)                                 
'r01_funcao' => '',  // Cargo - tipo: int4                                    
'r01_trien' => '',  // Data Tri�nio - tipo: date                                    
'r01_tipadm' => '',  // tipo de admissao - tipo: int4                                    
'r01_caub' => '',  // subdivisao da causa de rescisa - tipo: char(     2)                            
'r01_aviso' => '',  // datade aviso p/celetistas - tipo: date                                    
'r01_hrsmen' => '',  // nr hrs mensais - tipo: float8                                  
'r01_rfi1' => '',  // inicio ferias 1o per rescisao - tipo: date                                    
'r01_rfi2' => '',  // final ferias 1o per rescisao - tipo: date                                    
'r01_rff1' => '',  // inicio ferias 2o per rescisao - tipo: date                                    
'r01_rff2' => '',  // final ferias 2o per rescisao - tipo: date                                    
'r01_rnd1' => '',  // nr dias ferias 1o per rescisao - tipo: float8                                  
'r01_rnd2' => '',  // nr ferias 2o per rescisao - tipo: float8                                  
'r01_r13i' => '',  // inicio per 13o sal rescisao - tipo: date                                    
'r01_r13f' => '',  // final do 13o sal rescisao - tipo: date                                    
'r01_rnd3' => '',  // nr dias 13o sal rescisao - tipo: float8                                  
'r01_ndres' => '',  // nr dias saldo sal rescisao - tipo: float8                                  
'r01_ndsal' => '',  // nr dias salarios/rescisao - tipo: float8                                  
'r01_prores' => '',  // ano/mes de proc da rescisao - tipo: char(     7)                            
'r01_matipe' => '',  // Matricula do IPE - tipo: int8                                    
'r01_dtvinc' => '',  // Data do Vinculo com IPE - tipo: date                                    
'r01_estado' => '',  // Situacao do IPE - tipo: char(     2)                            
'r01_dtalt' => '',  // Data da alteracao - tipo: date                                    
'r01_natura' => '',  // Naturalidade - tipo: char(25)                                
'r01_tpcont' => '',  // Tipo de Contrato - tipo: char(2)                                 
'r01_titele' => '',  // T�tulo - tipo: char(14)                                
'r01_zonael' => '',  // Zona eleitoral - tipo: char(     3)                            
'r01_secaoe' => '',  // Secao onde o funcionario vota. - tipo: char(     4)                            
'r01_taviso' => '',  // Tipo de aviso previo - tipo: int4                                    
'r01_cc' => '',  // Nr.do cc que o funcion.recebe - tipo: char(     1)                            
'r01_ocorre' => '',  // cod.multiplos vinculos sefip - tipo: char(     2)                            
'r01_basefo' => '',  // Base INSS outra empresa - tipo: float8                                  
'r01_descfo' => '',  // Desconto Inss outra empresa - tipo: float8                                  
'r01_b13fo' => '',  // Base 13.sal Inss outra empresa - tipo: float8                                  
'r01_d13fo' => '',  // Desc.13.sal.inss outra empresa - tipo: float8                                  
'r01_equip' => '',  // equiparacao salarial - tipo: boolean                                 
'r01_raca' => '',  // codigo raca/cor da rais - tipo: int4                                    
'r01_mremun' => '',  // valor maior remun.rescisao - tipo: float8                                  
'r01_reserv' => '',  // C.Reservista - tipo: varchar(15)                             
'r01_catres' => '',  // Categoria - tipo: varchar(4)                              
'r01_propi' => '',  // Propor��o - tipo: float8                                  
'r01_cargo' => '',  // Cargo - tipo: int4                                    
'r01_clas1' => '',  // Op��o livre - tipo: varchar(5)                              
'r01_origp' => '',  // Origem - tipo: int4                                    
'r01_clas2' => '',  // Op��o Livre - tipo: date                                    
'r01_vale' => '',  // Adiantamento - tipo: varchar(1)                              
'r01_instit' => '',  // codigo da instituicao - tipo: int4                                    
'r01_contrato' => '',  // Contrato - tipo: int8                                    
'r01_depsf' => '',  // Dependentes Sal.Fam�lia - tipo: int4                                    
'r01_depirf' => '',  // Dependentes IRRF - tipo: int4                                    
'r01_dident' => '',  // Dident - tipo: date                                    
'r01_oident' => '',  // Oident - tipo: char(10)                                
'r01_uident' => '',  // Uident - tipo: char(2)                                 
'r01_ctpsdt' => '',  // Ctpsdt - tipo: date                                    
);