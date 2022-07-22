<div class="main-one">
            <h1>Câu chuyện mới nhất</h1>
            <h3>Hãy đăng kí quyền truy cập để đọc tin mới nhất từ Travel Package</h3>
        <div class="aside-article"> 
<!-- aside-one -->
            <div class="aside-one">
                <h2>Lựa chọn cho bạn</h2>
                <?php foreach ($fourbv_moi as $fourmoi) {
                  extract($fourmoi);
                  $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
                  if($tinhTrang ==1){
              ?>
            <div class="content-one">
              <p><a href="<?=$linkbvchitiet?>"><img id="aside-img" src="upload/<?=$hinhAnh?>"></a></p>
                <a href="<?=$linkbvchitiet?>" class="title-bv"><?php echo"<td>".substr($fourmoi['tieuDe'], 0 ,135,)." </td>";?></a>
                <div class="dropdown-content-one">
                <img src="upload/<?=$hinhAnh?>" alt="Cinque Terre" width="300" height="200">
              </div>           
                </div>   
                <?php }else{ 

                 }  } ?>     
            </div>      
            
<!-- article-one -->
            <div class="article-one">
                <div class="banner-one">
                    <?php foreach ($onebv_moi as $onemoi) {
                        extract($onemoi);
                        $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
                        if($tinhTrang ==1){
                    ?>
                    <p><a href="<?=$linkbvchitiet?>"><img id="banner-one" src="upload/<?=$hinhAnh?>"></a></p>
                    <a id="danhmuc" href=""><?=$nameDMTT?></a>
                    <a id="title" href="<?=$linkbvchitiet?>"><i><?=$tieuDe?></i></a>
                    <?php }else{ 
                        }  } ?>   
                    <a href="<?=$linkbvchitiet?>" id="doc"><i class="fa fa-bars" aria-hidden="true"></i>  Đọc</a>
                </div>
            </div>
            </div>
        </div>
        <!-- Main2 -->
<!-- aside-two -->
        <?php $load_dmbooktrip = load_dmbooktrip() ?>
        <div class="main-two" style=" background:url('upload/<?=$load_dmbooktrip['banner1']?>')">
            <h1>BOOK TRAVEL</h1>
            <h2>Chuyến đi tiếp theo đang sẵn sàng </h2>
            <h3><?=$load_dmbooktrip['gioiThieu']?></h3>
            <div class="booknow"><a href="index.php?view=danhmuctour">BOOK NOW</a></div><br>
            <div class="aside-article1"> 
               <!--slide  -->
            <script>
                $(document).ready(function(){
                $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
            });

            </script>
            <div class="owl-carousel owl-theme">
                <?php foreach ($loadtourhome as $tourhome) {
                    extract($tourhome);
                    $linkbooktour = "index.php?view=booktour&id_Tour=".$id_Tour;
                    $linkdmtour ="index.php?view=danhmuctour&id_chuyendi=".$id_chuyendi;
                ?>
                <div class="item1">
                  <a href="<?=$linkbooktour?>"><img src="upload/<?=$banner?>"></a>
                  <div class="padding-top">
                  <a href="<?=$linkdmtour?>"class="danhmuc1" ><?=$namechuyendi?></a>
                  <a href="<?=$linkbooktour?>" class="title1"><h4><?=$nameTour?></h4></a>
                  <div class="sevenday"><a href="<?=$linkbooktour?>"><?=$days?> days</a></div>
                </div>
                </div>
                <?php } ?>
            </div>
        </div>
        </div>
<!-- main-4 -->
            <?php $load_dmmonan = load_dmmonan() ?>
            <div class="main-four" style="background:url('upload/<?=$load_dmmonan['banner1']?>')">
                <h2><?=$load_dmmonan['nameDMTT']?></h2>
                <h1>MÓN ĂN NGON TUYỆT</h1>
                <h3><?=$load_dmmonan['gioiThieu']?></h3>
                <div class="readnow"><a href="index.php?view=danhmuc1&id_DMTT=5">Xem thêm thực đơn</a></div><br>
                <div class="aside-article4">   
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/6FW_x888jxc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
    <!-- end4 -->
          <!-- Main 3 -->
          <div class="main-one">
            <h1>Câu chuyện được xem nhiều nhất</h1>
            <h3>Hãy đăng kí quyền truy cập để đọc tin mới nhất từ Travel Package</h3>
        <div class="aside-article3"> 
<!-- article-three -->
            <div class="article-three">
                <?php foreach ($onebv_luotxem as $one_luotxem) {
                  extract($one_luotxem);
                  $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
                  if($tinhTrang ==1){
                ?>
                <div class="banner-three">
                    <p><a href="<?=$linkbvchitiet?>"><img id="banner-three" src="upload/<?=$hinhAnh?>"></a></p>
                    <a id="danhmuc" href=""><?=$nameDMTT?></a>
                    <a id="title" href="<?=$linkbvchitiet?>"><i><?=$tieuDe?></i></a>
                    <a href="<?=$linkbvchitiet?>" id="doc"><i class="fa fa-bars" aria-hidden="true"></i>  Đọc</a>
                </div>
                <?php }else{} } ?>
                <div class="bro-banner-three">
                    <?php foreach ($twobv_luotxem as $two_luotxem) {
                       extract($two_luotxem);
                       $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
                       if($tinhTrang ==1){
                    ?>
                    <div class="bro-left1">
                        <p><a href="<?=$linkbvchitiet?>"><img id="bro-banner-three" src="upload/<?=$hinhAnh?>"></a></p>
                        <a href="<?=$linkbvchitiet?>" id="title1"><h3><?=$tieuDe?></h3></a>
                        <a href="<?=$linkbvchitiet?>" id="content1"><h4><i class="fa fa-book" aria-hidden="true"></i> Xem thêm</h4></a>
                    </div>
                    <?php }else{} } ?>
                </div>
            </div>
<!-- aside-three -->
            <div class="aside-three">
                <h2>HOT NHẤT hôm nay</h2>
                <?php foreach ($fivebv_luotxem as $five_luotxem) {
                   extract($five_luotxem);
                   $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
                   
                ?>
            <div class="content-three">
                <p><a href="<?=$linkbvchitiet?>"><img id="aside-img" src="upload/<?=$hinhAnh?>"></a></p>
                <a href="<?=$linkbvchitiet?>"><?php echo"<td>".substr($five_luotxem['tieuDe'], 0 ,150,)." </td>";?></a> 
                <div class="dropdown-content-three">
                <img src="upload/<?=$hinhAnh?>" alt="Cinque Terre" width="300" height="200">
                </div>         
            </div>
                <?php } ?>
            </div>
            </div>
        </div>
        <!-- Main-5 -->
        <div class="main-five">
            <?php $load_dmchuyendi = load_dmchuyendi() ?>
            <img id="banner5" src="upload/<?=$load_dmchuyendi['banner1']?>">
        <div class="title5">
            <h1><?=$load_dmchuyendi['nameDMTT']?></h1><div class="no-color"></div>
            <h3><?php echo" ".substr($load_dmmonan['gioiThieu'], 0 ,260,)." ";?></h3>
            <div class="continious"><a href="index.php?view=danhmuc1&id_DMTT=6">Tìm hiểu thêm <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div><br>
            <div class="no-color1"></div>
        </div>
            <div class="aside-article5">   
                <ul>
                     <?php foreach ($loadbv_cungloai as $bv_cungloai) {
                        extract($bv_cungloai);   
                        $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;                
                    ?> 
                    <li>
                        <a href="<?=$linkbvchitiet?>"><?=$bv_cungloai['tieuDe']?></a>
                        <div class="dropdown-content">
                        <a href="<?=$linkbvchitiet?>"><img src="upload/<?=$hinhAnh?>" alt="Cinque Terre" width="150" height="100"></a>
                        <div class="desc"><a href="<?=$linkbvchitiet?>"><?=$tieuDe?></a></div>
                        </div>
                    </li>
                    <?php } ?> 
                </ul>
            </div>
        </div>
        <!-- two -5  -->
        <div class="aside-aritcle5-two">
        <?php $load_qc_home = load_qc_home(); ?>
                <div class="quangcao">
                    <a href="<?=$load_qc_home['link']?>"><img id="qc" src="upload/<?=$load_qc_home['banner']?>"></a>
                </div>
            <?php foreach ($loadbv_cungloaip2 as $bv_cungloaip2) {
                        extract($bv_cungloaip2);   
                        $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;                
            ?>     
            <div class="content-two-5">
                    <a href="<?=$linkbvchitiet?>"><img id="img-content-two-5" src="upload/<?=$hinhAnh?>"></a>
                <div class="title-content-two-5">                          
                    <a href="<?=$linkbvchitiet?>"><?=$tieuDe?></a>
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- end-5 -->