<?php

class Pedidos extends Conectar{


    public function get_pedidos(){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_pedidos WHERE ESTADO IN('P','F','A') ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    
    } 

    public function get_pedido($ID_ma_pedidos){
        $conectar=parent ::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_pedidos WHERE ESTADO IN ('P','F','A') AND ID_ma_pedidos=?"; 
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $ID_ma_pedidos); 
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
   
       }


public function insert_pedido($Fecha_pedido,$Sub_Total,$Total_ISV,$Total,$Fecha_Entrega,$Estado,$Detalle,$ID){
    $conectar=parent ::conexion();
    parent::set_names();
    $sql="INSERT INTO ma_pedidos(ID_ma_pedidos,FECHA_PEDIDO,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_ENTREGA,ESTADO,DETALLE,ID)
    VALUES (NULL,?,?,?,?,?,?,?,?); ";

    $sql=$conectar-> prepare($sql);

   
    $sql->bindValue(1,$Fecha_pedido);
    $sql->bindValue(2,$Sub_Total);
    $sql->bindValue(3,$Total_ISV);
    $sql->bindValue(4,$Total);
    $sql->bindValue(5,$Fecha_Entrega);
    $sql->bindValue(6,$Estado);
    $sql->bindValue(7,$Detalle);
    $sql->bindValue(8,$ID);
    $sql->execute();
     return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


} 


public function delete_pedido($ID_ma_pedidos){
    $conectar=parent ::conexion();
    parent::set_names();
    $sql="DELETE FROM ma_pedidos WHERE ID_ma_pedidos=?"; 
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$ID_ma_pedidos); 
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

   }

   
   public function update_pedido( $ID_ma_pedidos, $Fecha_pedido,$Sub_Total,$Total_ISV,$Total,$Fecha_Entrega,$Estado,$Detalle,$ID){
    $conectar=parent::conexion();
    parent::set_names();
    $sql="UPDATE ma_pedidos SET FECHA_PEDIDO=?,SUB_TOTAL=?,TOTAL_ISV=?,TOTAL=?,FECHA_ENTREGA=?,ESTADO='P',DETALLE=?,ID=?
    WHERE ID_ma_pedidos=?;";

    $sql=$conectar-> prepare($sql);
    
    
    $sql->bindValue(1,$ID_ma_pedidos);
    $sql->bindValue(2,$Fecha_pedido);
    $sql->bindValue(3,$Sub_Total);
    $sql->bindValue(4,$Total_ISV);
    $sql->bindValue(5,$Total);
    $sql->bindValue(6,$Fecha_Entrega);
    $sql->bindValue(7,$Estado);
    $sql->bindValue(8,$Detalle);
    $sql->bindValue(9,$ID);
    $sql->execute();
     return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


} 




} 

?>







