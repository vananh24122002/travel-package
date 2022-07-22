<?php
function insert_img($id_Tour,$image1,$image2,$image3,$image4,$image5,$image6,$image7){
    $sql="insert into image(id_Tour,image1,image2,image3,image4,image5,image6,image7)
    values('$id_Tour','$image1','$image2','$image3','$image4','$image5','$image6','$image7')";
   pdo_execute($sql);
}
function loadall_img($key,$id_Tour){
    $sql = "SELECT * FROM image WHERE 1 ";
    if($key!=""){
        $sql .= " AND image1 like '%".$key."%'  OR image2 like '%".$key."%' OR image3 like '%".$key."%' OR
        image4 like '%".$key."%' OR image5 like '%".$key."%' OR image6 like '%".$key."%' OR image7 like '%".$key."%'";
    }
    if($id_Tour>0){
        $sql .= " AND id_Tour = '".$id_Tour."' ";
    }
    $sql.=" ORDER BY id_image DESC";
    $image = pdo_query($sql);
    return $image;
}
function del_img($id_image){
    $sql="DELETE FROM image WHERE id_image=".$id_image;
    pdo_execute($sql);
}
function sua_img($id_image){
    $sql="SELECT * FROM image WHERE id_image=".$id_image;
    $suaimg=pdo_query_one($sql);
    return $suaimg;
}
function capnhat_img($id_image,$id_Tour,$image1,$image2,$image3,$image4,$image5,$image6,$image7){
    $sql = "UPDATE image SET id_Tour='".$id_Tour."',image1='".$image1."',image2='".$image2."',image3='".$image3."',
    image4='".$image4."',image5='".$image5."',image6='".$image6."',image7='".$image7."'WHERE id_image =".$id_image;
    pdo_execute($sql);
}
?>
