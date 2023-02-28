<fieldset>
    <legend>目前位置:首頁 > 問券調查</legend>
	<table>
		<tr>
			<td>編號</td>
			<td>問券題目</td>
			<td>投票總數</td>
			<td>結果</td>
			<td>狀態</td>
		</tr>
		<?php
		$rows=$Que->all(['main'=>0]);
		foreach($rows as $idx=>$row){
		?>
		<tr>
			<td><?=$idx+1?></td>
			<td><?=$row['text']?></td>
			<td><?=$Que->sum('vote',['main'=>$row['id']])?></td>
			<td>
				<a href='?do=res&id=<?=$row['id']?>'>結果</a>
			</td>
			<td>
				<?php
				if(isset($_SESSION['ac'])){
					echo "<a href='?do=vote&id={$row['id']}'>投票</a>";
				}else{
					echo "<a>請先登入</a>";
				}
				?>
			</td>
		</tr>
		<?php
}
		?>
		</table>
	
</fieldset>
