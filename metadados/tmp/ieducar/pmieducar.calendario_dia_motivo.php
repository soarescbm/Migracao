<?php

// pmieducar.calendario_dia_motivo
$calendario_dia_motivo = array('cod_calendario_dia_motivo', 'ref_cod_escola', 'ref_usuario_exc', 'ref_usuario_cad', 'sigla', 'descricao', 'tipo', 'data_cadastro', 'data_exclusao', 'ativo', 'nm_motivo', );

$calendario_dia_motivo = array(
'cod_calendario_dia_motivo',     // Tipo: int4 Valor Padrão: nextval('calendario_dia_motivo_cod_calendario_dia_motivo_seq'::regclass) Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'sigla',     // Tipo: varchar Valor Padrão:  Tamanho: 15
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'tipo',     // Tipo: bpchar Valor Padrão:  Tamanho: 1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'nm_motivo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
);