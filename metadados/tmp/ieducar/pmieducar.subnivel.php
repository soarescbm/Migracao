<?php

// pmieducar.subnivel
$subnivel = array('cod_subnivel', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_subnivel_anterior', 'ref_cod_nivel', 'nm_subnivel', 'data_cadastro', 'data_exclusao', 'ativo', 'salario', );

$subnivel = array(
'cod_subnivel',     // Tipo: int4 Valor Padrão: nextval('subnivel_cod_subnivel_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_subnivel_anterior',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_nivel',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_subnivel',     // Tipo: varchar Valor Padrão:  Tamanho: 100
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: bool Valor Padrão: true Tamanho: 1
'salario',     // Tipo: float8 Valor Padrão:  Tamanho: 8
);