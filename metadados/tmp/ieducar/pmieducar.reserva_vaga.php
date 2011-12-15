<?php

// pmieducar.reserva_vaga
$reserva_vaga = array('cod_reserva_vaga', 'ref_ref_cod_escola', 'ref_ref_cod_serie', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_aluno', 'data_cadastro', 'data_exclusao', 'ativo', 'nm_aluno', 'cpf_responsavel', );

$reserva_vaga = array(
'cod_reserva_vaga',     // Tipo: int4 Valor Padrão: nextval('reserva_vaga_cod_reserva_vaga_seq'::regclass) Tamanho: 4
'ref_ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_serie',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_aluno',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'nm_aluno',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'cpf_responsavel',     // Tipo: numeric Valor Padrão:  Tamanho: -1
);