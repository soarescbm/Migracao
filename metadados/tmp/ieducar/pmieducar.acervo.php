<?php

// pmieducar.acervo
$acervo = array('cod_acervo', 'ref_cod_exemplar_tipo', 'ref_cod_acervo', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_acervo_colecao', 'ref_cod_acervo_idioma', 'ref_cod_acervo_editora', 'titulo', 'sub_titulo', 'cdu', 'cutter', 'volume', 'num_edicao', 'ano', 'num_paginas', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', 'isbn', );

$acervo = array(
'cod_acervo',     // Tipo: int4 Valor Padrão: nextval('acervo_cod_acervo_seq'::regclass) Tamanho: 4
'ref_cod_exemplar_tipo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_acervo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_acervo_colecao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_acervo_idioma',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_acervo_editora',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'titulo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'sub_titulo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'cdu',     // Tipo: varchar Valor Padrão:  Tamanho: 20
'cutter',     // Tipo: varchar Valor Padrão:  Tamanho: 20
'volume',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'num_edicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ano',     // Tipo: numeric Valor Padrão:  Tamanho: -1
'num_paginas',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'isbn',     // Tipo: numeric Valor Padrão:  Tamanho: -1
);