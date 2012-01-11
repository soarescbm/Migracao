<?php

// modules.curso_superior
$curso_superior = array('id', 'curso_id', 'nome', 'classe_id', 'user_id', 'created_at', 'updated_at', );

$curso_superior = array(
'id',     // Tipo: int4 Valor Padrão: nextval('curso_superior_id_seq'::regclass) Tamanho: 4
'curso_id',     // Tipo: varchar Valor Padrão:  Tamanho: 100
'nome',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'classe_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'user_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'created_at',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'updated_at',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
);