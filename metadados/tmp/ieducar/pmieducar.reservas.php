<?php

// pmieducar.reservas
$reservas = array('cod_reserva', 'ref_usuario_libera', 'ref_usuario_cad', 'ref_cod_cliente', 'data_reserva', 'data_prevista_disponivel', 'data_retirada', 'ref_cod_exemplar', 'ativo', );

$reservas = array(
'cod_reserva',     // Tipo: int4 Valor Padrão: nextval('reservas_cod_reserva_seq'::regclass) Tamanho: 4
'ref_usuario_libera',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_cliente',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_reserva',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_prevista_disponivel',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_retirada',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ref_cod_exemplar',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);