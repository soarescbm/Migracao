<?php

// pmieducar.modulo
$modulo = array('cod_modulo', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'descricao', 'num_meses', 'num_semanas', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$modulo = array(
'cod_modulo',     // Tipo: int4 Valor Padr�o: nextval('modulo_cod_modulo_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'num_meses',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'num_semanas',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);