<?php

// pmieducar.acervo_colecao
$acervo_colecao = array('cod_acervo_colecao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_colecao', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', );

$acervo_colecao = array(
'cod_acervo_colecao',     // Tipo: int4 Valor Padrão: nextval('acervo_colecao_cod_acervo_colecao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_colecao',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);