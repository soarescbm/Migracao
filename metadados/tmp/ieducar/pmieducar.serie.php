<?php

// pmieducar.serie
$serie = array('cod_serie', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_curso', 'nm_serie', 'etapa_curso', 'concluinte', 'carga_horaria', 'data_cadastro', 'data_exclusao', 'ativo', 'intervalo', 'idade_inicial', 'idade_final', 'regra_avaliacao_id', );

$serie = array(
'cod_serie',     // Tipo: int4 Valor Padr�o: nextval('serie_cod_serie_seq'::regclass) Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'ref_cod_curso',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'nm_serie',     // Tipo: varchar Valor Padr�o:  Tamanho: 255
'etapa_curso',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'concluinte',     // Tipo: int2 Valor Padr�o: (0)::smallint Tamanho: 2
'carga_horaria',     // Tipo: float8 Valor Padr�o:  Tamanho: 8
'data_cadastro',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padr�o:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padr�o: (1)::smallint Tamanho: 2
'intervalo',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
'idade_inicial',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'idade_final',     // Tipo: numeric Valor Padr�o:  Tamanho: -1
'regra_avaliacao_id',     // Tipo: int4 Valor Padr�o:  Tamanho: 4
);