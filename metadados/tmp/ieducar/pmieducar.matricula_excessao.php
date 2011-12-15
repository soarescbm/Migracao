<?php

// pmieducar.matricula_excessao
$matricula_excessao = array('cod_aluno_excessao', 'ref_cod_matricula', 'ref_cod_turma', 'ref_sequencial', 'ref_cod_serie', 'ref_cod_escola', 'ref_cod_disciplina', 'reprovado_faltas', 'precisa_exame', 'permite_exame', );

$matricula_excessao = array(
'cod_aluno_excessao',     // Tipo: int4 Valor Padrão: nextval('matricula_excessao_cod_aluno_excessao_seq'::regclass) Tamanho: 4
'ref_cod_matricula',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_turma',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_sequencial',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_serie',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_disciplina',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'reprovado_faltas',     // Tipo: bool Valor Padrão:  Tamanho: 1
'precisa_exame',     // Tipo: bool Valor Padrão:  Tamanho: 1
'permite_exame',     // Tipo: bool Valor Padrão:  Tamanho: 1
);