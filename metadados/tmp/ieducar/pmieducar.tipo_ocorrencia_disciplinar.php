<?php

// pmieducar.tipo_ocorrencia_disciplinar
$tipo_ocorrencia_disciplinar = array('cod_tipo_ocorrencia_disciplinar', 'ref_usuario_exc', 'ref_usuario_cad', 'nm_tipo', 'descricao', 'max_ocorrencias', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_cod_instituicao', );

$tipo_ocorrencia_disciplinar = array(
'cod_tipo_ocorrencia_disciplinar',     // Tipo: int4 Valor Padr�o: nextval('tipo_ocorrencia_disciplinar_cod_tipo_ocorrencia_disciplinar_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_tipo',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'descricao',     // Tipo: text Valor Padr�o:  Tamanho: -1
'max_ocorrencias',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'ref_cod_instituicao',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);