
<?php
    require_once("../config/conexion.php");
    require_once("../models/Estado.php");
    $estado = new Estado();

    switch($_GET["op"]){
        /**el case "combo" del controlador genera dinámicamente un HTML select con opciones de estados utilizando los datos obtenidos del método get_estado(). */
        case "combo":
            $datos=$estado->get_estado();
            if (is_array($datos)==true and count($datos)>0){              
                $html = "<option label='Seleccione'></option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["est_id"]."'>".$row["est_nom"]."</option>";
                }
                echo $html;
            }

        break;

    }
?>
