<?php

// pmieducar.calendario_anotacao
$calendario_anotacao = array('cod_calendario_anotacao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_anotacao', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', );

$calendario_anotacao = array(
'cod_calendario_anotacao',     // Tipo: int4 Valor Padr�o: nextval('calendario_anotacao_cod_calendario_anotacao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_anotacao',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o:  Tamanho: 2
);