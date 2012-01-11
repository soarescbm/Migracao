<?php

// modules.nota_componente_curricular
$nota_componente_curricular = array('id', 'nota_aluno_id', 'componente_curricular_id', 'nota', 'nota_arredondada', 'etapa', );

$nota_componente_curricular = array(
'id',     // Tipo: int4 Valor Padrão: nextval('nota_componente_curricular_id_seq'::regclass) Tamanho: 4
'nota_aluno_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'componente_curricular_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nota',     // Tipo: numeric Valor Padrão: 0 Tamanho: -1
'nota_arredondada',     // Tipo: varchar Valor Padrão: 0 Tamanho: 5
'etapa',     // Tipo: varchar Valor Padrão:  Tamanho: 2
);