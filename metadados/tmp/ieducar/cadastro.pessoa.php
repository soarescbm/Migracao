<?php

// cadastro.pessoa
$pessoa = array('idpes', 'nome', 'idpes_cad', 'data_cad', 'url', 'tipo', 'idpes_rev', 'data_rev', 'email', 'situacao', 'origem_gravacao', 'operacao', 'idsis_rev', 'idsis_cad', );

$pessoa = array(
'idpes',     // Tipo: numeric Valor Padr�o: nextval(('cadastro.seq_pessoa'::text)::regclass) Tamanho: -1
'nome',     // Tipo: varchar Valor Padr�o:  Tamanho: 150
'idpes_cad',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'data_cad',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'url',     // Tipo: varchar Valor Padr�o:  Tamanho: 60
'tipo',     // Tipo: bpchar Valor Padr�o:  Tamanho: 1
'idpes_rev',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'data_rev',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'email',     // Tipo: varchar Valor Padr�o:  Tamanho: 50
'situacao',     // Tipo: bpchar Valor Padr�o:  Tamanho: 1
'origem_gravacao',     // Tipo: bpchar Valor Padr�o:  Tamanho: 1
'operacao',     // Tipo: bpchar Valor Padr�o:  Tamanho: 1
'idsis_rev',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'idsis_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);