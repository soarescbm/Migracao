<?php


class Extra_Filter_FullStringToUpper implements Zend_Filter_Interface {
    
    protected static $_caracter = array(
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "�" => "�",
      "?" => "?",
      "�" => "�",      
      "�" => "�"
    );
    public function filter($value) {
        return strtr(strtoupper($value), self::$_caracter); 
    }
    
}


