<?php

// modules.componente_curricular
$componente_curricular = array('id', 'instituicao_id', 'area_conhecimento_id', 'nome', 'abreviatura', 'tipo_base', );

$componente_curricular = array(
'id',     // Tipo: int4 Valor Padr�o: nextval('componente_curricular_id_seq'::regclass) Tamanho: 4
'instituicao_id',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'area_conhecimento_id',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nome',     // Tipo: varchar Valor Padr�o:  Tamanho: 100
'abreviatura',     // Tipo: varchar Valor Padr�o:  Tamanho: 15
'tipo_base',     // Tipo: int2 Valor Padr�o:  Tamanho: 2
);