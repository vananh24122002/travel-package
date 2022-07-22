<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin cá nhân</title>
  <link rel="icon" type="image/x-icon" href="../../img/icon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="CSS/my-bill.css">
    <style>
      #mid1{
        margin-top:3vw;
      }
    </style>
</head>
<body>
<div class="my-bill">
<div class="table-main">
                <h2>Danh sách tour đã đặt</h2>
            <input type="hidden" id="id_user_hoadon" name="id_user_hoadon" value="<?=$_SESSION['username']['maTK']?>">
            <form action="index.php?action=listtintucbv" id="mid1" method="post">
            <table class="table table-striped" id="load_bill">
              <!-- load bill -->
            </table>
          </form>  
           </div> 
</div>
<script type="text/javascript">
  $(document).ready(function(){
  //load đơn đặt tour
  function load_dattour(){
    var id_user_hoadon = $('[name*="id_user_hoadon"]').val();
          $.ajax({
            type: "POST",
            url: "User/Bill/load_bill.php",
            data:{id_user_hoadon:id_user_hoadon},
            success: function(data){
                    $('#load_bill').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_dattour();
          }, 500); 

  // thay đổi trạng thái hủy
  $(document).on('click','#huy',function(e){
      e.preventDefault();
              var id_hoa_don_huy = $(this).data("id_hoa_don_huy");
              $(document).on('click','.btn-secondary-two',function(e){
               
              $.ajax({
                type: "POST",
                url: "User/Bill/load_ct_bill.php",
                data:{id_hoa_don_huy:id_hoa_don_huy},
                cache: false,
                success: function(data){
                  // console.log(data);
                if(data==1){
                    alert('Hủy xác nhận thành công !'),
                    // remove modal
                        $("#modal-huy").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");

                    setTimeout(function () {
                      load_dattour();
                      }, 500);   
                }else{
                  alert('Hủy xác nhận thất bại !');
                }

                }
              });

            });
          
          });  
            //end thay đổi 
  });
</script>
</body>
</html>