<?php

// pmieducar.nota_aluno
$nota_aluno = array('cod_nota_aluno', 'ref_cod_disciplina', 'ref_cod_escola', 'ref_cod_serie', 'ref_cod_matricula', 'ref_sequencial', 'ref_ref_cod_tipo_avaliacao', 'ref_usuario_exc', 'ref_usuario_cad', 'data_cadastro', 'data_exclusao', 'ativo', 'modulo', 'ref_cod_curso_disciplina', 'nota', );

$nota_aluno = array(
'cod_nota_aluno',     // Tipo: int4 Valor Padrão: nextval('nota_aluno_cod_nota_aluno_seq'::regclass) Tamanho: 4
'ref_cod_disciplina',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_serie',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_matricula',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_sequencial',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_tipo_avaliacao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'modulo',     // Tipo: int2 Valor Padrão:  Tamanho: 2
'ref_cod_curso_disciplina',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nota',     // Tipo: float8 Valor Padrão:  Tamanho: 8
);