<?php

namespace UI;


class JavaScript {

	private $_jsfiles = array();
    private $_jscallback = array();

    private $_glueJS = "<script type='text/javascript' src='js/%s.js'></script>";


    public function addScript($filename, $amd = true)
    {
  		if (!isset($this->_jsfiles[$filename])){
			$this->_jsfiles[$filename] = $filename;
		}
    }

   public function addCallback($callback)
    {
        $id = md5($callback);
        if (!isset($this->_jscallback[$id])){
            $this->_jscallback[$id] = $callback;
        }
    } 

    public function make()
    {
        $args = array();
        $return = '';

        $return .= "<script type='text/javascript'>" . PHP_EOL . PHP_EOL . "curl(['js!libs/jquery.js!order','js!libs/bootstrap.js!order','";

        $return .= implode("','",$this->_jsfiles);

        foreach ($this->_jsfiles as $file) {
            if($file == 'jquery') {
                $args[] = '$';
            } else {
                $args[] = preg_replace('/[^a-z]/i', '', $file);
            }
        } 

        $return .= ("','domReady!']," . PHP_EOL);
        $return .= 'function (';
        $return .=  implode(', ', $args);
        $return .= ') { ' . PHP_EOL;
        $return .= implode(PHP_EOL, $this->_jscallback);  
        $return .= PHP_EOL . '});'. PHP_EOL .'</script>' . PHP_EOL;

		return $return;
    }
}