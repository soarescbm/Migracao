<?php

// pmieducar.pre_requisito
$pre_requisito = array('cod_pre_requisito', 'ref_usuario_exc', 'ref_usuario_cad', 'schema_', 'tabela', 'nome', 'sql', 'data_cadastro', 'data_exclusao', 'ativo', );

$pre_requisito = array(
'cod_pre_requisito',     // Tipo: int4 Valor Padr�o: nextval('pre_requisito_cod_pre_requisito_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'schema_',     // Tipo: varchar Valor Padr�o:  Tamanho: 50
'tabela',     // Tipo: varchar Valor Padr�o:  Tamanho: 50
'nome',     // Tipo: varchar Valor Padr�o:  Tamanho: 50
'sql',     // Tipo: text Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
);