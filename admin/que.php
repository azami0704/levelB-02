<fieldset>
    <legend>新增問卷</legend>

<form method="post" action="./api/que.php" >
	<table>
		<tbody id="sb">
		<tr>
			<td>問券名稱</td>
			<td><input name="text" autofocus="" type="text"></td>
		</tr>
		<tr>
			<td>選項</td>
			<td><input name="opt[]" type="text"></td>
		</tr>
		</tbody>
	</table>
					<p class="cent"><input value="新增" type="submit">|<input type="reset" value="清空">|<input type="button" value="更多" id="add-btn"></p>
</form>
</fieldset>
<script>
	$('#add-btn').click(function(){
		$('#sb').append(`<tr>
			<td>選項</td>
			<td><input name="opt[]" type="text"></td>
		</tr>`)
	})
</script>
