<?php

    class Proveedores extends Conectar{

        public function get_socios(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE  estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function get_socio($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

       public function insert_socio($nombre, $razonsocial, $direccion, $contacto, $email, $telefono){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_socios_negocio(id, nombre, razon_social, direccion, tipo_socio, contacto, email, fecha_creado, estado, telefono)
            VALUES (NULL,?,?,?,'1',?,?,sysdate(),'1',?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razonsocial);
            $sql->bindValue(3, $direccion);
            $sql->bindValue(4, $contacto);
            $sql->bindValue(5, $email);
            $sql->bindValue(6, $telefono);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function delete_socio($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_socios_negocio WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function Actualizar_socio($nombre, $razonsocial, $direccion, $contacto, $email, $telefono, $id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_socios_negocio SET nombre = ?, razon_social = ?, direccion = ?, tipo_socio = '1', contacto = ?, email = ?, fecha_creado = sysdate(), estado = '1', telefono = ?
           WHERE id = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razonsocial);
            $sql->bindValue(3, $direccion);
            $sql->bindValue(4, $contacto);
            $sql->bindValue(5, $email);
            $sql->bindValue(6, $telefono);
            $sql->bindValue(7, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

    
    }

?>
