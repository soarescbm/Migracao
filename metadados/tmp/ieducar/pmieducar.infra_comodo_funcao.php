<?php

// pmieducar.infra_comodo_funcao
$infra_comodo_funcao = array('cod_infra_comodo_funcao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_funcao', 'desc_funcao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_escola', );

$infra_comodo_funcao = array(
'cod_infra_comodo_funcao',     // Tipo: int4 Valor Padr�o: nextval('infra_comodo_funcao_cod_infra_comodo_funcao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_funcao',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'desc_funcao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_escola',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);