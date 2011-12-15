<?php

// pmieducar.categoria_nivel
$categoria_nivel = array('cod_categoria_nivel', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_categoria_nivel', 'data_cadastro', 'data_exclusao', 'ativo', );

$categoria_nivel = array(
'cod_categoria_nivel',     // Tipo: int4 Valor Padrão: nextval('categoria_nivel_cod_categoria_nivel_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_categoria_nivel',     // Tipo: varchar Valor Padrão:  Tamanho: 100
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: bool Valor Padrão: true Tamanho: 1
);