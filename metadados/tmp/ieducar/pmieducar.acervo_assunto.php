<?php

// pmieducar.acervo_assunto
$acervo_assunto = array('cod_acervo_assunto', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_assunto', 'descricao', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_biblioteca', );

$acervo_assunto = array(
'cod_acervo_assunto',     // Tipo: int4 Valor Padr�o: nextval('acervo_assunto_cod_acervo_assunto_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_assunto',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_biblioteca',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);