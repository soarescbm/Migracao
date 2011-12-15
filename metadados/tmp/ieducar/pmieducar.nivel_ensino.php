<?php

// pmieducar.nivel_ensino
$nivel_ensino = array('cod_nivel_ensino', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_nivel', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$nivel_ensino = array(
'cod_nivel_ensino',     // Tipo: int4 Valor Padrão: nextval('nivel_ensino_cod_nivel_ensino_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_nivel',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'descricao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);