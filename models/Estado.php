<!-- TODO:EL MODELO DE ESTADO , PARA CREAR EL COMBOBOX -->
<?php
    class Estado extends Conectar{

        
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