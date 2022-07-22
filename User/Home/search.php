<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="CSS/search.css">
</head>
<body>

    <div class="form-search">
        <form action="" method="post">
            <input type="seach" name="search" id="search" placeholder="SEARCH">
        <form>
       <div class="padding">
            <ul id="out-search">
            
            </ul>
       </div>
    </div>
<script>
    $(document).ready(function(){
        var action= "searchname";

        $('#search').keyup(function(){
            var search = $('#search').val();
            if ($('#search').val() != ''){
            $.ajax({
                type: "POST",
                url: "User/Home/action.php",
                data: {action:action, search:search},
                cache: false,
                success: function(data){
                    $('#out-search').html(data);
                }
            });

            }else{
                $('#out-search').html('');
                }
            
        });
        setTimeout(function () {
            $('#search')
        }, 1000);
    });
</script>
</body>
</html>