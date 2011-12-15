<?php

// pmieducar.escola
$escola = array('cod_escola', 'ref_usuario_cad', 'ref_usuario_exc', 'ref_cod_instituicao', 'ref_cod_escola_localizacao', 'ref_cod_escola_rede_ensino', 'ref_idpes', 'sigla', 'data_cadastro', 'data_exclusao', 'ativo', );

$escola = array(
'cod_escola',     // Tipo: int4 Valor Padrão: nextval('escola_cod_escola_seq'::regclass) Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola_localizacao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_escola_rede_ensino',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_idpes',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'sigla',     // Tipo: varchar Valor Padrão:  Tamanho: 20
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);