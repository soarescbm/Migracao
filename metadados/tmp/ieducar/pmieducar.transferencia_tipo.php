<?php

// pmieducar.transferencia_tipo
$transferencia_tipo = array('cod_transferencia_tipo', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'desc_tipo', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_escola', );

$transferencia_tipo = array(
'cod_transferencia_tipo',     // Tipo: int4 Valor Padrão: nextval('transferencia_tipo_cod_transferencia_tipo_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'desc_tipo',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);