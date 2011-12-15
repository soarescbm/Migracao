<?php

// pmieducar.exemplar
$exemplar = array('cod_exemplar', 'ref_cod_fonte', 'ref_cod_motivo_baixa', 'ref_cod_acervo', 'ref_cod_situacao', 'ref_usuario_exc', 'ref_usuario_cad', 'permite_emprestimo', 'preco', 'data_cadastro', 'data_exclusao', 'ativo', 'data_aquisicao', 'tombo', );

$exemplar = array(
'cod_exemplar',     // Tipo: int4 Valor Padrão: nextval('exemplar_cod_exemplar_seq'::regclass) Tamanho: 4
'ref_cod_fonte',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_motivo_baixa',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_acervo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_situacao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'permite_emprestimo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'preco',     // Tipo: float8 Valor Padrão:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'data_aquisicao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'tombo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);