<?php

// pmieducar.motivo_suspensao
$motivo_suspensao = array('cod_motivo_suspensao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_motivo', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', );

$motivo_suspensao = array(
'cod_motivo_suspensao',     // Tipo: int4 Valor Padrão: nextval('motivo_suspensao_cod_motivo_suspensao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_motivo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);