<?php

// modules.falta_componente_curricular
$falta_componente_curricular = array('id', 'falta_aluno_id', 'componente_curricular_id', 'quantidade', 'etapa', );

$falta_componente_curricular = array(
'id',     // Tipo: int4 Valor Padr�o: nextval('falta_componente_curricular_id_seq'::regclass) Tamanho: 4
'falta_aluno_id',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'componente_curricular_id',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'quantidade',     // Tipo: int4 Valor Padr�o: 0 Tamanho: 4
'etapa',     // Tipo: varchar Valor Padr�o:  Tamanho: 2
);