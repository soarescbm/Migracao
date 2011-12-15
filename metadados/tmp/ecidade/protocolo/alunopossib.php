<?php

// alunopossib - Esta tabela possui a etapa em que o aluno atualmente encontra-se (ou que está matriculado ou que está apto a cursar). Esta tabela é somente atualizada no momento da matrícula do aluno e no encerramento de avaliações. Quando é inserido registro no histórico do aluno manualmente, esta tabela não é atualizada.
$alunopossib = array(
'ed79_i_codigo' => '',  // Código - tipo: int8                                    
'ed79_i_alunocurso' => '',  // Aluno - tipo: int8                                    
'ed79_i_serie' => '',  // Etapa - tipo: int8                                    
'ed79_i_turno' => '',  // Turno - tipo: int8                                    
'ed79_c_resulant' => '',  // Resultado Anterior - tipo: char(1)                                 
'ed79_i_turmaant' => '',  // Turma Anterior - tipo: int8                                    
'ed79_c_situacao' => '',  // Situação - tipo: char(1)                                 
);