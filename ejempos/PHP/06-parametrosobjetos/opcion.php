<?php
class Opcion{
    private $titulo;
    private $enlace;
    private $colorfondo;

    public FUNCTION __construct($title, $link, $bcolor){
        $this->titulo = $title;
        $this->enlace = $link;
        $this->colorfondo = $bcolor;
    }

    public function graficar(){
        $estilo = 'background-color:'.$this->colorfondo;
        echo '<a style ="'.$estilo.'" href= "'.$this->enlace.'">'
        .$this->titulo.'</a>';
    }
}
?>