<?php

// pmieducar.pre_requisito
$pre_requisito = array('cod_pre_requisito', 'ref_usuario_exc', 'ref_usuario_cad', 'schema_', 'tabela', 'nome', 'sql', 'data_cadastro', 'data_exclusao', 'ativo', );

$pre_requisito = array(
'cod_pre_requisito',     // Tipo: int4 Valor Padrão: nextval('pre_requisito_cod_pre_requisito_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'schema_',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'tabela',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'nome',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'sql',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);