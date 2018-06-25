<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JumboComponent{

    private $data;
    private $image_align;
    private $center_text;

    public function __construct(JumboData $data){
        $this->data = $data;
        $this->center_text = $data->center_text ? 'text-center' : '';
        $this->image_align = $data->image_align == 2 ? 'float-right' : ($data->image_align == 1 ? 'float-left' : '');
    }

    public function getHTML(){
        return '<div class="jumbotron '.$this->center_text.'  ">

                    <div class="container">
                        <h1 class="h1-reponsive mb-4 mt-2 blue-text font-bold">'.$this->data->titulo.'</h1>
                        <p class="lead">'.$this->data->conteudo.'</p>
                    </div>

                    <div class="view overlay my-4">
                        <img src="'.$this->data->imagem.'" class="img-fluid mx-auto '.$this->image_align.'" alt="">
                        <a href="#">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                </div>';
    }

}