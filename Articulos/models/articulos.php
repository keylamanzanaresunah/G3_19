<?php
    class articulos extends Conectar {

        public  function get_Articulos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_articulos WHERE ESTADO IN ('A')";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function get_Articulo($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_articulos WHERE ESTADO IN ('A') AND ID_ma_articulos=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function insert_articulo($DESCRIPCION,$UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV,$ESTADO,$ID){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_articulos(ID_ma_articulos,DESCRIPCION,UNIDAD,COSTO,PRECIO,APLICA_ISV,PORCENTAJE_ISV,ESTADO,ID)
            VALUES (NULL,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$DESCRIPCION);
            $sql->bindValue(2,$UNIDAD);
            $sql->bindValue(3,$COSTO);
            $sql->bindValue(4,$PRECIO);
            $sql->bindValue(5,$APLICA_ISV);
            $sql->bindValue(6,$PORCENTAJE_ISV);
            $sql->bindValue(7,$ESTADO);
            $sql->bindValue(8,$ID);        
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function update_articulo($DESCRIPCION,$UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV,$ESTADO,$ID,$ID_ma_articulos){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_articulos SET DESCRIPCION=?,UNIDAD=?,COSTO=?,PRECIO=?,APLICA_ISV=?,PORCENTAJE_ISV=?,ESTADO='A',ID=?          
            WHERE ID_ma_articulos=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$DESCRIPCION);
            $sql->bindValue(2,$UNIDAD);
            $sql->bindValue(3,$COSTO);
            $sql->bindValue(4,$PRECIO);
            $sql->bindValue(5,$APLICA_ISV);
            $sql->bindValue(6,$PORCENTAJE_ISV);
            $sql->bindValue(7,$ESTADO);
            $sql->bindValue(8,$ID);   
            $sql->bindValue(9,$ID_ma_articulos);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function Delete_articulo($ID_ma_articulos){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="DELETE FROM ma_articulos WHERE ID_ma_articulos=?";              
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID_ma_articulos);
        $sql->execute();
        return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
    }
    
?>