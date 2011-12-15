<?php

// pmieducar.material_tipo
$material_tipo = array('cod_material_tipo', 'ref_usuario_cad', 'ref_usuario_exc', 'nm_tipo', 'desc_tipo', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$material_tipo = array(
'cod_material_tipo',     // Tipo: int4 Valor Padrão: nextval('material_tipo_cod_material_tipo_seq'::regclass) Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'desc_tipo',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);