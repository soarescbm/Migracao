<?php

// pmieducar.pagamento_multa
$pagamento_multa = array('cod_pagamento_multa', 'ref_usuario_cad', 'ref_cod_cliente', 'valor_pago', 'data_cadastro', 'ref_cod_biblioteca', );

$pagamento_multa = array(
'cod_pagamento_multa',     // Tipo: int4 Valor Padrão: nextval('pagamento_multa_cod_pagamento_multa_seq'::regclass) Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_cliente',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'valor_pago',     // Tipo: float8 Valor Padrão:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ref_cod_biblioteca',     // Tipo: int4 Valor Padrão:  Tamanho: 4
);