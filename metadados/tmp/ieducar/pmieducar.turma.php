<?php

// pmieducar.turma
$turma = array('cod_turma', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_ref_cod_serie', 'ref_ref_cod_escola', 'ref_cod_infra_predio_comodo', 'nm_turma', 'sgl_turma', 'max_aluno', 'multiseriada', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_turma_tipo', 'hora_inicial', 'hora_final', 'hora_inicio_intervalo', 'hora_fim_intervalo', 'ref_cod_regente', 'ref_cod_instituicao_regente', 'ref_cod_instituicao', 'ref_cod_curso', 'ref_ref_cod_serie_mult', 'ref_ref_cod_escola_mult', 'visivel', 'ref_cod_turma_multiseriada', );

$turma = array(
'cod_turma',     // Tipo: int4 Valor Padrão: nextval('turma_cod_turma_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_serie',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_infra_predio_comodo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_turma',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'sgl_turma',     // Tipo: varchar Valor Padrão:  Tamanho: 15
'max_aluno',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'multiseriada',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_turma_tipo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'hora_inicial',     // Tipo: time Valor Padrão:  Tamanho: 8
'hora_final',     // Tipo: time Valor Padrão:  Tamanho: 8
'hora_inicio_intervalo',     // Tipo: time Valor Padrão:  Tamanho: 8
'hora_fim_intervalo',     // Tipo: time Valor Padrão:  Tamanho: 8
'ref_cod_regente',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_instituicao_regente',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_curso',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_serie_mult',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_escola_mult',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'visivel',     // Tipo: bool Valor Padrão:  Tamanho: 1
'ref_cod_turma_multiseriada',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);