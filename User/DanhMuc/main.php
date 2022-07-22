<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="CSS/danhmuc1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Roboto+Mono:wght@100&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div class="main-dm">
    <?php if(is_array($dm)){
        extract($dm);
    } ?>
    <div class="banner-dm" style="background:url('upload/<?=$banner2?>')">
    </div>
    <div class="title-dm">
        <h5><a href="">Home</a> <span style="color:dodgerblue; font-size:22px">+</span><a href=""> <?=$nameDMTT?></a><h5> <div class="border-fr"></div>
        <h1><?=$nameDMTT?></h1>
        <?=$gioiThieu?>
    </div>
    
</div>
<div class="content-dm">
    <h1>CÓ THỂ BẠN CHƯA BIẾT ?<h1>
    <div class="content-1">
        <?php foreach ($loadthree_cungloai as $threeloai) {
           extract($threeloai);
           $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
        ?>
        <div class="item-content-1">
        <p><a href="<?=$linkbvchitiet?>"><img id="img-item" src="upload/<?=$hinhAnh?>"></a></p>
            <div class="content-item">
            <h4><a href="">ALL-INCLUSIVE VACATIONS</a></h4>
            <a href="<?=$linkbvchitiet?>"><?=$tieuDe?></a>
            <p><a href="<?=$linkbvchitiet?>"><i class="fa fa-bars" aria-hidden="true"></i> READ</a><p>
            </div>
        </div>
        <?php } ?>
        
</div>
</div>
<!-- Main-2 -->
<div class="content-dm1">
    <h1>TOP 5<h1>

    <div class="content-2">
        <?php foreach ($loadone_top51 as $loadone1) {
           extract($loadone1);
           $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
        ?>
        <div class="item-content-right">
            <p><a href="<?=$linkbvchitiet?>"><img id="img-right" src="upload/<?=$hinhAnh?>"></a></p>
            <div class="content-right">
            <a href=""><h4>ALL-INCLUSIVE VACATIONS </h4></a>
            <a href="<?=$linkbvchitiet?>"><?php echo"<td>".substr($loadone1['tieuDe'], 0 ,90,)." </td>";?></a>
            <p><a href="<?=$linkbvchitiet?>"><i class="fa fa-bars" aria-hidden="true"></i> READ</a><p>
            </div>
        <?php } ?>
        </div>
        <?php foreach ($loadone_top52 as $loadone2) {
           extract($loadone2);
           $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
        ?>
        <div class="item-content-left">
        <p><a href="<?=$linkbvchitiet?>"><img id="img-left" src="upload/<?=$hinhAnh?>"></a></p>
            <div class="content-left">
            <a href=""><h4>ALL-INCLUSIVE VACATIONS </h4></a>
            <a href="<?=$linkbvchitiet?>"><?php echo"<td>".substr($loadone2['tieuDe'], 0 ,120,)." </td>";?></a>
            <p><a href="<?=$linkbvchitiet?>"><i class="fa fa-bars" aria-hidden="true"></i> READ</a><p>
            </div>
        </div>
        <?php } ?>
</div>

    <div class="content-1">
        <?php foreach ($loadthree_top5 as $loadthree) {
           extract($loadthree);
           $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
        ?>
        <div class="item-content-1">
        <p><a href="<?=$linkbvchitiet?>"><img id="img-item" src="upload/<?=$hinhAnh?>"></a></p>
            <div class="content-item">
            <h4><a href="">ALL-INCLUSIVE VACATIONS</a></h4>
            <a href="<?=$linkbvchitiet?>"><?php echo"<td>".substr($loadthree['tieuDe'], 0 ,142,)." </td>";?></a>
            <p><a href="<?=$linkbvchitiet?>"><i class="fa fa-bars" aria-hidden="true"></i> READ</a><p>
            </div>
        </div>
        <?php } ?>
</div>
</div>
    <!--end-2  -->
    <!-- main-3 -->
    <div class="content-dm1">
    <h1>GỢI NHỚ CHÚT NÀO <h1>
    <div class="content-2">
        <?php foreach ($loadone_goinho1 as $goinho1) {
            extract($goinho1);
            $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
        ?>
        <div class="content-end-left">
        <p><a href="<?=$linkbvchitiet?>"><img id="img-end" src="upload/<?=$hinhAnh?>"></a></p>
        </div>
        <div class="content-end-right">
        <?php echo"<td>".substr($goinho1['tomTat'], 0 ,400,)." </td>";?>
         <div class="learnmore"><a href="<?=$linkbvchitiet?>">Learn more</a></div>
        </div>
        <?php } ?>
</div><br>
        <div class="content-2">
        <?php foreach ($loadone_goinho2 as $goinho2) {
            extract($goinho2);
            $linkbvchitiet = "index.php?view=baivietchitiet&id_bai=".$id_bai;
        ?>
        <div class="content-end-left2">
        <?php echo"<td>".substr($goinho2['tomTat'], 0 ,400,)." </td>";?>
         <div class="learnmore"><a href="<?=$linkbvchitiet?>">Learn more</a></div>
        </div>
        <div class="content-end-right2">
        <p><a href="<?=$linkbvchitiet?>"><img id="img-end" src="upload/<?=$hinhAnh?>"></a></p>
        </div>
        <?php } ?>
</div>
</div>
</body>
</html>