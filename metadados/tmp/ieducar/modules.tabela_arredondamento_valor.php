<?php

// modules.tabela_arredondamento_valor
$tabela_arredondamento_valor = array('id', 'tabela_arredondamento_id', 'nome', 'descricao', 'valor_minimo', 'valor_maximo', );

$tabela_arredondamento_valor = array(
'id',     // Tipo: int4 Valor Padr�o: nextval('tabela_arredondamento_valor_id_seq'::regclass) Tamanho: 4
'tabela_arredondamento_id',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nome',     // Tipo: varchar Valor Padr�o:  Tamanho: 5
'descricao',     // Tipo: varchar Valor Padr�o:  Tamanho: 25
'valor_minimo',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'valor_maximo',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
);