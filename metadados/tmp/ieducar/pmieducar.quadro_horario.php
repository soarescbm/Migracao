<?php

// pmieducar.quadro_horario
$quadro_horario = array('cod_quadro_horario', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_turma', 'data_cadastro', 'data_exclusao', 'ativo', );

$quadro_horario = array(
'cod_quadro_horario',     // Tipo: int4 Valor Padrão: nextval('quadro_horario_cod_quadro_horario_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_turma',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);