
<?php

include('datosconexion.php');
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                // MYSQL
                //$conectar = $this->dbh = new PDO("mysql:local=localhost:90;dbname=crud_ch","root","");

                // POSTGRESQL
                $conectar = $this->dbh = new PDO("pgsql:host=".SERVER.";port=5432;dbname=".DBNAME, USER, PASSWORD);
                return $conectar;
            }catch(Exception $e){
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
        }

    }
?>