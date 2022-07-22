<style>
.timthay{
    font-size:1.8vw;
    padding-bottom:2vw;
}
.padding ul li{
    transition:2s;
}
#balls {
  margin-top:-2vw;
  margin-left:16.5vw;
  border: 3px solid hsla(185, 100%, 62%, 0.2);
  border-top-color: #00a99c;
  border-radius: 50%;
  width: 1em;
  height: 1em;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
</style>
<?php
 include("../../Modul/pdo.php");
include('../../Modul/tintuc.php');
 if(isset($_POST['action'])){
    $search = $_POST['search'];
    $search_bv = search_bv($search);
    $output ="";
    echo '<div class="timthay"> Tìm thấy '.count($search_bv).' bài viết <p id="balls">  </p> </div> ';
    foreach ($search_bv as $searchbv){
        extract($searchbv);
        $linkbv = "index.php?view=baivietchitiet&id_bai=".$searchbv['id_bai'];
        $output .='
        <li>
        <div class="content-two-5">
                <a href="'.$linkbv.'"><img id="img-content-two-5" src="upload/'.$searchbv['hinhAnh'].'"></a>
                <div class="title-content-two-5">                          
                    <a href="'.$linkbv.'">'.$searchbv['tieuDe'].'</a>
                </div>
        </div>
         </li>
        ';
    }
    echo $output;
}
?>