<?php

// pmieducar.coffebreak_tipo
$coffebreak_tipo = array('cod_coffebreak_tipo', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'desc_tipo', 'custo_unitario', 'data_cadastro', 'data_exclusao', 'ativo', );

$coffebreak_tipo = array(
'cod_coffebreak_tipo',     // Tipo: int4 Valor Padrão: nextval('coffebreak_tipo_cod_coffebreak_tipo_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'desc_tipo',     // Tipo: text Valor Padrão:  Tamanho: -1
'custo_unitario',     // Tipo: float8 Valor Padrão:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);