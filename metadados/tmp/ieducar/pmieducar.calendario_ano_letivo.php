<?php

// pmieducar.calendario_ano_letivo
$calendario_ano_letivo = array('cod_calendario_ano_letivo', 'ref_cod_escola', 'ref_usuario_exc', 'ref_usuario_cad', 'ano', 'data_cadastra', 'data_exclusao', 'ativo', );

$calendario_ano_letivo = array(
'cod_calendario_ano_letivo',     // Tipo: int4 Valor Padrão: nextval('calendario_ano_letivo_cod_calendario_ano_letivo_seq'::regclass) Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ano',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastra',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);