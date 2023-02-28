<fieldset>
    <legend>會員註冊</legend>
	<div>*請設定您要註冊的帳號及密碼(最長12個字)</div>
<form method="post" action="./api/add.php" id="login">
	<table>
		<tr>
			<td>Step1:登入帳號</td>
			<td><input name="ac" autofocus="" type="text"></td>
		</tr>
		<tr>
			<td>Step2:登入密碼</td>
			<td><input name="pw" type="password"></td>
		</tr>
		<tr>
			<td>Step3:再次確認密碼</td>
			<td><input type="password" id="pwc"></td>
		</tr>
		<tr>
			<td>Step4:信箱(忘記密碼時使用)</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="from" value="index">
				<input type="hidden" name="table" value="user">
			<input value="註冊" type="submit"><input type="reset" value="清除">
			</td>
		</tr>
	</table>
</form>
</fieldset>

<script>
	$('#login').submit(function(e){
		e.preventDefault();
		if($(this).serialize().indexOf("=&")!=-1){
			alert("不可空白");
		}else if($('[name="pw"]').val()!=$('#pwc').val()){
			alert("密碼錯誤");
		}else{
			$.post("./api/login.php",$(this).serialize())
			.done(res=>{
				if(res[1]!='查'){
					alert("帳號重複");
				}else{
					this.submit();
				}
			})
		}
	})
</script>