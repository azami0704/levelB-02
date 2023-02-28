<fieldset>
    <legend>目前位置:首頁 > 問券調查 > <?=$Que->find($_GET['id'])['text']?></legend>
	<h3><?=$Que->find($_GET['id'])['text']?></h3>
	<table>
		<?php
		$rows=$Que->all(['main'=>$_GET['id']]);
		$Votes=$Que->sum('vote',['main'=>$_GET['id']])==0?1:$Que->sum('vote',['main'=>$_GET['id']]);
		foreach($rows as $idx=>$row){
			$percent=round(($row['vote']/$Votes)*100);
		?>
		<tr>
			<td>
			<?=$idx+1.?><?=$row['text']?>	
			</td>
			<td style="width:30%">
			<div class="float-l bar" style="width: <?=$percent*0.5?>%;"></div>
			<div class="float-r"><?=$row['vote']?>票(<?=$percent?>%)</div>
			</td>
		</tr>
		<?php
}
		?>
		<tr>
			<td>
				<button type="button" onclick="lof('?do=que')">返回</button>
			</td>
		</tr>
		</table>
</fieldset>
