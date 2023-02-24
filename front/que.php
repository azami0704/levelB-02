<?php
$table = ucfirst($_GET['do']);
$direct = $_GET['do'];
?>
<div>
    <fieldset>
        <legend>目前位置:首頁>問券調查</legend>
        <table style="width:700px;">
            <tr>
                <td>編號</td>
                <td>問券題目</td>
                <td>投票總數</td>
                <td>結果</td>
                <td>狀態</td>
            </tr>
            <?php
            $rows = $$table->all(['main'=>0]);
            foreach ($rows as $idx=>$row) {
            ?>
                <tr>
                    <td><?= $idx+1 ?>.</td>
                    <td><?= $row['text']?></td>
                    <td><?= $$table->sum('vote',['main'=>$row['id']])?></td>
                    <td><a href="?do=result&id=<?=$row['id']?>">結果</a></td>
                    <?php
                    if(isset($_SESSION['ac'])){
                        ?>
                            <td><a href="?do=vote&id=<?=$row['id']?>">投票</a></td>
                        <?php
                    }else{
                        ?>
                            <td>請先登入</td>
                        <?php
                    }
                    ?>
                    
                </tr>
            <?php
            }
            ?>
        </table>
    </fieldset>
</div>

<script>

</script>