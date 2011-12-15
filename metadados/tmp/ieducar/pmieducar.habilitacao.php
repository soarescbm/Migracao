<?php

// pmieducar.habilitacao
$habilitacao = array('cod_habilitacao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$habilitacao = array(
'cod_habilitacao',     // Tipo: int4 Valor Padrão: nextval('habilitacao_cod_habilitacao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);