<?php

// cadastro.raca
$raca = array('cod_raca', 'idpes_exc', 'idpes_cad', 'nm_raca', 'data_cadastro', 'data_exclusao', 'ativo', );

$raca = array(
'cod_raca',     // Tipo: int4 Valor Padrão: nextval('raca_cod_raca_seq'::regclass) Tamanho: 4
'idpes_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'idpes_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_raca',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: bool Valor Padrão: false Tamanho: 1
);