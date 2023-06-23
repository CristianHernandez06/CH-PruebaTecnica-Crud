<?php
    class Bodega extends Conectar{

        // TODO:Esta función obtiene la información de las bodegas de la base de datos. Realiza una consulta    SQL que recupera datos de las tablas "tm_bodega", "tm_encargado" y "tm_estado", utilizando las cláusulas INNER JOIN para unir las tablas. NO USE PROCEDIMIENTO ALMACENADO PARA VISUALIZAR LAS TABLAS.
        public function get_bodega(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            tm_bodega.bod_id, 
            tm_bodega.enc_id, 
            tm_bodega.bod_cod, 
            tm_bodega.bod_nom, 
            tm_bodega.bod_direcc, 
            tm_bodega.bod_dot, 
            tm_bodega.fech_crea, 
            tm_estado.est_id, 
            tm_estado.est_nom, 
            tm_encargado.enc_nom 
            FROM tm_bodega 
            INNER JOIN tm_encargado on tm_bodega.enc_id=tm_encargado.enc_id 
            INNER JOIN tm_estado on tm_bodega.est_id=tm_estado.est_id 
            WHERE tm_bodega.est = 1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // TODO:Esta función obtiene la información de una bodega específica basada en su ID.
        public function get_bodega_x_id($bod_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_bodega WHERE bod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$bod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // TODO:Esta función elimina una bodega de la base de datos.
        public function delete_bodega($bod_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_bodega
                SET
                    est=0,
                    fech_elim=now()
                WHERE
                    bod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$bod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // TODO:Esta función inserta una nueva bodega en la base de datos. 
        public function insert_bodega($enc_id,$bod_cod,$bod_nom,$bod_direcc,$bod_dot,$est_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_bodega ( bod_id, enc_id, bod_cod, bod_nom, bod_direcc, bod_dot, est_id, fech_crea, fech_modi, fech_elim, est) VALUES (NULL, ?, ?, ?, ?, ?, ?, now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$enc_id);
            $sql->bindValue(2,$bod_cod);
            $sql->bindValue(3,$bod_nom);
            $sql->bindValue(4,$bod_direcc);
            $sql->bindValue(5,$bod_dot);
            $sql->bindValue(6,$est_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        // TODO:Esta función actualiza la información de una bodega existente en la base de datos. 
        public function update_bodega($bod_id,$enc_id,$bod_cod,$bod_nom,$bod_direcc,$bod_dot,$est_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_bodega
                SET 
                    enc_id=?,
                    bod_cod=?,
                    bod_nom=?,
                    bod_direcc=?,
                    bod_dot=?,
                    est_id=?,
                    fech_modi=now()
                WHERE
                    bod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$enc_id);
            $sql->bindValue(2,$bod_cod);
            $sql->bindValue(3,$bod_nom);
            $sql->bindValue(4,$bod_direcc);
            $sql->bindValue(5,$bod_dot);
            $sql->bindValue(6,$est_id);
            $sql->bindValue(7,$bod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }



    }
?>