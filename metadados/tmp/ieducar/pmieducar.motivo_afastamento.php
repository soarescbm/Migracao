<?php

// pmieducar.motivo_afastamento
$motivo_afastamento = array('cod_motivo_afastamento', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_motivo', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$motivo_afastamento = array(
'cod_motivo_afastamento',     // Tipo: int4 Valor Padrão: nextval('motivo_afastamento_cod_motivo_afastamento_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_motivo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);