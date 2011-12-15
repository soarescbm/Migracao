<?php

// pmieducar.falta_atraso
$falta_atraso = array('cod_falta_atraso', 'ref_cod_escola', 'ref_ref_cod_instituicao', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_servidor', 'tipo', 'data_falta_atraso', 'qtd_horas', 'qtd_min', 'justificada', 'data_cadastro', 'data_exclusao', 'ativo', );

$falta_atraso = array(
'cod_falta_atraso',     // Tipo: int4 Valor Padrão: nextval('falta_atraso_cod_falta_atraso_seq'::regclass) Tamanho: 4
'ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_servidor',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'tipo',     // Tipo: int2 Valor Padrão:  Tamanho: 2
'data_falta_atraso',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'qtd_horas',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'qtd_min',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'justificada',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
);