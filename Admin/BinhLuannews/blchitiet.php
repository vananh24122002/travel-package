<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<div class="table-main">
                <h2>Danh sách bình luận chi tiết bài viết</h2>
              <?php  extract($load_idbai); ?>
                    <input type="hidden" class="username" value="<?=$_SESSION['username']['username']?>">
                   
            <input type="hidden" name="id_bai" id="id_bai" class="id_bai" value="<?=$load_idbai['id_bai']?>">
            <table class="table table-striped" id="load-cmt">
            
                 </table>
              <div class="mb10">
            <input type="button" id="t1" name="themmoi" value="Chọn tất cả">
            <input type="button" id="t1" value="Bỏ chọn tất cả">
            <input type="button" id="t1" value="Xóa tất cả">
            </div>

           </div>   
    <script type="text/javascript">
        $(document).ready(function(){
          //load cmt
          function load_cmt_chitiet(){
          var id_bai = $('[name*="id_bai"]').val();
          $.ajax({
            type: "POST",
            url: "BinhLuannews/action.php",
            data : {id_bai:id_bai},
            cache: false,
            success: function(data){
                    $('#load-cmt').html(data);
                   
                },
          });

          }
          setTimeout(function () {
            load_cmt_chitiet();
          }, 500);

          // xóa cmt
          $(document).on('click','.btn-secondary-one',function(e){
              e.preventDefault();
            var del_id_bl = $(this).data("id_xoa");
            $(document).on('click','.btn-secondary-two',function(){
              $.ajax({
                type: "POST",
                url: "BinhLuannews/action.php",
                data:{del_id_bl:del_id_bl},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa bình luận thành công !'),
                    $("#modal-del").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");
                    setTimeout(function () {
                      load_cmt_chitiet();
                      }, 500);   
                }
                }
              });
            });
            // end xoa
          });
        //  reply cmt
        $(document).on('click','.btn-reply-cmt',function(){
          var username = $('.username').val();
          var id_bl = $(this).data("id_cmt");
          var reply = $('.reply-cmt_'+id_bl).val();
          var id_bv = $(this).data('id_bv');
          // alert(username);
          // alert(id_bl);
          // alert(reply);
          // alert(id_bv);
          $.ajax({
            type: "POST",
            url: "BinhLuannews/action.php",
            data : {username:username,id_bl:id_bl,reply:reply,id_bv:id_bv},
            cache: false,
            success: function(data){
              if(data==1){
                    alert('Trả lời bình luận thành công !'),
                    
                    setTimeout(function () {
                      load_cmt_chitiet();
                      }, 500);   
                }else{
                  alert('Trả lời bình luận thất bại !')
                }   
                   
                },
          });
          
        
        });
     // xóa cmt-reply
     $(document).on('click','.del-reply-tour',function(e){
              e.preventDefault();
              var reply_id = $(this).data("id_reply");
            $(document).on('click','.del-reply-tour-two',function(e){
              $.ajax({
                type: "POST",
                url: "BinhLuannews/action.php",
                data:{reply_id:reply_id},
                cache: false,
                success: function(data){
                if(data==1){
                    alert('Xóa bình luận thành công !'),
                        $("#delete-reply").remove();
                        $("body").removeClass("modal-open");
                        $("body").attr("style", "");
                        $(".fade").removeClass("modal-backdrop");
                    setTimeout(function () {
                      load_cmt_chitiet();
                      }, 500);   
                }else{
                  alert('Thất bại !');
                }
                }
              });
            });
            // end xoa
          });    
        });
    </script>
</script>