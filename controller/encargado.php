<!-- /* llamada a las clases necesarias */ -->
<?php
    require_once("../config/conexion.php");
    require_once("../models/Encargado.php");
    $encargado = new Encargado();

    switch($_GET["op"]){

        // TODO:CONTROLADOR PARA CREAR EL COMBOBOX
        case "combo":
            $datos=$encargado->get_encargado();
            if (is_array($datos)==true and count($datos)>0){              
                $html = "<option label='Seleccione'></option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["enc_id"]."'>".$row["enc_nom"]."</option>";
                }
                echo $html;
            }

        break;

    }
?>
