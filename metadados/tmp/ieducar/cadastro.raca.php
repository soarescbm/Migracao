<?php

// cadastro.raca
$raca = array('cod_raca', 'idpes_exc', 'idpes_cad', 'nm_raca', 'data_cadastro', 'data_exclusao', 'ativo', );

$raca = array(
'cod_raca',     // Tipo: int4 Valor Padr�o: nextval('raca_cod_raca_seq'::regclass) Tamanho: 4
'idpes_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'idpes_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_raca',     // Tipo: varchar Valor Padr�o:  Tamanho: 50
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: bool Valor Padr�o: false Tamanho: 1
);