<?php

// pmieducar.transferencia_solicitacao
$transferencia_solicitacao = array('cod_transferencia_solicitacao', 'ref_cod_transferencia_tipo', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_matricula_entrada', 'ref_cod_matricula_saida', 'observacao', 'data_cadastro', 'data_exclusao', 'ativo', 'data_transferencia', );

$transferencia_solicitacao = array(
'cod_transferencia_solicitacao',     // Tipo: int4 Valor Padrão: nextval('transferencia_solicitacao_cod_transferencia_solicitacao_seq'::regclass) Tamanho: 4
'ref_cod_transferencia_tipo',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_matricula_entrada',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_matricula_saida',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'observacao',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'data_transferencia',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
);