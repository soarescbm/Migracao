<?php

// pmieducar.cliente
$cliente = array('cod_cliente', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_idpes', 'login', 'senha', 'data_cadastro', 'data_exclusao', 'ativo', );

$cliente = array(
'cod_cliente',     // Tipo: int4 Valor Padr�o: nextval('cliente_cod_cliente_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_idpes',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'login',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'senha',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
);