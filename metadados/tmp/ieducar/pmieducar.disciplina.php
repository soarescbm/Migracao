<?php

// pmieducar.disciplina
$disciplina = array('cod_disciplina', 'ref_usuario_exc', 'ref_usuario_cad', 'desc_disciplina', 'desc_resumida', 'abreviatura', 'carga_horaria', 'apura_falta', 'data_cadastro', 'data_exclusao', 'ativo', 'nm_disciplina', 'ref_cod_curso', );

$disciplina = array(
'cod_disciplina',     // Tipo: int4 Valor Padr�o: nextval('disciplina_cod_disciplina_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'desc_disciplina',     // Tipo: text Valor Padr�o:  Tamanho: -1
'desc_resumida',     // Tipo: text Valor Padr�o:  Tamanho: -1
'abreviatura',     // Tipo: varchar Valor Padr�o:  Tamanho: 15
'carga_horaria',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'apura_falta',     // Tipo: int2 Valor Padr�o: (0)::smallint Tamanho: 2
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'nm_disciplina',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'ref_cod_curso',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);