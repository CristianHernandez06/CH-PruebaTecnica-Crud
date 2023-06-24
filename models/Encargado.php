
<?php
    class Encargado extends Conectar{

        /**La función get_encargado() en el modelo de Bodega tiene el propósito de obtener la información de todos los encargados de bodega que tengan un estado activo.  */
        public function get_encargado(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_encargado WHERE est = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>