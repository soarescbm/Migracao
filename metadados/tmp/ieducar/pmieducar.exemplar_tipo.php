<?php

// pmieducar.exemplar_tipo
$exemplar_tipo = array('cod_exemplar_tipo', 'ref_cod_biblioteca', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', );

$exemplar_tipo = array(
'cod_exemplar_tipo',     // Tipo: int4 Valor Padr�o: nextval('exemplar_tipo_cod_exemplar_tipo_seq'::regclass) Tamanho: 4
'ref_cod_biblioteca',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
);