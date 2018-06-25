<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'EvalStrategy.php';

class VotationCard{

   private $id;
   private $img;
   private $title;
   private $description;
   private $eval_strategy;


   public function __construct($data, EvalStrategy $eval){
      $this->id = $data->id;   
      $this->img = $data->img;   
      $this->title = $data->title;
      $this->description = $data->description;
      $this->eval_strategy = $eval;
   }

   public function getHTML(){
      return '<div class="card mb-4 col-md-5">
      <div class="view overlay">
        <img class="card-img-top" height="250px" src="'.$this->img.'" alt="Card image cap">
      </div>
    
      <div class="card-body">
        <h4 class="card-title">'.$this->title.'</h4>
        <p class="card-text">'.$this->description.'</p>
        '.$this->eval_strategy->getHTML().'</div>
      </div>';
   }
}