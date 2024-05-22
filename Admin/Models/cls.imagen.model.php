<?php

class SubirFoto{
    public function guardar($Imagen){
        $destino = '../Public/assets/images/products'. $_FILES["Imagen"]["name"];
        copy($_FILES["Imagen"]["tmp_name"],$destino);
        return '../'.$destino;
    } 
}