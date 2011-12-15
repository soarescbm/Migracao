<?php

// pmieducar.aluno_beneficio
$aluno_beneficio = array('cod_aluno_beneficio', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_beneficio', 'desc_beneficio', 'data_cadastro', 'data_exclusao', 'ativo', );

$aluno_beneficio = array(
'cod_aluno_beneficio',     // Tipo: int4 Valor Padrão: nextval('aluno_beneficio_cod_aluno_beneficio_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_beneficio',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'desc_beneficio',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);