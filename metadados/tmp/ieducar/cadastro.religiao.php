<?php

// cadastro.religiao
$religiao = array('cod_religiao', 'idpes_exc', 'idpes_cad', 'nm_religiao', 'data_cadastro', 'data_exclusao', 'ativo', );

$religiao = array(
'cod_religiao',     // Tipo: int4 Valor Padrão: nextval('religiao_cod_religiao_seq'::regclass) Tamanho: 4
'idpes_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'idpes_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_religiao',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: bool Valor Padrão: false Tamanho: 1
);