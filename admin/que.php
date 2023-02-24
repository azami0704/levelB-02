<?php
$table = ucfirst($_GET['do']);
$direct = $_GET['do'];
?>
<form method="post" action="./api/que.php">
    <fieldset>
        <legend>新增問券</legend>
        <table>
            <tbody id="sb">
                <tr>
                    <td width="45%">問券名稱</td>
                    <td>
                        <input type="text" name="text" id="">
                    </td>
                </tr>
                <tr>
                    <td>選項</td>
                    <td> <input type="text" name="opt[]"></td>
                </tr>
            </tbody>
            <tr>
                <input type="hidden" name="from" value="admin">
                <input type="hidden" name="table" value="<?= $table ?>">
                <td class="cent"><input type="submit" value="新增">
                <input type="reset" value="清除">
                <button type="button" id="add-btn">更多</button>
                </td>
            </tr>
</table>
    </fieldset>
</form>
<script>
    $('#add-btn').click(function(){
        $('#sb').append(`<tr>
                    <td>選項</td>
                    <td> <input type="text" name="opt[]"></td>
                </tr>`)
    })
</script>