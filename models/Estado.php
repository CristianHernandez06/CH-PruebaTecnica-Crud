
<?php
    class Estado extends Conectar{

        /**La función get_estado() en el modelo de Bodega tiene el propósito de obtener la información de todos los estados disponibles.
         * en este caso tenemos ACTIVADO - DESACTIVADA
         */
        public function get_estado(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_estado";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>