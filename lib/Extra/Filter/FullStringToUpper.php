<?php


class Extra_Filter_FullStringToUpper implements Zend_Filter_Interface {
    
    protected static $_caracter = array(
      "à" => "À",
      "á" => "Á",
      "é" => "É",
      "í" => "Í",
      "ó" => "Ó",
      "ú" => "Ú",
      "â" => "Â",
      "ê" => "Ê",
      "ô" => "Ô",
      "ü" => "Ü",
      "ã" => "Ã",
      "?" => "?",
      "õ" => "Õ",      
      "ç" => "Ç"
    );
    public function filter($value) {
        return strtr(strtoupper($value), self::$_caracter); 
    }
    
}


