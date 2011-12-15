<?php

// pmieducar.tipo_regime
$tipo_regime = array('cod_tipo_regime', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$tipo_regime = array(
'cod_tipo_regime',     // Tipo: int4 Valor Padrão: nextval('tipo_regime_cod_tipo_regime_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão:  Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);