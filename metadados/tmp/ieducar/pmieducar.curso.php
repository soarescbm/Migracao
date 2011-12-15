<?php

// pmieducar.curso
$curso = array('cod_curso', 'ref_usuario_cad', 'ref_cod_tipo_regime', 'ref_cod_nivel_ensino', 'ref_cod_tipo_ensino', 'nm_curso', 'sgl_curso', 'qtd_etapas', 'carga_horaria', 'ato_poder_publico', 'objetivo_curso', 'publico_alvo', 'data_cadastro', 'data_exclusao', 'ativo', 'ref_usuario_exc', 'ref_cod_instituicao', 'padrao_ano_escolar', 'hora_falta', );

$curso = array(
'cod_curso',     // Tipo: int4 Valor Padrão: nextval('curso_cod_curso_seq'::regclass) Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_tipo_regime',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_nivel_ensino',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_tipo_ensino',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nm_curso',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'sgl_curso',     // Tipo: varchar Valor Padrão:  Tamanho: 15
'qtd_etapas',     // Tipo: int2 Valor Padrão:  Tamanho: 2
'carga_horaria',     // Tipo: float8 Valor Padrão:  Tamanho: 8
'ato_poder_publico',     // Tipo: varchar Valor Padrão:  Tamanho: 255
'objetivo_curso',     // Tipo: text Valor Padrão:  Tamanho: -1
'publico_alvo',     // Tipo: text Valor Padrão:  Tamanho: -1
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_instituicao',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'padrao_ano_escolar',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'hora_falta',     // Tipo: float8 Valor Padrão: 0.00 Tamanho: 8
);