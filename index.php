<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="CSS/id.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <?php
     session_start();
     error_reporting(E_ERROR | E_PARSE);
    include("Modul/pdo.php");
    include('Modul/tintucdm.php');
    include('Modul/tintuc.php');
    include('Modul/tourdm.php');
    include('Modul/tourguide.php');
    include('Modul/days.php');
    include('Modul/titleday.php');
    include('Modul/image.php');
    include('Modul/taikhoan.php');
    include('Modul/quangcao.php');
    include('Modul/blnews.php');
    include('Modul/bltour.php');
    include('Modul/hoadondattour.php');
    ?>
</head>
<body>
    <?php
        $dmtintuc = loadall_dmtintuchome();
        // load danh
        $onebv_moi = loadone_bvmoinhat();
        $fourbv_moi = loadfour_bvmoinhat();
        $loadtourhome = loadall_tourhome();
        $onebv_luotxem = loadone_luotxem();
        $twobv_luotxem = loadtwo_luotxem();
        $fivebv_luotxem = loadfive_luotxem();
        $loadbv_cungloai=loadbv_cungloai();
        $loadbv_cungloaip2=loadbv_cungloaip2();
        $tourdm=loadall_tourdm();
        $tourdmhd = loadall_tourdmhd();
        $tourdmcd = loadall_tourdmcd();
        $tourdmcdcd = loadall_tourdmcdcd();
        $tourdmg = loadall_tourdmg();
        if(isset($_GET['id_DMTour'])&&($_GET['id_DMTour']>0)){
            $id_DMTour=$_GET['id_DMTour'];         
        }else{
            $id_DMTour=0;
        }
        if(isset($_GET['id_mucdo'])&&($_GET['id_mucdo']>0)){
           $id_mucdo=$_GET['id_mucdo'];       
        }else{
            $id_mucdo=0;
        }
        if(isset($_GET['id_chuyendi'])&&($_GET['id_chuyendi']>0)){
            $id_chuyendi=$_GET['id_chuyendi'];
            
        }else{
            $id_chuyendi=0;
        }
        if(isset($_GET['id_chieudai'])&&($_GET['id_chieudai']>0)){
            $id_chieudai=$_GET['id_chieudai'];
            
        }else{
            $id_chieudai=0;
        }
        if(isset($_GET['id_gia'])&&($_GET['id_gia']>0)){
            $id_gia=$_GET['id_gia'];
            
        }else{
            $id_gia=0;
        }
        $loadbooktour = loadall_booktour($id_DMTour,$id_mucdo,$id_chuyendi,$id_chieudai,$id_gia);
    ?>
    <div class="wrapper">
        <?php
        if(isset($_GET['view']) && ($_GET['view']!= "")){
            $view=$_GET["view"];
            switch ($view) {
                case 'value':
                    # code...
                    break;
                
                //Danh muc 1
                case'danhmuc1':
                    include("User/header.php");
                    include("User/Home/nav.php");
                    if(isset($_GET['id_DMTT'])){
                        $id_DMTT = $_GET['id_DMTT'];
                        $dm =sua_dmtintuc($id_DMTT);
                    }
                    $loadthree_cungloai = loadthree_cungloai($id_DMTT);
                    $loadone_top51 = loadone_top51($id_DMTT);
                    $loadone_top52 = loadone_top52($id_DMTT);
                    $loadthree_top5 = loadthree_top5($id_DMTT);
                    $loadone_goinho2 = loadone_goinho2($id_DMTT);
                    $loadone_goinho1 = loadone_goinho1($id_DMTT);
                    include("User/DanhMuc/main.php");
                    break;
                case'baivietchitiet'://bài viết
                    include("User/header.php");
                    if(isset($_GET['id_bai'])&&($_GET['id_bai']>0)){
                        $id_bai = $_GET['id_bai'];
                        $onebv =load_baiviet($id_bai);
                        extract($onebv);
                        $loadall_bvcungloai = loadall_bvcungloai($id_bai,$id_DMTT);
                        $dmtintuc = loadall_dmtintuchome();
                        $loadall_khacnhau = loadall_khacnhau();
                        include("User/DanhMuc/baivietchitiet.php");
                    }
                    break;
                case'danhmuctour':// tour
                    include('User/BookTour/main.php');
                    break;
                 case'booktour':
                    include("User/header.php");
                    if(isset($_GET['id_Tour'])&&($_GET['id_Tour']>0)){
                        $id_Tour = $_GET['id_Tour'];
                        $loadtour = load_tour($id_Tour);
                        extract($loadtour);
                        $load_titleday = load_titleday($id_Tour);
                        extract($load_titleday);
                        $load_day = load_day($id_Tour);
                        extract($load_day);
                        $load_image = load_image($id_Tour);
                        extract($load_image);   
                        $load_tourcungloai = load_tourcungloai($id_Tour,$id_DMTour);
                    }
                    include('User/BookTour/booktour.php');
                    break;
                case'ttcanhan':
                    include("User/header.php");
                    include("User/TaiKhoan/ttcanhan.php");
                    break;
                case'doimk':
                    include("User/header.php");
                    include("User/TaiKhoan/doimk.php");
                    break;
                //search
                case'searchbv':
                    include("User/header.php");
                    include("User/Home/search.php");
                    break;
                // bill
                case'mybill':
                    include("User/header.php");
                    include("User/Bill/my_bill.php");
                    break;
                    
                case 'bill_cart':
                    include("User/header.php");
                    include("User/Cart/bill_cart.php");
                    break;
                
                
                
                
                
                    
                default:
                include("User/header.php");
                include("User/Home/nav.php");
                include("User/Home/main.php");
                break;
            }
            }else{
                include("User/header.php");
                include("User/Home/nav.php");
                include("User/Home/main.php");
            }
        
        ?>
        
   
     <?php
     include("User/footer.php");
     ?>
    </div>

</body>
</html>