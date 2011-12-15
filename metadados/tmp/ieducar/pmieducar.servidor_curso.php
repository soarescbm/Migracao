<?php

// pmieducar.servidor_curso
$servidor_curso = array('cod_servidor_curso', 'ref_cod_formacao', 'data_conclusao', 'data_registro', 'diplomas_registros', );

$servidor_curso = array(
'cod_servidor_curso',     // Tipo: int4 Valor Padrão: nextval('servidor_curso_cod_servidor_curso_seq'::regclass) Tamanho: 4
'ref_cod_formacao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_conclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_registro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'diplomas_registros',     // Tipo: text Valor Padrão:  Tamanho: -1
);