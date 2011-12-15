<?php

// pmieducar.falta_atraso_compensado
$falta_atraso_compensado = array('cod_compensado', 'ref_cod_escola', 'ref_ref_cod_instituicao', 'ref_cod_servidor', 'ref_usuario_exc', 'ref_usuario_cad', 'data_inicio', 'data_fim', 'data_cadastro', 'data_exclusao', 'ativo', );

$falta_atraso_compensado = array(
'cod_compensado',     // Tipo: int4 Valor Padrão: nextval('falta_atraso_compensado_cod_compensado_seq'::regclass) Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_servidor',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_inicio',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_fim',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);