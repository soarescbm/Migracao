<?php

// pmieducar.infra_predio_comodo
$infra_predio_comodo = array('cod_infra_predio_comodo', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_infra_comodo_funcao', 'ref_cod_infra_predio', 'nm_comodo', 'desc_comodo', 'area', 'data_cadastro', 'data_exclusao', 'ativo', );

$infra_predio_comodo = array(
'cod_infra_predio_comodo',     // Tipo: int4 Valor Padrão: nextval('infra_predio_comodo_cod_infra_predio_comodo_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_infra_comodo_funcao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_infra_predio',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_comodo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'desc_comodo',     // Tipo: text Valor Padrão:  Tamanho: -1
'area',     // Tipo: float8 Valor Padrão:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);