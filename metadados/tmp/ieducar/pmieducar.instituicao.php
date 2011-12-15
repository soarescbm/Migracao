<?php

// pmieducar.instituicao
$instituicao = array('cod_instituicao', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_idtlog', 'ref_sigla_uf', 'cep', 'cidade', 'bairro', 'logradouro', 'numero', 'complemento', 'nm_responsavel', 'ddd_telefone', 'telefone', 'data_cadastro', 'data_exclusao', 'ativo', 'nm_instituicao', );

$instituicao = array(
'cod_instituicao',     // Tipo: int4 Valor Padrão: nextval('instituicao_cod_instituicao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_idtlog',     // Tipo: varchar Valor Padrão:  Tamanho: 20
'ref_sigla_uf',     // Tipo: bpchar Valor Padrão:  Tamanho: 2
'cep',     // Tipo: numeric Valor Padrão:  Tamanho: -1
'cidade',     // Tipo: varchar Valor Padrão:  Tamanho: 60
'bairro',     // Tipo: varchar Valor Padrão:  Tamanho: 40
'logradouro',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'numero',     // Tipo: numeric Valor Padrão:  Tamanho: -1
'complemento',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'nm_responsavel',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'ddd_telefone',     // Tipo: numeric Valor Padrão:  Tamanho: -1
'telefone',     // Tipo: numeric Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'nm_instituicao',     // Tipo: varchar Valor Padrão:  Tamanho: 255
);