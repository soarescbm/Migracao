<?php

// pmieducar.nivel
$nivel = array('cod_nivel', 'ref_cod_categoria_nivel', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_nivel_anterior', 'nm_nivel', 'salario_base', 'data_cadastro', 'data_exclusao', 'ativo', );

$nivel = array(
'cod_nivel',     // Tipo: int4 Valor Padr�o: nextval('nivel_cod_nivel_seq'::regclass) Tamanho: 4
'ref_cod_categoria_nivel',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_cod_nivel_anterior',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_nivel',     // Tipo: varchar Valor Padr�o:  Tamanho: 100
'salario_base',     // Tipo: float8 Valor Padr�o:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: bool Valor Padr�o: true Tamanho: 1
);