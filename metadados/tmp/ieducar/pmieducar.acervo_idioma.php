<?php

// pmieducar.acervo_idioma
$acervo_idioma = array('cod_acervo_idioma', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_idioma', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', );

$acervo_idioma = array(
'cod_acervo_idioma',     // Tipo: int4 Valor Padr�o: nextval('acervo_idioma_cod_acervo_idioma_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_idioma',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);