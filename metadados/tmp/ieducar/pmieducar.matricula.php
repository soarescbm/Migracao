<?php

// pmieducar.matricula
$matricula = array('cod_matricula', 'ref_cod_reserva_vaga', 'ref_ref_cod_escola', 'ref_ref_cod_serie', 'ref_usuario_exc', 'ref_usuario_cad', 'ref_cod_aluno', 'aprovado', 'data_cadastro', 'data_exclusao', 'ativo', 'ano', 'ultima_matricula', 'modulo', 'descricao_reclassificacao', 'formando', 'matricula_reclassificacao', 'ref_cod_curso', 'matricula_transferencia', 'semestre', );

$matricula = array(
'cod_matricula',     // Tipo: int4 Valor Padrão: nextval('matricula_cod_matricula_seq'::regclass) Tamanho: 4
'ref_cod_reserva_vaga',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_escola',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_ref_cod_serie',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_exc',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_usuario_cad',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ref_cod_aluno',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'aprovado',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'data_cadastro',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'data_exclusao',     // Tipo: timestamp Valor Padrão:  Tamanho: 8
'ativo',     // Tipo: int2 Valor Padrão: (1)::smallint Tamanho: 2
'ano',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'ultima_matricula',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'modulo',     // Tipo: int2 Valor Padrão: 1 Tamanho: 2
'descricao_reclassificacao',     // Tipo: text Valor Padrão:  Tamanho: -1
'formando',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'matricula_reclassificacao',     // Tipo: int2 Valor Padrão: (0)::smallint Tamanho: 2
'ref_cod_curso',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'matricula_transferencia',     // Tipo: bool Valor Padrão: false Tamanho: 1
'semestre',     // Tipo: int2 Valor Padrão:  Tamanho: 2
);