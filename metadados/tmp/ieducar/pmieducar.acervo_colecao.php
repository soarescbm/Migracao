<?php

// pmieducar.acervo_colecao
$acervo_colecao = array('cod_acervo_colecao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_colecao', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', );

$acervo_colecao = array(
'cod_acervo_colecao',     // Tipo: int4 Valor Padr�o: nextval('acervo_colecao_cod_acervo_colecao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_colecao',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);