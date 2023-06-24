<?php
class Bodega extends Conectar{

    
//::::::::::::::ESTE ES PARA POSTGRESQL::::::::::

        /*Esta función realiza una consulta a la base de datos para obtener información de todas las bodegas activas.  */
        public function get_bodega()
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT 
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
                        FROM 
                            tm_bodega 
                        INNER JOIN 
                            tm_encargado ON tm_bodega.enc_id = tm_encargado.enc_id 
                        INNER JOIN 
                            tm_estado ON tm_bodega.est_id = tm_estado.est_id 
                        WHERE 
                            tm_bodega.est = 1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        /**Esta función recibe como parámetro el ID de una bodega y realiza una consulta a la base de datos para obtener la información de dicha bodega.  */
        public function get_bodega_x_id($bod_id)
        {
            if (!empty($bod_id) && is_numeric($bod_id)) {
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "SELECT * FROM tm_bodega WHERE bod_id = :bod_id";
                $sql = $conectar->prepare($sql);
                $sql->bindParam(':bod_id', $bod_id, PDO::PARAM_INT);
                $sql->execute();
                return $resultado = $sql->fetchAll();
            } else {
                return array(); // Retorna un array vacío si el ID de la bodega no es válido
            }
        }

        /**Esta función recibe como parámetro el ID de una bodega y realiza una actualización en la base de datos para cambiar el estado de la bodega a 0 */
        public function delete_bodega($bod_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_bodega
                        SET
                            est = 0,
                            fech_elim = now()
                        WHERE
                            bod_id = :bod_id";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(':bod_id', $bod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        /**Esta función recibe como parámetros los datos necesarios para insertar una nueva bodega en la base de datos.  */
        public function insert_bodega($enc_id, $bod_cod, $bod_nom, $bod_direcc, $bod_dot, $est_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_bodega (bod_id, enc_id, bod_cod, bod_nom, bod_direcc, bod_dot, est_id, fech_crea, fech_modi, fech_elim, est) 
                        VALUES (DEFAULT, :enc_id, :bod_cod, :bod_nom, :bod_direcc, :bod_dot, :est_id, now(), NULL, NULL, 1)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(':enc_id', $enc_id);
            $sql->bindParam(':bod_cod', $bod_cod);
            $sql->bindParam(':bod_nom', $bod_nom);
            $sql->bindParam(':bod_direcc', $bod_direcc);
            $sql->bindParam(':bod_dot', $bod_dot);
            $sql->bindParam(':est_id', $est_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        /**Esta función recibe como parámetros los datos necesarios para actualizar una bodega existente en la base de datos.  */
        public function update_bodega($bod_id, $enc_id, $bod_cod, $bod_nom, $bod_direcc, $bod_dot, $est_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_bodega
                        SET 
                            enc_id = :enc_id,
                            bod_cod = :bod_cod,
                            bod_nom = :bod_nom,
                            bod_direcc = :bod_direcc,
                            bod_dot = :bod_dot,
                            est_id = :est_id,
                            fech_modi = now()
                        WHERE
                            bod_id = :bod_id";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(':enc_id', $enc_id);
            $sql->bindParam(':bod_cod', $bod_cod);
            $sql->bindParam(':bod_nom', $bod_nom);
            $sql->bindParam(':bod_direcc', $bod_direcc);
            $sql->bindParam(':bod_dot', $bod_dot);
            $sql->bindParam(':est_id', $est_id);
            $sql->bindParam(':bod_id', $bod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    //::::::::::::::ESTE ES PARA MYSQL::::::::::
    
    /*public function get_bodega()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
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
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    public function get_bodega_x_id($bod_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_bodega WHERE bod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $bod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    public function delete_bodega($bod_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_bodega
                SET
                    est=0,
                    fech_elim=now()
                WHERE
                    bod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $bod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    public function insert_bodega($enc_id, $bod_cod, $bod_nom, $bod_direcc, $bod_dot, $est_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_bodega ( bod_id, enc_id, bod_cod, bod_nom, bod_direcc, bod_dot, est_id, fech_crea, fech_modi, fech_elim, est) VALUES (NULL, ?, ?, ?, ?, ?, ?, now(), NULL, NULL, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $enc_id);
        $sql->bindValue(2, $bod_cod);
        $sql->bindValue(3, $bod_nom);
        $sql->bindValue(4, $bod_direcc);
        $sql->bindValue(5, $bod_dot);
        $sql->bindValue(6, $est_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    public function update_bodega($bod_id, $enc_id, $bod_cod, $bod_nom, $bod_direcc, $bod_dot, $est_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_bodega
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
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $enc_id);
        $sql->bindValue(2, $bod_cod);
        $sql->bindValue(3, $bod_nom);
        $sql->bindValue(4, $bod_direcc);
        $sql->bindValue(5, $bod_dot);
        $sql->bindValue(6, $est_id);
        $sql->bindValue(7, $bod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    } */
    
}
?>