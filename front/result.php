<?php
$table = 'Que';
?>
<div>
    <fieldset>
        <legend>目前位置:首頁><?=$$table->find($_GET['id'])['text']?></legend>
        <h3><?=$$table->find($_GET['id'])['text']?></h3>
        <table>
            <?php
            $rows = $$table->all(['main'=>$_GET['id']]);
            $votes=$$table->sum('vote',['main'=>$_GET['id']])==0?1:$$table->sum('vote',['main'=>$_GET['id']]);
            foreach ($rows as $idx=>$row) {
            ?>
            <tr>
            <td style="width:50%;"><?=$idx+1?>.<?=$row['text']?></td>
            <td style="width:50%;"><div style="width:<?=round(($row['vote'] / $votes)*100)?>%;background-color: #ccc;height: 15px;float:left;"></div><?=$row['vote']?>票(<?=round(($row['vote'] / $votes)*100)?>%)</td>
            </tr>
            <?php
            }
            ?>
        </table>
        <button type="button" onclick="history.go(-1)">返回</button>
    </fieldset>
</div>

<script>

</script>