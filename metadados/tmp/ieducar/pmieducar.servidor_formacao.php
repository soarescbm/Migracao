<?php

// pmieducar.servidor_formacao
$servidor_formacao = array('cod_formacao', 'ref_ref_cod_instituicao', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_servidor', 'nm_formacao', 'tipo', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', );

$servidor_formacao = array(
'cod_formacao',     // Tipo: int4 Valor Padrão: nextval('servidor_formacao_cod_formacao_seq'::regclass) Tamanho: 4
'ref_ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_servidor',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_formacao',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'tipo',     // Tipo: bpchar Valor Padrão:  Tamanho: 1
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);