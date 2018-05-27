<?php

    class ManejadorBD 
    {
        private $_PDO;
        /* hacer objetos stdclas para lo de la base de datos y moverlos por jsons  */

        public function __construct()
        {
            try
            {
                //Modificar la Base de Datos
                $this->_PDO=new PDO('mysql:host=localhost;dbname=parcial1;charset=utf8', "root", "");
            }
            catch (PDOException $e) 
            {
                print "Error!!!<br/>" . $e->getMessage();
                die();
            }

        }


        public function Preparar($sql)
        {
            return $this->_PDO->prepare($sql);
        }

        private function JsonStdClass($strjson,$consulta)
        {
            $json=json_decode($strjson);
            $consulta->bindValue(':nombre', $json->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $json->precio, PDO::PARAM_INT);
            $consulta->bindValue(':cantidad', $json->cantidad, PDO::PARAM_STR);
            $consulta->bindValue(':genero', $json->genero, PDO::PARAM_STR);
            $consulta->bindValue(':path', $json->path, PDO::PARAM_STR); 
                    

        }


        public function TreaerTodo()
        {
            $consulta=$this->Preparar("SELECT id, precio, cantidad,nombre,genero,path from videojuegos");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_INTO, new Elementos\Videojuegos);
            return $consulta;
        }

        public function Insertar($strjson)
        {

            $consulta=$this->Preparar("INSERT INTO `videojuegos`(`nombre`, `precio`, `cantidad`, `path`, `genero`) VALUES (:nombre,:precio,:cantidad,:genero,:path)");
            $this->JsonStdClass($strjson,$consulta);
            $consulta->execute();
        }

        public function TraerPorId($id)
        {
            $consulta=$this->Preparar("SELECT * from videojuegos WHERE id=".$id);
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_INTO, new Elementos\Videojuegos);
            return $consulta;
        }

        public function TreaerPorNombre($nombre)
        {
            $consulta=$this->Preparar("SELECT * from videojuegos WHERE nombre = '$nombre'");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_INTO, new Elementos\Videojuegos);
            return $consulta;
        }

        public function TreaerPorPrecioMayor($precio)
        {
            $consulta=$this->Preparar("SELECT * from videojuegos WHERE precio>=$precio");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_INTO, new Elementos\Videojuegos);
            return $consulta;
        }

        public function TreaerPorPrecioMenor($precio)
        {
            $consulta=$this->Preparar("SELECT * from videojuegos WHERE precio<=$precio");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_INTO, new Elementos\Videojuegos);
            return $consulta;
        }


        public function Eliminar($id)
        {
            $consulta=$this->Preparar("DELETE FROM videojuegos WHERE id = ".$id);
            
            $consulta->execute();
        }

        public function Modificar($strjson)
        {
            $json=json_decode($strjson);
            $consulta=$this->Preparar("UPDATE videojuegos SET nombre=:nombre, precio=:precio,cantidad=:cantidad,genero=:genero,path=:path WHERE id=:id");
            
            $consulta->bindValue(':id', $json->id, PDO::PARAM_INT); 
            $this->JsonStdClass($strjson,$consulta);
            return $consulta->execute();

        }



        public function IdNueva()
        {
            $variables=$this->TreaerTodo();
            $idMax=0;
            foreach ($variables as $key) 
            {
                if($key->id>$idMax)
                {
                    $idMax=$key->id;
                }
            }
            return $idMax;
        }

        
    }







?>