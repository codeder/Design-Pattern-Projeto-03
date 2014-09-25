<?php

namespace ES\Form\Fields;

use ES\Form\Interfaces\iRender;

class FieldSet implements iRender {

    private $legend;
    private $fields = array();

    function __construct($legend) {
        $this->legend = $legend;
    }

    public function AddFieldSet(iRender $fields) {
        array_push($this->fields, $fields);
        return $this;
    }

    public function render() {

        $html = '<fieldset>';
        $html .= "<legend>{$this->legend}</legend>";

        foreach ($this->fields as $fields) {
            $html .= $fields->Render() . "\n";
        }

        $html .= '</fieldset>';

        return $html;
    }

}
