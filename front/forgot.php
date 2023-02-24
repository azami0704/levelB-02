<table>
        <form method="post" action="./api/login.php" id='login'>
            <div>請輸入信箱以查詢密碼</div>
            <p class="cent"><input name="email" autofocus="" type="text"></p>
            <div id="res"></div>
            <p class="cent"><input value="尋找" type="submit"></p>
        </form>
</table>

<script>
    $('#login').submit(function(e){
        e.preventDefault();
        $.post("./api/login.php",$(this).serialize())
        .done(res=>{
            $('#res').text(res)
        })
    })
</script>