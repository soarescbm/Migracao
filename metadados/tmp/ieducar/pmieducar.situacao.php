<?php

// pmieducar.situacao
$situacao = array('cod_situacao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_situacao', 'permite_emprestimo', 'descricao', 'situacao_padrao', 'situacao_emprestada', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', );

$situacao = array(
'cod_situacao',     // Tipo: int4 Valor Padrão: nextval('situacao_cod_situacao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_situacao',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'permite_emprestimo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'situacao_padrao',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'situacao_emprestada',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);