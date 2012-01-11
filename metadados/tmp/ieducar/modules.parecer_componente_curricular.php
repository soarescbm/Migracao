<?php

// modules.parecer_componente_curricular
$parecer_componente_curricular = array('id', 'parecer_aluno_id', 'componente_curricular_id', 'parecer', 'etapa', );

$parecer_componente_curricular = array(
'id',     // Tipo: int4 Valor Padrão: nextval('parecer_componente_curricular_id_seq'::regclass) Tamanho: 4
'parecer_aluno_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'componente_curricular_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'parecer',     // Tipo: text Valor Padrão:  Tamanho: -1
'etapa',     // Tipo: varchar Valor Padrão:  Tamanho: 2
);