
<?php
    class Encargado extends Conectar{

        
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