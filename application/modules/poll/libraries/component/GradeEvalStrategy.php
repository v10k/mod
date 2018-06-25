<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'EvalStrategy.php';

class GradeEvalStrategy implements EvalStrategy{

    private $id;
    private $val;

    public function __construct($id, $val = 0){
        $this->val = $val;
        $this->id = $id;
    }

    public function getHTML(){
        return '
        <p>Nota: <span id="display_'.$this->id.'"></span></p>
        <div class="row">
            <div class="col-md-12">
                <div class="slidecontainer">
                    <input type="range" min="0" max="10" name="grade['.$this->id.']" value="'.
                    $this->val.'" class="slider" id="eval_'.$this->id.'">
                </div>
            </div>
        </div>';
    }

}