<?php

// pmieducar.servidor_alocacao
$servidor_alocacao = array('cod_servidor_alocacao', 'ref_ref_cod_instituicao', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_escola', 'ref_cod_servidor', 'data_cadastro', 'data_exclusao', 'ativo', 'carga_horaria', 'periodo', 'hora_final', 'hora_inicial', 'dia_semana', );

$servidor_alocacao = array(
'cod_servidor_alocacao',     // Tipo: int4 Valor Padrão: nextval('servidor_alocacao_cod_servidor_alocacao_seq'::regclass) Tamanho: 4
'ref_ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_servidor',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'carga_horaria',     // Tipo: varchar Valor Padrão:  Tamanho: 8
'periodo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'hora_final',     // Tipo: time Valor Padrão:  Tamanho: 8
'hora_inicial',     // Tipo: time Valor Padrão:  Tamanho: 8
'dia_semana',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);