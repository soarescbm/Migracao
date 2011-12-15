<?php

// pmieducar.infra_predio
$infra_predio = array('cod_infra_predio', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_escola', 'nm_predio', 'desc_predio', 'endereco', 'data_cadastro', 'data_exclusao', 'ativo', );

$infra_predio = array(
'cod_infra_predio',     // Tipo: int4 Valor Padrão: nextval('infra_predio_cod_infra_predio_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_predio',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'desc_predio',     // Tipo: text Valor Padrão:  Tamanho: -1
'endereco',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);