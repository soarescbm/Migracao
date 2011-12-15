<?php

// pmieducar.biblioteca
$biblioteca = array('cod_biblioteca', 'ref_cod_instituicao', 'ref_cod_escola', 'nm_biblioteca', 'valor_multa', 'max_emprestimo', 'valor_maximo_multa', 'data_cadastro', 'data_exclusao', 'requisita_senha', 'ativo', 'dias_espera', 'tombo_automatico', );

$biblioteca = array(
'cod_biblioteca',     // Tipo: int4 Valor Padrão: nextval('biblioteca_cod_biblioteca_seq'::regclass) Tamanho: 4
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_biblioteca',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'valor_multa',     // Tipo: float8 Valor Padrão:  Tamanho: 8
'max_emprestimo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'valor_maximo_multa',     // Tipo: float8 Valor Padrão:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'requisita_senha',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'dias_espera',     // Tipo: numeric Valor Padrão:  Tamanho: -1
'tombo_automatico',     // Tipo: bool Valor Padrão: true Tamanho: 1
);