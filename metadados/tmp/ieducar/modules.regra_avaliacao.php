<?php

// modules.regra_avaliacao
$regra_avaliacao = array('id', 'instituicao_id', 'formula_media_id', 'formula_recuperacao_id', 'tabela_arredondamento_id', 'nome', 'tipo_nota', 'tipo_progressao', 'media', 'porcentagem_presenca', 'parecer_descritivo', 'tipo_presenca', );

$regra_avaliacao = array(
'id',     // Tipo: int4 Valor Padrão: nextval('regra_avaliacao_id_seq'::regclass) Tamanho: 4
'instituicao_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'formula_media_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'formula_recuperacao_id',     // Tipo: int4 Valor Padrão: 0 Tamanho: 4
'tabela_arredondamento_id',     // Tipo: int4 Valor Padrão:  Tamanho: 4
'nome',     // Tipo: varchar Valor Padrão:  Tamanho: 50
'tipo_nota',     // Tipo: int2 Valor Padrão:  Tamanho: 2
'tipo_progressao',     // Tipo: int2 Valor Padrão:  Tamanho: 2
'media',     // Tipo: numeric Valor Padrão: 0.000 Tamanho: -1
'porcentagem_presenca',     // Tipo: numeric Valor Padrão: 0.000 Tamanho: -1
'parecer_descritivo',     // Tipo: int2 Valor Padrão: 0 Tamanho: 2
'tipo_presenca',     // Tipo: int2 Valor Padrão:  Tamanho: 2
);