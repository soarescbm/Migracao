<?php

// pmieducar.cliente_tipo
$cliente_tipo = array('cod_cliente_tipo', 'ref_cod_biblioteca', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', );

$cliente_tipo = array(
'cod_cliente_tipo',     // Tipo: int4 Valor Padrão: nextval('cliente_tipo_cod_cliente_tipo_seq'::regclass) Tamanho: 4
'ref_cod_biblioteca',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);