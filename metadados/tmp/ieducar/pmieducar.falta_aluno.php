<?php

// pmieducar.falta_aluno
$falta_aluno = array('cod_falta_aluno', 'ref_cod_disciplina', 'ref_cod_escola', 'ref_cod_serie', 'ref_cod_matricula', 'ref_usuario_exc', 'ref_usuario_cad', 'faltas', 'data_cadastro', 'data_exclusao', 'ativo', 'modulo', 'ref_cod_curso_disciplina', );

$falta_aluno = array(
'cod_falta_aluno',     // Tipo: int4 Valor Padrão: nextval('falta_aluno_cod_falta_aluno_seq'::regclass) Tamanho: 4
'ref_cod_disciplina',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_serie',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_matricula',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'faltas',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'modulo',     // Tipo: int2 Valor Padrão:  Tamanho: 2
'ref_cod_curso_disciplina',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);