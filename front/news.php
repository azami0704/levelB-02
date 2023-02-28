<fieldset>
    <legend>目前位置:首頁 > 最新文章</legend>
	<table>
		<tr>
			<td>標題</td>
			<td>內容</td>
		</tr>
		<?php
		$div=5;
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
			<td class="news-title"><?=$row['title']?></td>
			<td> <div class="text ellipse"><?=$row['text']?></div> </td>
			<td class="good-box">
				<?php
				if(isset($_SESSION['ac'])){
					if(empty($Log->find(['ac'=>$_SESSION['ac'],'news'=>$row['id']]))){
						echo "<a class='good-btn' data-id='{$row['id']}'>讚</a>";
					}else{
						echo "<a class='good-btn' data-id='{$row['id']}'>收回讚</a>";
					}
				}
				?>
			<span class="good"></span>
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
	
</form>
</fieldset>
<script>
	$('.text').click(function(){
		$(this).toggleClass('ellipse');
	})

	$('.good-btn').click(function(){
		let meth=$(this).text()=='讚'?'save':'del';
		$.post("./api/good.php",{meth,news:$(this).data('id')})
		.done(res=>{
			if(meth=='save'){
				$(this).text('收回讚');
			}else{
				$(this).text('讚');
			}
		})
	})
</script>
