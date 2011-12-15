<?php

// pmieducar.disciplina_topico
$disciplina_topico = array('cod_disciplina_topico', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_topico', 'desc_topico', 'data_cadastro', 'data_exclusao', 'ativo', );

$disciplina_topico = array(
'cod_disciplina_topico',     // Tipo: int4 Valor Padrão: nextval('disciplina_topico_cod_disciplina_topico_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_topico',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'desc_topico',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);