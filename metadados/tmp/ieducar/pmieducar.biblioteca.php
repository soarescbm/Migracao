<?php

// pmieducar.biblioteca
$biblioteca = array('cod_biblioteca', 'ref_cod_instituicao', 'ref_cod_escola', 'nm_biblioteca', 'valor_multa', 'max_emprestimo', 'valor_maximo_multa', 'data_cadastro', 'data_exclusao', 'requisita_senha', 'ativo', 'dias_espera', 'tombo_automatico', );

$biblioteca = array(
'cod_biblioteca',     // Tipo: int4 Valor Padr�o: nextval('biblioteca_cod_biblioteca_seq'::regclass) Tamanho: 4
'ref_cod_instituicao',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_biblioteca',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'valor_multa',     // Tipo: float8 Valor Padr�o:  Tamanho: 8
'max_emprestimo',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'valor_maximo_multa',     // Tipo: float8 Valor Padr�o:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'requisita_senha',     // Tipo: int2 Valor Padr�o: (0)::smallint Tamanho: 2
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'dias_espera',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'tombo_automatico',     // Tipo: bool Valor Padr�o: true Tamanho: 1
);