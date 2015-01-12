<?php

namespace UI;


class Css {

	private $_cssfiles = array();

    private $_glueLocalCSS = "<link rel='stylesheet' href='css/%s.css'></link>";
    private $_glueDistantCSS = "<link rel='stylesheet' href='%s'></link>";


    public function add($filename)
    {
  		if (!isset($this->_cssfiles[$filename])){
			$this->_cssfiles[$filename] = $filename;
		}
    }

    public function make()
    {

        $css = $this->_cssfiles;
        array_walk($css, function (&$item, $key) {
            if(substr($item, 0, 4) === 'http') {
                $item = sprintf($this->_glueDistantCSS, $item);
            } else {
                $item = sprintf($this->_glueLocalCSS, $item);
            } 
        });
        return implode($css);

    }
}