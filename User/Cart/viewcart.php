<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package Go</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon.png">
    <link rel="stylesheet" href="../../CSS/cart1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<?php
include("../../Modul/pdo.php");
include('../../Modul/taikhoan.php');
include("../../Modul/tourguide.php");
session_start();
?>

<body>
    <div class="container-cart">
        <div class="header-cart">
            <div class="title-cart">
                <h1><a href="../../index.php?view=danhmuctour">TRAVEL PACKAGE</a></h1>
                <h2>GO</h2>
            </div>
            <div class="datphong-cart">
                <h1 id="dat_phong">ĐẶT PHÒNG </h1>
                <h4><i class="fa fa-phone" aria-hidden="true"></i> 0815-116-733</h4>
            </div>
        </div>

        <form id="load-cart">
            <!-- load cart -->
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
                    // load cart
                    function load_cart() {
                        $.ajax({
                            type: "POST",
                            url: "fetch_cart.php",
                            cache: false,
                            success: function(data) {
                                $('#load-cart').html(data);

                            },
                        });

                    }
                    setTimeout(function() {
                        load_cart()
                    }, 500);
                    // cộng thêm người lớn
                    $(document).on('click', '#cong_so_nguoi', function(e) {
                        e.preventDefault();
                        var id_cart_cong = $(this).data("id_cart_cong");
                        // alert(id_cart_cong);
                        $.ajax({
                            type: "POST",
                            url: "action_cart.php",
                            data: {
                                id_cart_cong: id_cart_cong
                            },
                            cache: false,
                            success: function(data) {
                                // console.log(data);
                                if (data == 1) {
                                    setTimeout(function() {
                                        load_cart()
                                    }, 300);
                                } else {
                                    alert('Đã đạt số hành khách tối đa !');
                                }
                            },
                        });

                    });
                    // trừ đi người lớn
                    $(document).on('click', '#tru_so_nguoi', function(e) {
                        e.preventDefault();
                        var id_cart_tru = $(this).data("id_cart_tru");
                        $.ajax({
                            type: "POST",
                            url: "action_cart.php",
                            data: {
                                id_cart_tru: id_cart_tru
                            },
                            cache: false,
                            success: function(data) {
                                // console.log(data);
                                if (data == 1) {
                                    setTimeout(function() {
                                        load_cart()
                                    }, 300);
                                } else {
                                    alert('Hành khách tối thiểu là 1 !');
                                }
                            },
                        });

                    });
                    // cộng thêm trẻ em
                    $(document).on('click', '#cong_so_tre_em', function(e) {
                        e.preventDefault();
                        var id_cart_cong_tre_em = $(this).data("id_cart_cong_tre_em");
                        // alert(id_cart_cong);
                        $.ajax({
                            type: "POST",
                            url: "action_cart.php",
                            data: {
                                id_cart_cong_tre_em: id_cart_cong_tre_em
                            },
                            cache: false,
                            success: function(data) {
                                // console.log(data);
                                if (data == 1) {
                                    setTimeout(function() {
                                        load_cart()
                                    }, 300);
                                } else {
                                    alert('Đã đạt số hành khách tối đa !');
                                }
                            },
                        });

                    });
                    // trừ đi trẻ em
                    $(document).on('click', '#tru_so_tre_em', function(e) {
                        e.preventDefault();
                        var id_cart_tru_tre_em = $(this).data("id_cart_tru_tre_em");
                        $.ajax({
                            type: "POST",
                            url: "action_cart.php",
                            data: {
                                id_cart_tru_tre_em: id_cart_tru_tre_em
                            },
                            cache: false,
                            success: function(data) {
                                // console.log(data);
                                if (data == 1) {
                                    setTimeout(function() {
                                        load_cart()
                                    }, 300);
                                } else {
                                    alert('Hành khách tối thiểu là 1 !');
                                }
                            },
                        });

                    });
                    // đăng nhập
                                $('[name*="username_login"]').focus(function() {
                                $(this).css("border", "1px solid black");
                                $("#error-username_login").text("");
                                });
                                $('[name*="password"]').focus(function() {
                                $(this).css("border", "1px solid black");
                                $("#error-password").text("");
                                });
                    $(document).on('click','.btn-secondary-one',function(e){
                     e.preventDefault();
                     $('#dangnhap').on('click',function(){
                        var username_login = $('[name*="username_login"]').val();
                        var password = $('[name*="password"]').val();
                        if($username_login =="" || $password==""){
                            if ($('[name*="username_login"]').val() == "") {
                                    $('[name*="username_login"]').css("border", "1px solid red");
                                    $("#error-username_login").text("Vui lòng nhập tài khoản !");
                                }
                                if ($('[name*="password"]').val() == "") {
                                    $('[name*="password"]').css("border", "1px solid red");
                                    $("#error-password").text("Vui lòng nhập mật khẩu !");
                                }
                        }else{

                        }
                    });
                    });
                    // thanh toán
                    var check = false;
                    // loại bỏ lỗi form
                                $('[name*="fullname"]').focus(function() {
                                $(this).css("border", "1px solid black");
                                $("#error-fullname").text("");
                                 });
                                $('[name*="email"]').focus(function() {
                                $(this).css("border", "1px solid black");
                                $("#error-email").text("");
                                });
                                $('[name*="sodt"]').focus(function() {
                                $(this).css("border", "1px solid black");
                                $("#error-sodt").text("");
                                });
                                $('[name*="diachi"]').focus(function() {
                                $(this).css("border", "1px solid black");
                                $("#error-diachi").text("");
                                });
                    $('#load-cart').submit(function(e) {
                            e.preventDefault();
                            var fullname = $('[name*="fullname"]').val();
                            var email = $('[name*="email"]').val();
                            var sodt = $('[name*="sodt"]').val();
                            var diachi = $('[name*="diachi"]').val();
                            var check = $('[name*="checkbox1"]');
                            var check = $('.checkbox1').is(":checked");
                            if (fullname == "" || email == "" || sodt == "" || diachi == "") {
                                // hiển thị lỗi trống
                                if ($('[name*="fullname"]').val() == "") {
                                    $('[name*="fullname"]').css("border", "1px solid red");
                                    $("#error-fullname").text("Tên là bắt buộc !");
                                }
                                if ($('[name*="email"]').val() == "") {
                                    $('[name*="email"]').css("border", "1px solid red");
                                    $("#error-email").text("Email là bắt buộc !");
                                }
                                if ($('[name*="sodt"]').val() == "") {
                                    $('[name*="sodt"]').css("border", "1px solid red");
                                    $("#error-sodt").text("Số điện thoại là bắt buộc !");
                                }
                                if ($('[name*="diachi"]').val() == "") {
                                    $('[name*="diachi"]').css("border", "1px solid red");
                                    $("#error-diachi").text("Địa chỉ là bắt buộc !");
                                }
                                } else {
                                    if (check == true) {
                                        $.ajax({
                                            type: "POST",
                                            url: "action_cart.php",
                                            data: $(this).serializeArray(),
                                            cache: false,
                                            success: function(data) {

                                                // console.log(data);
                                                if (data == 1) {
                                                    alert("Đặt tour thành công !");
                                                    location.href='../../index.php?view=bill_cart';
                                                } else {
                                                    alert("Đặt tour thất bại !");
                                                }

                                            },
                                        })

                                    } else {
                                        //    fail
                                        $("#error-checkbox1").text("Bạn chưa đồng ý với điều khoản  !");
                                    }

                                }

                            });
                        
                    });
    </script>
</body>

</html>