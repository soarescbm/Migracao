<?php

// pmieducar.exemplar_emprestimo
$exemplar_emprestimo = array('cod_emprestimo', 'ref_usuario_devolucao', 'ref_usuario_cad', 'ref_cod_cliente', 'ref_cod_exemplar', 'data_retirada', 'data_devolucao', 'valor_multa', );

$exemplar_emprestimo = array(
'cod_emprestimo',     // Tipo: int4 Valor Padrão: nextval('exemplar_emprestimo_cod_emprestimo_seq'::regclass) Tamanho: 4
'ref_usuario_devolucao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_cliente',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_exemplar',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'data_retirada',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_devolucao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'valor_multa',     // Tipo: float8 Valor Padrão:  Tamanho: 8
);