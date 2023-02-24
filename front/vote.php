<?php
$table = 'Que';
?>
<div>
    <fieldset>
        <legend>目前位置:首頁><?=$$table->find($_GET['id'])['text']?></legend>
        <form action="./api/que.php" method="post">
        <h3><?=$$table->find($_GET['id'])['text']?></h3>
            <?php
            $rows = $$table->all(['main'=>$_GET['id']]);
            foreach ($rows as $idx=>$row) {
            ?>
            <div><input type="radio" name="opt" value="<?=$row['id']?>"><?=$row['text']?></div>
            <?php
            }
            ?>
            <input type="hidden" name="table" value="<?=$table?>">
            <input type="hidden" name="from" value="index">
            <input type="submit" value="我要投票">
            </form>
    </fieldset>
</div>

<script>

</script>