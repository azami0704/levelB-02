<fieldset>
    <legend>帳號管理</legend>

<form method="post" action="./api/edit.php" id="login">
	<table>
		<tr>
			<td>帳號</td>
			<td>密碼</td>
			<td>刪除</td>
		</tr>
		<?php
		$rows=$User->all();
		foreach($rows as $row){
		?>
		<tr>
			<td><?=$row['ac']?></td>
			<td><?=str_repeat("*",strlen($row['pw']))?></td>
			<td>
				<input type="hidden" name="id[]" value="<?=$row['id']?>">
				<input type="checkbox" name="del[]" value="<?=$row['id']?>">
			</td>
		</tr>
		<?php
}
		?>
		<tr>
			<td>
			<input type="hidden" name="table" value="user">
			<input value="確定刪除" type="submit"><input type="reset" value="清空選項">
			</td>
		</tr>
	</table>
</form>

	<h2>新增會員</h2>
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
				<input type="hidden" name="from" value="admin">
				<input type="hidden" name="table" value="user">
			<input value="新增" type="submit"><input type="reset" value="清除">
			</td>
		</tr>
	</table>
</form>
</fieldset>
