<?php
$table=ucfirst($_GET['do']);
$direct=$_GET['do'];
?>
<form method="post" action="./api/edit.php">
        <table>
                    <tr>
                        <td width="10%">編號</td>
                        <td width="70%">標題</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                    </tr>
                    <?php
                    $div=3;
                    $all=ceil($$table->count(1)/$div);
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
                    $rows=$$table->all(" LIMIT $start,$div");
                    foreach($rows as $idx=>$row){
                        $no=$start+$idx+1;
                        ?>
                    <tr>
                        <td width="10%">
                            <?=$no."."?>
                        </td>
                        <td width="70%">
                            <input type="hidden" name="id[]" value="<?=$row['id']?>">
                            <?=$row['title']?>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$row['sh']==1?'checked':'';?>>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="del[]" value="<?=$row['id']?>">
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
                <tr>
                    <td class="cent">
                    <input type="hidden" name="from" value="admin">
                    <input type="hidden" name="table" value="<?=$table?>">
                        <input type="submit" value="確定修改">
                    </td>
                </tr>
            </table>
</form>
<div class="pagi">
    <a href="?do=<?=$direct?>&p=<?=$prev?>">&lt;</a>
    <?php
    for($i=1;$i<=$all;$i++){
        $size=$i==$act?'30px':'24px';
        echo "<a href='?do=<?=$direct?>&p=<?=$prev?>' style='font-size:$size;'>$i</a>";
    }
    ?>
    <a href="?do=<?=$direct?>&p=<?=$next?>">&gt;</a>
</div>


