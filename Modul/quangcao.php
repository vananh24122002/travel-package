<?php
function insert_qc($nameqc,$banner,$layout,$link,$trangthai){
  $sql="insert into quangcao(nameqc,banner,layout,link,trangthai)
  values('$nameqc','$banner','$layout','$link','$trangthai')";
  pdo_execute($sql);
}
function loadall_qc(){
  $sql = "SELECT * FROM quangcao ORDER BY id_qc DESC";
  $loadall_qc = pdo_query($sql);
  return $loadall_qc;
}
function del_qc($id_qc){
  $id_qc = $_GET['id_qc'];
  $sql = "DELETE FROM quangcao WHERE id_qc = '".$id_qc."' ";
  pdo_execute($sql);
}
function load_one_qc($id_qc){
  $id_qc = $_GET['id_qc'];
  $sql = "SELECT * FROM quangcao WHERE id_qc = '".$id_qc."' ";
  $load_one_qc = pdo_query_one($sql);
  return $load_one_qc;
}
function update_qc($id_qc,$nameqc,$banner,$layout,$link,$trangthai){
if($banner!=""){
  $sql = "UPDATE quangcao SET nameqc = '".$nameqc."' , banner = '".$banner."', layout = '".$layout."',
  link = '".$link."' , trangthai = '".$trangthai."' WHERE id_qc= '".$id_qc."' ";
}else{
  $sql = "UPDATE quangcao SET nameqc = '".$nameqc."' ,  layout = '".$layout."',
  link = '".$link."' , trangthai = '".$trangthai."' WHERE id_qc= '".$id_qc."' ";
}
  pdo_execute($sql);
}
function load_qc_home(){
  $sql = "SELECT * FROM quangcao WHERE layout = 1 AND trangthai = 1";
  $load_qc_home = pdo_query_one($sql);
  return $load_qc_home;
}
?>