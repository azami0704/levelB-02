<fieldset>
    <legend>會員登入</legend>

<form method="post" action="" id="login">
					<p class="cent">帳號 ： <input name="ac" autofocus="" type="text"></p>
					<p class="cent">密碼 ： <input name="pw" type="password"></p>
					<p class="cent"><input value="登入" type="submit"><input type="reset" value="清除"><a href="?do=forgot">忘記密碼</a><a href="?do=reg">尚未註冊</a></p>
</form>
</fieldset>

<script>
	$('#login').submit(function(e){
		e.preventDefault();
		$.post("./api/login.php",$(this).serialize())
		.done(res=>{
			if(res[0]=='e'){
				alert(res.substr(1));
				this.reset();
			}else{
				lof(`${res}.php`);
			}
		})
	})
</script>