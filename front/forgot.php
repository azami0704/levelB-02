<fieldset>
    <legend>忘記密碼</legend>

<form method="post" action="" id="login">
					<p>請輸入信箱以查詢密碼</p>
					<p class="cent"><input name="email" autofocus="" type="text"></p>
					<p class="info"></p>
					<p class="cent"><input value="查詢" type="submit"></p>
</form>
</fieldset>

<script>
	$('#login').submit(function(e){
		e.preventDefault();
		$.post("./api/login.php",$(this).serialize())
		.done(res=>{
			$('.info').text(res);
		})
	})
</script>