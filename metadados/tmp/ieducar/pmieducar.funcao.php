<?php

// pmieducar.funcao
$funcao = array('cod_funcao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_funcao', 'abreviatura', 'professor', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$funcao = array(
'cod_funcao',     // Tipo: int4 Valor Padr�o: nextval('funcao_cod_funcao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_funcao',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'abreviatura',     // Tipo: varchar Valor Padr�o:  Tamanho: 30
'professor',     // Tipo: int2 Valor Padr�o: (0)::smallint Tamanho: 2
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);