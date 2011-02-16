<?php

class StringUtil {

    private $str;
    
    public function __construct($str = "") {
        $this->str = $str;
    }
    
    public function __toString() {
        return $this->str;
    }
    
    public function length() {
        return strlen($this->str);
    }
    
    public function equals($instr) {
        return ($this->str == $instr);
    }
    
    public function contains($instr) {
        $pos = strpos($this->str, $instr);
        if ($pos !== false) {
            return true;
        } 
        return false;
    }

    public function startsWith($instr) {
        $pos = strpos($this->str, $instr);
        if($pos == 0) {
            return true;
        }
        return false;
    }
    
    function endsWith($instr)
    {
        // Get the length of the end string
        $len = strlen($instr);
        // Look at the end of $this->str for the substring the size of $instr
        $tmp = substr($this->str, strlen($this->str) - $len);
        // If it matches, it does end with $instr
        return $tmp == $instr;
    }
    
    function prepend($str) {
        $this->str = $str . $this->str;
    }
    
    function append($str) {
        $this->str .= $str;
    }
    
    public function toSlug() {
        $slug = strtolower(trim($this->str));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', "-", $slug);
        return $slug;
    }
    
    public function toArray() {
        $charArray = array();
        $len = strlen($this->str);
        for($i = 0; $i < $len; $i++) {
            $charArray[$i] = $this->str[$i];
        }
        return $charArray;
    }

    ///////////////////////////////////////////
    // Static utility methods
    
    public static function camelToDash($str) {
        $str[0] = strtolower($str[0]);

        return preg_replace_callback('/([A-Z])/', create_function('$c', 'return "-" . strtolower($c[1]);'), $str);
    }

    public static function dashToCamel($str, $capitalise_first_char = false) {
        if($capitalise_first_char) {
            $str[0] = strtoupper($str[0]);
        }

        return preg_replace_callback('/-([a-z])/', create_function('$c', 'return strtoupper($c[1]);'), $str);
    }


}