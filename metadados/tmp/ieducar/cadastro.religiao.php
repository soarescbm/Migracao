<?php

// cadastro.religiao
$religiao = array('cod_religiao', 'idpes_exc', 'idpes_cad', 'nm_religiao', 'data_cadastro', 'data_exclusao', 'ativo', );

$religiao = array(
'cod_religiao',     // Tipo: int4 Valor Padr�o: nextval('religiao_cod_religiao_seq'::regclass) Tamanho: 4
'idpes_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'idpes_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_religiao',     // Tipo: varchar Valor Padr�o:  Tamanho: 50
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: bool Valor Padr�o: false Tamanho: 1
);