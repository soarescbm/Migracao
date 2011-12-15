<?php

// pmieducar.escola_localizacao
$escola_localizacao = array('cod_escola_localizacao', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_localizacao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$escola_localizacao = array(
'cod_escola_localizacao',     // Tipo: int4 Valor Padrão: nextval('escola_localizacao_cod_escola_localizacao_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_localizacao',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);