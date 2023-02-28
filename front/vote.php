<fieldset>
    <legend>目前位置:首頁 > 問券調查 > <?=$Que->find($_GET['id'])['text']?></legend>
	<h3><?=$Que->find($_GET['id'])['text']?></h3>
	<form action="./api/que.php" method="post">
	<table>
		<?php
		$rows=$Que->all(['main'=>$_GET['id']]);
		foreach($rows as $idx=>$row){
		?>
		<tr>
			<td>
			<input type="radio" name="opt" value="<?=$row['id']?>"><?=$row['text']?>	
			</td>
		</tr>
		<?php
}
		?>
		<tr>
			<td>
				<input type="hidden" name="id" value="<?=$_GET['id']?>">
				<input type="submit" value="我要投票">
			</td>
		</tr>
		</table>
		</form>
</fieldset>
