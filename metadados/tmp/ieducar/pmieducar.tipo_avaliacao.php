<?php

// pmieducar.tipo_avaliacao
$tipo_avaliacao = array('cod_tipo_avaliacao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'data_cadastro', 'data_exclusao', 'ativo', 'conceitual', 'ref_cod_instituicao', );

$tipo_avaliacao = array(
'cod_tipo_avaliacao',     // Tipo: int4 Valor Padrão: nextval('tipo_avaliacao_cod_tipo_avaliacao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'conceitual',     // Tipo: int2 Valor Padrão: 1 Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);