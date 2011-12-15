<?php

// alunopossib - Esta tabela possui a etapa em que o aluno atualmente encontra-se (ou que est� matriculado ou que est� apto a cursar). Esta tabela � somente atualizada no momento da matr�cula do aluno e no encerramento de avalia��es. Quando � inserido registro no hist�rico do aluno manualmente, esta tabela n�o � atualizada.
$alunopossib = array(
'ed79_i_codigo' => '',  // C�digo - tipo: int8                                    
'ed79_i_alunocurso' => '',  // Aluno - tipo: int8                                    
'ed79_i_serie' => '',  // Etapa - tipo: int8                                    
'ed79_i_turno' => '',  // Turno - tipo: int8                                    
'ed79_c_resulant' => '',  // Resultado Anterior - tipo: char(1)                                 
'ed79_i_turmaant' => '',  // Turma Anterior - tipo: int8                                    
'ed79_c_situacao' => '',  // Situa��o - tipo: char(1)                                 
);