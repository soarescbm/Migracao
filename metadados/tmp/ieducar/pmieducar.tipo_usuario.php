<?php

// pmieducar.tipo_usuario
$tipo_usuario = array('cod_tipo_usuario', 'ref_funcionario_cad', 'ref_funcionario_exc', 'nm_tipo', 'descricao', 'nivel', 'data_cadastro', 'data_exclusao', 'ativo', );

$tipo_usuario = array(
'cod_tipo_usuario',     // Tipo: int4 Valor Padr�o: nextval('tipo_usuario_cod_tipo_usuario_seq'::regclass) Tamanho: 4
'ref_funcionario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_funcionario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'nivel',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
);