<?php

// pmieducar.religiao
$religiao = array('cod_religiao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_religiao', 'data_cadastro', 'data_exclusao', 'ativo', );

$religiao = array(
'cod_religiao',     // Tipo: int4 Valor Padr�o: nextval('religiao_cod_religiao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_religiao',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
);