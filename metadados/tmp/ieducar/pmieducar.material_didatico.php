<?php

// pmieducar.material_didatico
$material_didatico = array('cod_material_didatico', 'ref_cod_instituicao', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_material_tipo', 'nm_material', 'desc_material', 'custo_unitario', 'data_cadastro', 'data_exclusao', 'ativo', );

$material_didatico = array(
'cod_material_didatico',     // Tipo: int4 Valor Padr�o: nextval('material_didatico_cod_material_didatico_seq'::regclass) Tamanho: 4
'ref_cod_instituicao',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_cod_material_tipo',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_material',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'desc_material',     // Tipo: text Valor Padr�o:  Tamanho: -1
'custo_unitario',     // Tipo: float8 Valor Padr�o:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
);