<?php

// pmieducar.operador
$operador = array('cod_operador', 'ref_usuario_exc', 'ref_usuario_cad', 'nome', 'valor', 'fim_sentenca', 'data_cadastro', 'data_exclusao', 'ativo', );

$operador = array(
'cod_operador',     // Tipo: int4 Valor Padrão: nextval('operador_cod_operador_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nome',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'valor',     // Tipo: text Valor Padrão:  Tamanho: -1
'fim_sentenca',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);