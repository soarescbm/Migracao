<?php

// pmieducar.instituicao
$instituicao = array('cod_instituicao', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_idtlog', 'ref_sigla_uf', 'cep', 'cidade', 'bairro', 'logradouro', 'numero', 'complemento', 'nm_responsavel', 'ddd_telefone', 'telefone', 'data_cadastro', 'data_exclusao', 'ativo', 'nm_instituicao', );

$instituicao = array(
'cod_instituicao',     // Tipo: int4 Valor Padr�o: nextval('instituicao_cod_instituicao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_idtlog',     // Tipo: varchar Valor Padr�o:  Tamanho: 20
'ref_sigla_uf',     // Tipo: bpchar Valor Padr�o:  Tamanho: 2
'cep',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'cidade',     // Tipo: varchar Valor Padr�o:  Tamanho: 60
'bairro',     // Tipo: varchar Valor Padr�o:  Tamanho: 40
'logradouro',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'numero',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'complemento',     // Tipo: varchar Valor Padr�o:  Tamanho: 50
'nm_responsavel',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'ddd_telefone',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'telefone',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'nm_instituicao',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
);