<?php
function insert_day($id_Tour,$day1,$day2,$day3,$day4,$day5,$day6,$day7){
    $sql="insert into day(id_Tour,day1,day2,day3,day4,day5,day6,day7)
     values('$id_Tour','$day1','$day2','$day3','$day4','$day5','$day6','$day7')";
    pdo_execute($sql);
  }
function loadall_days($key,$id_Tour){
    $sql = "SELECT * FROM day WHERE 1 ";
    if($key!=""){
        $sql .= " AND day1 like '%".$key."%'  OR day2 like '%".$key."%' OR day3 like '%".$key."%' OR
        day4 like '%".$key."%' OR day5 like '%".$key."%' OR day6 like '%".$key."%' OR day7 like '%".$key."%'";
    }
    if($id_Tour>0){
        $sql .= " AND id_Tour = '".$id_Tour."' ";
    }
    $sql.=" ORDER BY id_Day DESC";
    $day = pdo_query($sql);
    return $day;
}
function del_days($id_Day){
    $sql="DELETE FROM day WHERE id_Day=".$id_Day;
    pdo_execute($sql);
}
function sua_days($id_Day){
    $sql="SELECT * FROM day WHERE id_Day=".$id_Day;
    $suaday=pdo_query_one($sql);
    return $suaday;
}
function capnhat_days($id_Day,$id_Tour,$day1,$day2,$day3,$day4,$day5,$day6,$day7){
    $sql = "UPDATE day SET id_Tour='".$id_Tour."',day1='".$day1."',day2='".$day2."',day3='".$day3."',
    day4='".$day4."',day5='".$day5."',day6='".$day6."',day7='".$day7."'WHERE id_Day =".$id_Day;
    pdo_execute($sql);
}
?>