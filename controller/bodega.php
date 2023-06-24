
<?php
    require_once("../config/conexion.php");
    require_once("../models/Bodega.php");
    $bodega = new Bodega();

    switch($_GET["op"]){

        /**Obtener información de todas las bodegas y formatear la respuesta en formato JSON para mostrarla al cliente. */
        case "listar":
            $datos=$bodega->get_bodega();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["enc_nom"];
                $sub_array[] = $row["bod_cod"];
                $sub_array[] = $row["bod_nom"];
                $sub_array[] = $row["bod_direcc"];
                $sub_array[] = $row["bod_dot"];
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                if ($row["est_id"]=="1"){
                    $sub_array[] = '<span class="btn btn-success pd-x-30 pd-y-5">Activado</span>';
                }else{
                    $sub_array[] = '<span class="btn btn-danger pd-y-5">Desactivada</span><a>';
                }
                $sub_array[] = '<button type="button" onClick="editar('.$row["bod_id"].');"  id="'.$row["bod_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["bod_id"].');"  id="'.$row["bod_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[]=$sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

        break;
        /**Guardar o editar una bodega en la base de datos, según si existe o no un ID de bodega en $_POST["bod_id"]. */               
        case "guardaryeditar":
            $datos=$bodega->get_bodega_x_id($_POST["bod_id"]);
            if(empty($_POST["bod_id"])){
                if(is_array($datos)==true and count($datos)==0){
                    $bodega->insert_bodega($_POST["enc_id"],$_POST["bod_cod"],$_POST["bod_nom"],$_POST["bod_direcc"],$_POST["bod_dot"],$_POST["est_id"]);
                }
            }else{
                $bodega->update_bodega($_POST["bod_id"],$_POST["enc_id"],$_POST["bod_cod"],$_POST["bod_nom"],$_POST["bod_direcc"],$_POST["bod_dot"],$_POST["est_id"]);
            }
        break;
        /**Obtener información de una bodega específica y enviarla como respuesta JSON al cliente. */        
        case "mostrar":
            $datos=$bodega->get_bodega_x_id($_POST["bod_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["bod_id"] = $row["bod_id"];
                    $output["enc_id"] = $row["enc_id"];
                    $output["bod_cod"] = $row["bod_cod"];
                    $output["bod_nom"] = $row["bod_nom"];
                    $output["bod_direcc"] = $row["bod_direcc"];
                    $output["bod_dot"] = $row["bod_dot"];
                    $output["est_id"] = $row["est_id"];
                }
                echo json_encode($output);
            }
        break;
        /**Eliminar una bodega específica de la base de datos a travez de su id. */       
        case "eliminar":
            $bodega->delete_bodega($_POST["bod_id"]);
        break;

    }
?>
