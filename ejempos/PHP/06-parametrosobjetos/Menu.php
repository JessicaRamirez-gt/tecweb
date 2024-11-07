<?php
class Menu{
    private $opciones = NULL;
    private $direccion;

    public FUNCTION __construct($dir){
        $this->opciones = array();
        $this->direccion = $dir;        
    }

    public FUNCTION insertar_opcion($op){
        $this->opciones[] = $op;
    }

    public FUNCTION graficar_horizontal(){
        for ($i=0;$i<count($this->opciones);$i++){
            //SE INVOCA A METODO DEL OBJETO CONTENIDO EN LA POSICION $I
            $this->opciones[$i]->graficar();
            echo '-';
        }
    }


    public FUNCTION graficar_vertical(){
        for ($i=0;$i<count($this->opciones);$i++){
            //SE INVOCA A METODO DEL OBJETO CONTENIDO EN LA POSICION $I
            $this->opciones[$i]->graficar();
            echo '<br>';
        }
    }    

    public function graficar(){
        if ($this->direccion === 'horizontal'){//triple igual es para que sea EXACTAMENTE IGUAL
            $this->graficar_horizontal();
        }else{
            $this->graficar_vertical();
        }
    }
}

?>