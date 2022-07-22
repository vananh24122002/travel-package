<?php
function insert_titleday($id_Tour,$muc1,$muc2,$muc3,$muc4,$muc5,$muc6,$muc7){
    $sql="insert into titleday(id_Tour,muc1,muc2,muc3,muc4,muc5,muc6,muc7)
     values('$id_Tour','$muc1','$muc2','$muc3','$muc4','$muc5','$muc6','$muc7')";
    pdo_execute($sql);
  }
function loadall_titleday($key,$id_Tour){
    $sql = "SELECT * FROM titleday WHERE 1 ";
    if($key!=""){
        $sql .= " AND muc1 like '%".$key."%' OR muc2 like '%".$key."%' OR muc3 like '%".$key."%' OR muc4 like '%".$key."%' OR
        muc5 like '%".$key."%' OR muc6 like '%".$key."%' OR muc7 like '%".$key."%'";
    }
    if($id_Tour>0){
        $sql .= " AND id_Tour = '".$id_Tour."' ";
    }
    $sql.=" ORDER BY id_titleday DESC";
    $titleday = pdo_query($sql);
    return $titleday;
}
function del_titleday($id_titleday){
    $sql="DELETE FROM titleday WHERE id_titleday=".$id_titleday;
    pdo_execute($sql);
}
function sua_titleday($id_titleday){
    $sql="SELECT * FROM titleday WHERE id_titleday=".$id_titleday;
    $suatitleday=pdo_query_one($sql);
    return $suatitleday;
}
function capnhat_titleday($id_titleday,$id_Tour,$muc1,$muc2,$muc3,$muc4,$muc5,$muc6,$muc7){
    $sql = "UPDATE titleday SET id_Tour='".$id_Tour."',muc1='".$muc1."',muc2='".$muc2."',muc3='".$muc3."',
    muc4='".$muc4."',muc5='".$muc5."',muc6='".$muc6."',muc7='".$muc7."'WHERE id_titleday =".$id_titleday;
    pdo_execute($sql);
}
?>