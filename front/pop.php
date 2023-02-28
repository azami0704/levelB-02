<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>
	<table>
		<tr>
			<td>編號</td>
			<td>內容</td>
		</tr>
		<?php
		$div=5;
		$direct=$_GET['do'];
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
		$rows=q("SELECT news.*,COUNT(`log`.`news`)AS 'num' FROM `news` LEFT JOIN `log` ON `log`.`news`=`news`.`id` WHERE `sh`='1' GROUP BY `news`.`id` ORDER BY `num` DESC LIMIT $start,$div");
		foreach($rows as $idx=>$row){
		?>
		<tr>
			<td class="news-title"><?=$row['title']?></td>
			<td> <div class="text ellipse"><?=$row['text']?></div> </td>
			<td class="good-box">
			<span><?=$Log->count(['news'=>$row['id']])?>個人說</span>
			<span class="good"></span>
				<?php
				if(isset($_SESSION['ac'])){
					if(empty($Log->find(['ac'=>$_SESSION['ac'],'news'=>$row['id']]))){
						echo "<a class='good-btn' data-id='{$row['id']}'>讚</a>";
					}else{
						echo "<a class='good-btn' data-id='{$row['id']}'>收回讚</a>";
					}
				}
				?>
			
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

	$('.text').hover(function(){
		$("#ssaa").html(`<h3>${$(this).parent().prev().text()}</h3><div>${$(this).text()}</div>`);
		$("#alerr").css({top:$(this).offset().top+10,left:$(this).offset().left+100});
		$("#alerr").show();
	},function(){
		$("#alerr").hide();
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
			location.reload();
		})
	})
</script>
