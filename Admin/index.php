<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body>
<div class="wrapper">
<div class="article">
<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location:no-info.php');
} 
error_reporting(E_ERROR | E_PARSE);
include("../Modul/pdo.php");
include('nav.php');
include('../Modul/tintucdm.php');
include('../Modul/tintuc.php');
include('../Modul/tourdm.php');
include('../Modul/tourguide.php');
include('../Modul/days.php');
include('../Modul/titleday.php');
include('../Modul/image.php');
include('../Modul/taikhoan.php');
include('../Modul/quangcao.php');
include('../Modul/blnews.php');
include('../Modul/bltour.php');
include('../Modul/hoadondattour.php');
if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch($action){
    // Danh mục bài viết
    case 'listtintucdm'://danh sách
        $count_dmtintuc = count_dmtintuc();
        include('TinTuc/DanhMuc/list.php');
        break;
     case 'addtintucdm'://thêm mới
        include('TinTuc/DanhMuc/add.php');
        break;
    case 'xoatintucdm'://xóa
        include('TinTuc/DanhMuc/list.php');
        break;
    case 'suatintucdm'://sửa
        if(isset($_GET['id_DMTT'])&& $_GET['id_DMTT']>0){
            $dm=sua_dmtintuc($_GET['id_DMTT']);
        }
        include('TinTuc/DanhMuc/update.php');
        break;
    case 'capnhattintucdm'://cập nhật
        $listdmtintuc = loadall_dmtintuc();
        $count_dmtintuc = count_dmtintuc();
        include('TinTuc/DanhMuc/list.php');
        break;
    // Tin tức
    case 'listtintucbv'://danh sách
        if(isset($_POST['searchlist'])){
            $key = $_POST['key'];
            $id_DMTT = $_POST['id_DMTT'];
        }else{
            $key ="" ;
            $id_DMTT = 0 ;
        }
        $tintuc = loadall_tintuc($key,$id_DMTT);
        $count_tintuc = count_tintuc();
        $listdmtintuc = loadall_dmtintuc();
        include("Tintuc/BaiViet/list.php");
        break;
    case 'addtintucbv'://thêm mới
        $listdmtintuc = loadall_dmtintuc();
        include("Tintuc/BaiViet/add.php");
        break;
    case 'xoatintuctt'://xóa
        if(isset($_GET['id_bai'])&&($_GET['id_bai']>0)){
            del_tintuc($_GET['id_bai']);
        }
        $tintuc = loadall_tintuc("",0);
        $count_tintuc = count_tintuc();
        include("Tintuc/BaiViet/list.php");
        break;
    case 'suatintuctt'://sửa
        if(isset($_GET['id_bai'])&&($_GET['id_bai']>0)){
            $suatintuc=sua_tintuc($_GET['id_bai']);
        }
        $listdmtintuc = loadall_dmtintuc();
        include("TinTuc/BaiViet/update.php");
        break;
    case 'capnhattintuctt'://cập nhật
        
        $tintuc = loadall_tintuc("",0);
        $count_tintuc = count_tintuc();
        $listdmtintuc = loadall_dmtintuc();
        include("Tintuc/BaiViet/list.php");
        break;
    //Danh mục tour
    case 'listtourdm'://Danh sách
        $count_tourdm = count_tourdm();
        include('Tour/DanhMuc/list.php');
        break;
    case 'addtourdm'://Thêm mới
        include('Tour/DanhMuc/add.php');
        break;
    case'xoatourdm'://xóa    
        $tourdm=loadall_tourdm();
        $count_tourdm = count_tourdm();
        include('Tour/DanhMuc/list.php');
        break;
    case 'suatourdm'://sửa
        if(isset($_GET['id_DMTour'])&&($_GET['id_DMTour']>0)){
            $sua_tourdm =sua_tourdm($_GET['id_DMTour']);
        }
        $tourdm=loadall_tourdm();
        include('Tour/DanhMuc/update.php');
        break; 
    case 'capnhattourdm'://cập nhật
        
        $tourdm=loadall_tourdm();
        $count_tourdm = count_tourdm();
        include('Tour/DanhMuc/list.php');
        break; 
    //Tour
    case'listtour':
         if(isset($_POST['searchlist'])&&($_POST['searchlist'])){
            $key=$_POST['key'];
            $id_DMTour=$_POST['id_DMTour'];
        }else{
            $key="";
            $id_DMTour=0;
        }
        $tourdm=loadall_tourdm();
        $tourdmhd = loadall_tourdmhd();
        $tourdmcd = loadall_tourdmcd();
        $tourdmcdcd = loadall_tourdmcdcd();
        $tourdmg = loadall_tourdmg();
        $tour = loadall_tour($key,$id_DMTour);
        $count_booktour = count_booktour();
        include('Tour/Tourguide/list.php');
        break;
    case 'addtour'://thêm
        $tourdm=loadall_tourdm();
        $tourdmhd = loadall_tourdmhd();
        $tourdmcd = loadall_tourdmcd();
        $tourdmcdcd = loadall_tourdmcdcd();
        $tourdmg = loadall_tourdmg();
        include('Tour/Tourguide/add.php');
        break;
    case 'xoatour'://xóa
        if(isset($_GET['id_Tour'])&&($_GET['id_Tour']>0)){
            del_tour($_GET['id_Tour']);
        }
        $tour = loadall_tour("",0,0);
        $count_booktour = count_booktour();
        include('Tour/Tourguide/list.php');
        break;
    case 'suatour'://sửa
        if(isset($_GET['id_Tour'])&&($_GET['id_Tour']>0)){
            $suatour=sua_tour($_GET['id_Tour']);
        }
        $tour = loadall_tour("",0,0);
        $tourdm=loadall_tourdm();
        $tourdmhd = loadall_tourdmhd();
        $tourdmcd = loadall_tourdmcd();
        $tourdmcdcd = loadall_tourdmcdcd();
        $tourdmg = loadall_tourdmg();
        include('Tour/Tourguide/update.php');
        break;
    case 'capnhattour'://cập nhật
        $tour = loadall_tour("",0,0);
        $tourdm=loadall_tourdm();
        $tourdmhd = loadall_tourdmhd();
        $tourdmcd = loadall_tourdmcd();
        $tourdmcdcd = loadall_tourdmcdcd();
        $tourdmg = loadall_tourdmg();
        $count_booktour = count_booktour();
        include('Tour/Tourguide/list.php');
        break;
    // Days
    case 'listdays'://danh sách
        if(isset($_POST['searchlist'])&&($_POST['searchlist'])){
            $key = $_POST['key'];
            $id_Tour=$_POST['id_Tour'];
        }else{
            $key ="";
            $id_Tour = 0;
        }
        $day = loadall_days($key,$id_Tour);
        $tour = loadall_tour("",0,0);
        include("Tour/Days/list.php");
        break;
    case 'adddays':// thêm
        if(isset($_POST['themmoi'])){
            $id_Tour = $_POST['id_Tour'];
            $day1 = $_POST['day1'];
            $day2 = $_POST['day2'];
            $day3 = $_POST['day3'];
            $day4 = $_POST['day3'];
            $day5 = $_POST['day5'];
            $day6 = $_POST['day6'];
            $day7 = $_POST['day7'];
            insert_day($id_Tour,$day1,$day2,$day3,$day4,$day5,$day6,$day7);
        }
        
        $tour = loadall_tour("",0,0);
        include("Tour/Days/add.php");
        break;
    case 'xoadays'://xóa
        if(isset($_GET['id_Day'])&&($_GET['id_Day']>0)){
            del_days($_GET['id_Day']);
        }
        $day = loadall_days("",0);
        include('Tour/Days/list.php');
        break;
     case 'suadays'://sửa
        if(isset($_GET['id_Day'])&&($_GET['id_Day']>0)){
            $suaday=sua_days($_GET['id_Day']);
        }
        $tour = loadall_tour("",0,0);
        $day = loadall_days("",0);
        include('Tour/Days/update.php');
        break;
    case'capnhatdays'://cập nhật
        if(isset($_POST['capnhat'])){
            $id_Day = $_POST['id_Day'];
            $id_Tour = $_POST['id_Tour'];
            $day1 = $_POST['day1'];
            $day2 = $_POST['day2'];
            $day3 = $_POST['day3'];
            $day4 = $_POST['day3'];
            $day5 = $_POST['day5'];
            $day6 = $_POST['day6'];
            $day7 = $_POST['day7'];
        capnhat_days($id_Day,$id_Tour,$day1,$day2,$day3,$day4,$day5,$day6,$day7);
        }
        $tour = loadall_tour("",0,0);
        $day = loadall_days("",0);
        include('Tour/Days/list.php');
        break;
    // Titleday
    case 'listtitleday'://danh sách
        if(isset($_POST['searchlist'])&&($_POST['searchlist'])){
            $key = $_POST['key'];
            $id_Tour=$_POST['id_Tour'];
        }else{
            $key ="";
            $id_Tour = 0;
        }
        $titleday = loadall_titleday($key,$id_Tour);
        $tour = loadall_tour("",0,0);
        include("Tour/TitleDay/list.php");
        break;
    case 'addtitleday':// thêm
        if(isset($_POST['themmoi'])){
            $id_Tour = $_POST['id_Tour'];
            $muc1 = $_POST['muc1'];
            $muc2 = $_POST['muc2'];
            $muc3 = $_POST['muc3'];
            $muc4 = $_POST['muc4'];
            $muc5 = $_POST['muc5'];
            $muc6 = $_POST['muc6'];
            $muc7 = $_POST['muc7'];
            insert_titleday($id_Tour,$muc1,$muc2,$muc3,$muc4,$muc5,$muc6,$muc7);
        }
        $tour = loadall_tour("",0,0);
        include("Tour/TitleDay/add.php");
        break;
    case 'xoatitleday'://xóa
        if(isset($_GET['id_titleday'])&&($_GET['id_titleday']>0)){
            del_titleday($_GET['id_titleday']);
        }
        $titleday = loadall_titleday("",0);
        include('Tour/TitleDay/list.php');
        break;
     case 'suatitleday'://sửa
        if(isset($_GET['id_titleday'])&&($_GET['id_titleday']>0)){
            $suatitleday=sua_titleday($_GET['id_titleday']);
        }
        $tour = loadall_tour("",0,0);
        $titleday = loadall_titleday("",0);
        include('Tour/TitleDay/update.php');
        break;
    case'capnhattitleday'://cập nhật
        if(isset($_POST['capnhat'])){
            $id_titleday = $_POST['id_titleday'];
            $id_Tour = $_POST['id_Tour'];
            $muc1 = $_POST['muc1'];
            $muc2 = $_POST['muc2'];
            $muc3 = $_POST['muc3'];
            $muc4 = $_POST['muc4'];
            $muc5 = $_POST['muc5'];
            $muc6 = $_POST['muc6'];
            $muc7 = $_POST['muc7'];
            capnhat_titleday($id_titleday,$id_Tour,$muc1,$muc2,$muc3,$muc4,$muc5,$muc6,$muc7);
        }
        $tour = loadall_tour("",0,0);
        $titleday = loadall_titleday("",0);
        include('Tour/TitleDay/list.php');
        break;
    //image
    case'listimage'://danh sách
        if(isset($_POST['searchlist'])&&($_POST['searchlist'])){
            $key = $_POST['key'];
            $id_Tour=$_POST['id_Tour'];
        }else{
            $key ="";
            $id_Tour = 0;
        }
        $image=loadall_img($key,$id_Tour);
        $tour = loadall_tour("",0,0);
        include('Tour/Image/list.php');
        break;
    case'addimage'://thêm mới
        if(isset($_POST['themmoi'])){
            $id_Tour = $_POST['id_Tour'];
            $image1 = $_POST['image1'];
            $image2 = $_POST['image2'];
            $image3 = $_POST['image3'];
            $image4 = $_POST['image4'];
            $image5 = $_POST['image5'];
            $image6 = $_POST['image6'];
            $image7 = $_POST['image7'];
             insert_img($id_Tour,$image1,$image2,$image3,$image4,$image5,$image6,$image7);
        }
        $tour = loadall_tour("",0,0);
        include('Tour/Image/add.php');
        break;
     case 'xoaimage'://xóa
        if(isset($_GET['id_image'])&&($_GET['id_image']>0)){
            del_img($_GET['id_image']);
        }
        $image=loadall_img("",0);
        $tour = loadall_tour("",0,0);
        include('Tour/Image/list.php');
        break;
    case 'suaimage'://sửa
        if(isset($_GET['id_image'])&&($_GET['id_image']>0)){
            $suaimg=sua_img($_GET['id_image']);
        }
        $image=loadall_img("",0);
        $tour = loadall_tour("",0,0);
        include('Tour/Image/update.php');
        break;
    case'capnhatimage'://cập nhật
        if(isset($_POST['capnhat'])){
            $id_image = $_POST['id_image'];
            $id_Tour = $_POST['id_Tour'];
            $image1 = $_POST['image1'];
            $image2 = $_POST['image2'];
            $image3 = $_POST['image3'];
            $image4 = $_POST['image4'];
            $image5 = $_POST['image5'];
            $image6 = $_POST['image6'];
            $image7 = $_POST['image7'];
        capnhat_img($id_image,$id_Tour,$image1,$image2,$image3,$image4,$image5,$image6,$image7);
        }
        $image=loadall_img("",0);
        $tour = loadall_tour("",0,0);
        include('Tour/Image/list.php');
        break;
    //Tài khoản
        case'listtk':
            include("TaiKhoan/list.php");
            break;
        case'addtk':
            include("TaiKhoan/add.php");
            break;
        case 'capnhattk':
            $Query_one_tk = Query_one_tk($maTK);
            // $Query_one_tttk = Query_one_tttk($maTK);
            include("TaiKhoan/update.php");
            break;
    //Quảng cáo
        case'listqc':
            $loadall_qc = loadall_qc();
            include("QuangCao/list.php");
            break;
        case'addqc':
            include("QuangCao/add.php");
            break;
        case'xoaqc':          
                $del_qc = del_qc($id_qc);
                $loadall_qc = loadall_qc();    
            include("QuangCao/list.php");
            break;
        case'capnhatqc':          
                $load_one_qc = load_one_qc($id_qc);
                $loadall_qc = loadall_qc();    
            include("QuangCao/update.php");
            break;
    //Bình luận bài viết:
        case'listblnews':
            include("BinhLuannews/list.php");
            break;
        case'blchitiet':
                $load_idbai = load_idbai($id_bai); 
            include("BinhLuannews/blchitiet.php");
            break;
     //Bình luận tour:
        case'listbltour':
            $load_binh_luan_tour = load_binh_luan_tour();
            $count_binh_luan_tour = count_binh_luan_tour();
            include("BinhLuantour/list.php");
            break;
        case'bltourchitiet':
                $load_idtour = load_idtour($id_tour); 
            include("BinhLuantour/blchitiet.php");
            break;
    // Đơn tour
        case'listbooktour':

            include("DonTour/list.php");
            break;
    case'main':
        include('main.php');
        break;
    default:
    include('main.php');
    break;
 }
}else{
    include('main.php');
    
}
?>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script> CKEDITOR.replace( 'tomTat' ); </script>
    <script> CKEDITOR.replace( 'noiDung' ); </script>
    <script> CKEDITOR.replace( 'gioiThieu' ); </script>
    <script> CKEDITOR.replace( 'tongQuan' ); </script>
    <script> CKEDITOR.replace( 'hanhTrinh' ); </script>
    <script> CKEDITOR.replace( 'mongDoi' ); </script>
    <script> CKEDITOR.replace( 'day1' ); </script>
    <script> CKEDITOR.replace( 'day2' ); </script>
    <script> CKEDITOR.replace( 'day3' ); </script>
    <script> CKEDITOR.replace( 'day4' ); </script>
    <script> CKEDITOR.replace( 'day5' ); </script>
    <script> CKEDITOR.replace( 'day6' ); </script>
    <script> CKEDITOR.replace( 'day7' ); </script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:[ "Thứ 2" , "Thứ 3" , "Thứ 4" , "Thứ 5" , "Thứ 6" , "Thứ 7" , "Chủ nhật" ],
        duration:"slow"
    });

    $( "#datepicker2" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin:[ "Thứ 2" , "Thứ 3" , "Thứ 4" , "Thứ 5" , "Thứ 6" , "Thứ 7" , "Chủ nhật" ],
        duration:"slow"
    });
    // end function
  });
</script>
</div>
</div>
<?php
include('sidebar.php');
?>
<script>
     $('.wrapper').click(function(){
          $(this).addClass("active").siblings().removeClass("active");
      })
</script>
</div>

          
        
        
