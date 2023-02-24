<?php
$table = 'News';
$direct = $_GET['do'];
?>
<div>
    <fieldset>
        <legend>目前位置:首頁>人氣文章</legend>
        <div style="width:700px;">
            <div class='row'>
                <div class="title">標題</div>
                <div style="flex:1;">內容</div>
                <div style="width:20%;">人氣</div>
            </div>
            <?php
            $div = 5;
            $all = ceil($$table->count(1) / $div);
            $act = $_GET['p'] ?? 1;
            $prev = $act - 1;
            $next = $act + 1;
            if ($act == 1) {
                $prev = 1;
            }
            if ($act == $all) {
                $next = $all;
            }
            $start = ($act - 1) * $div;
            $rows = q("SELECT `news`.*, COUNT(log.news) AS 'num' FROM `news` LEFT JOIN `log` ON `news`.`id` = `log`.`news` GROUP BY `news`.`id` ORDER BY 'num' DESC LIMIT $start,$div");
            foreach ($rows as $row) {
            ?>
                <div class='row' style="flex:1;">
                    <div class="title"><?= $row['title'] ?></div>
                    <div class="text ellipse"><?= $row['text'] ?></div>
                    <div style="width:20%;flex-shrink: 0;">
                    <span><?=$Log->count(['news'=>$row['id']])?>個人說</span>
                    <a class="good"></a>
                    <?php
                    $logs = $Log->all(['ac'=>$_SESSION['ac'],'news' => $row['id']]);
                    if (!empty($logs)) {
                    ?>
                        <a class="good-btn" data-id='<?=$row['id']?>'>收回讚</a>
                    <?php
                    } else {
                    ?>
                        <a class="good-btn" data-id='<?=$row['id']?>'>讚</a>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </fieldset>
    <div class="pagi">
        <a href="?do=<?= $direct ?>&p=<?= $prev ?>">&lt;</a>
        <?php
        for ($i = 1; $i <= $all; $i++) {
            $size = $i == $act ? '30px' : '24px';
            echo "<a href='?do=$direct&p=$i' style='font-size:$size;'>$i</a>";
        }
        ?>
        <a href="?do=<?= $direct ?>&p=<?= $next ?>">&gt;</a>
    </div>
</div>

<script>

    $('.good-btn').click(function(){
        let meth=$(this).text()=='讚'?'save':'del';
        $.post("./api/good.php",{news:$(this).data('id'),meth})
        .done(res=>{
            console.log(res);
            let good=meth=='save'?'收回讚':'讚';
            $(this).text(good);
            location.reload();
        })
    })

    $('.text').hover(function(){
        $('#alerr #ssaa').html(`
        <h3>${$(this).prev().text()}</h3><p>${$(this).text()}</p>`);
        $('#alerr').css({top:$(this).offset().top+30,left:$(this).offset().left+50});
        $('#alerr').show();
    },function(){
        $('#alerr').hide();
    })
</script>