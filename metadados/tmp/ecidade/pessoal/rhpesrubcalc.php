<?php

// rhpesrubcalc - transporta para o proximo mes as rubricas
gravadas no rhpesrubcalc ( arredondamento e insuficiencia de saldo)

tabela que gravará se o funcionário teve insuficiência de saldo no mês                          e/ou arredondamento.

$rhpesrubcalc = array(
'rh65_seqpes' => '',  // seqpes - tipo: int4                                    
'rh65_rubric' => '',  // rubrica - tipo: char(4)                                 
'rh65_valor' => '',  // valor - tipo: float8                                  
'rh65_sequencia' => '',  // sequencia - tipo: int4                                    
);