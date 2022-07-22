<?php
// load bình luận theo bài viết
function loadall_blnews($id_bai){
    $sql=" SELECT * FROM binhluan_news WHERE id_bai = ? order by id_bl desc limit 5 ";
    $loadblnews =pdo_query($sql,$id_bai);
    return $loadblnews;
  }
  //thêm bình luận
  function insert_blnews($id_bai,$username,$binhluan_news){
    $sql="insert into binhluan_news(id_bai,username,binhluan_news) values('$id_bai','$username','$binhluan_news')";
    pdo_execute($sql);
  }
//load bình luận all
function loadbl_bv(){
  $sql=" SELECT binhluan_news.id_bai as id_bai , baiviet.tieuDe as tieude , baiviet.hinhAnh as hinhanh , COUNT(binhluan_news.id_bl) as soluong
  FROM binhluan_news left join baiviet ON baiviet.id_bai = binhluan_news.id_bai GROUP BY baiviet.id_bai  ORDER BY baiviet.id_bai ASC  ";
  $loadbl_bv =pdo_query($sql);
  return $loadbl_bv;
}
//tim id bai
function load_idbai($id_bai){
  $id_bai = $_GET['id_bai'];
  $sql=" SELECT * FROM binhluan_news WHERE id_bai = ?";
  $load_idbai =pdo_query_one($sql,$id_bai);
  return $load_idbai;
}
//load bình luận chi tiết
function loadbl_chitiet($id_bai){
  $sql = "SELECT * FROM binhluan_news , taikhoan WHERE binhluan_news.username = taikhoan.username  AND binhluan_news.id_bai = ?
  GROUP BY binhluan_news.id_bl  ";
  $loadbl_chitiet =pdo_query($sql,$id_bai);
  return $loadbl_chitiet;
}
//xóa bình luận
function del_cmt($id_bl){
  $sql="DELETE FROM binhluan_news WHERE id_bl=?";
  pdo_execute($sql,$id_bl);
}
// xóa toàn bộ bình luận
function del_all_cmt($id_bai){
  $sql="DELETE  FROM binhluan_news  WHERE  id_bai=? ";
  pdo_execute($sql,$id_bai);
}
//reply bình luận
function insert_replynews($username,$reply,$id_bl,$id_bv){
  $sql="insert into reply_news (username,reply,id_bl,id_bv) values('$username','$reply','$id_bl','$id_bv')";
  pdo_execute($sql);
}
//load bình luận reply
function load_reply($id_bl,$id_bai){
  $sql = "SELECT * FROM reply_news , taikhoan WHERE reply_news.username = taikhoan.username AND reply_news.id_bl = ?   AND reply_news.id_bv = ?  
   ";
  $load_reply =pdo_query($sql,$id_bl,$id_bai);
  return $load_reply;
}
//xóa bình luận reply
function del_cmt_reply($id_reply){
  $sql="DELETE FROM reply_news WHERE id_reply = ?   ";
  pdo_execute($sql,$id_reply);
}
function del_reply_cmt($id_reply){
  $sql="DELETE FROM reply_news WHERE id_reply=?";
  pdo_execute($sql,$id_reply);
}
?>