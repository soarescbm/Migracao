<?php

// pmieducar.turma_tipo
$turma_tipo = array('cod_turma_tipo', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'sgl_tipo', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$turma_tipo = array(
'cod_turma_tipo',     // Tipo: int4 Valor Padr�o: nextval('turma_tipo_cod_turma_tipo_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'sgl_tipo',     // Tipo: varchar Valor Padr�o:  Tamanho: 15
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);