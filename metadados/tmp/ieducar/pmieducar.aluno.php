<?php

// pmieducar.aluno
$aluno = array('cod_aluno', 'ref_cod_aluno_beneficio', 'ref_cod_religiao', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_idpes', 'data_cadastro', 'data_exclusao', 'ativo', 'caminho_foto', 'analfabeto', 'nm_pai', 'nm_mae', 'tipo_responsavel', );

$aluno = array(
'cod_aluno',     // Tipo: int4 Valor Padrão: nextval('aluno_cod_aluno_seq'::regclass) Tamanho: 4
'ref_cod_aluno_beneficio',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_religiao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_idpes',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'caminho_foto',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'analfabeto',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'nm_pai',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'nm_mae',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'tipo_responsavel',     // Tipo: bpchar Valor Padrão:  Tamanho: 1
);