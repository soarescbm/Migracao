<?php

// pmieducar.biblioteca_feriados
$biblioteca_feriados = array('cod_feriado', 'ref_cod_biblioteca', 'nm_feriado', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'data_feriado', );

$biblioteca_feriados = array(
'cod_feriado',     // Tipo: int4 Valor Padr�o: nextval('biblioteca_feriados_cod_feriado_seq'::regclass) Tamanho: 4
'ref_cod_biblioteca',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_feriado',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'data_feriado',     // Tipo: date Valor Padr�o:  Tamanho: 4
);