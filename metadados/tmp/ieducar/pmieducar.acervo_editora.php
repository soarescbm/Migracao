<?php

// pmieducar.acervo_editora
$acervo_editora = array('cod_acervo_editora', 'ref_usuario_cad', 'ref_usuario_exc', 'ref_idtlog', 'ref_sigla_uf', 'nm_editora', 'cep', 'cidade', 'bairro', 'logradouro', 'numero', 'telefone', 'ddd_telefone', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', );

$acervo_editora = array(
'cod_acervo_editora',     // Tipo: int4 Valor Padr�o: nextval('acervo_editora_cod_acervo_editora_seq'::regclass) Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_idtlog',     // Tipo: varchar Valor Padr�o:  Tamanho: 20
'ref_sigla_uf',     // Tipo: bpchar Valor Padr�o:  Tamanho: 2
'nm_editora',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'cep',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'cidade',     // Tipo: varchar Valor Padr�o:  Tamanho: 60
'bairro',     // Tipo: varchar Valor Padr�o:  Tamanho: 60
'logradouro',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'numero',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'telefone',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ddd_telefone',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);