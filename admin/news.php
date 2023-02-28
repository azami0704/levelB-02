<fieldset>
    <legend>文章管理</legend>

<form method="post" action="./api/edit.php" id="login">
	<table>
		<tr>
			<td>編號</td>
			<td>標題</td>
			<td>顯示</td>
			<td>刪除</td>
		</tr>
		<?php
		$div=3;
		$direct='news';
		$all=ceil($News->count(1)/$div);
		$act=$_GET['p']??1;
		$prev=$act-1;
		$next=$act+1;
		if($act==1){
			$prev=1;
		}
		if($act==$all){
			$next=$all;
		}
		$start=($act-1)*$div;
		$rows=$News->all(" LIMIT $start,$div");
		foreach($rows as $idx=>$row){
		?>
		<tr>
			<td><?=$idx+1?>.</td>
			<td><?=$row['title']?></td>
			<td><input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$row['sh']==1?'checked':'';?>></td>
			<td>
				<input type="hidden" name="id[]" value="<?=$row['id']?>">
				<input type="checkbox" name="del[]" value="<?=$row['id']?>">
			</td>
		</tr>
		<?php
}
		?>
		</table>
		<div style="text-align:center;">
					<a class="bl" style="font-size:30px;" href="?do=<?=$direct?>&p=<?=$prev?>">&lt;&nbsp;</a>
					<?php
					for ($i=1; $i <=$all ; $i++) { 
						$size=$act==$i?'30px':'24px';
						echo "<a class='bl' style='font-size:$size;' href='?do=$direct&p=$i'>$i</a>";
					}
					?>
					<a class="bl" style="font-size:30px;" href="?do=<?=$direct?>&p=<?=$next?>">&nbsp;&gt;</a>
				</div>
			<div>
			<input type="hidden" name="table" value="news">
			<input value="確定修改" type="submit">
			</div>
	
</form>
</fieldset>
