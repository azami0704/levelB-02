<?php
$table=ucfirst($_GET['do']);
$direct=$_GET['do'];
?>
<form method="post" action="./api/edit.php">
    <fieldset>
        <legend>帳號管理</legend>
        <table>
                    <tr>
                        <td width="45%">帳號</td>
                        <td width="45%">密碼</td>
                        <td width="7%">刪除</td>
                    </tr>
                    <?php
                    $rows=$$table->all();
                    foreach($rows as $row){
                        ?>
                    <tr>
                        <td width="45%">
                            <?=$row['ac']?>
                        </td>
                        <td width="23%">
                            <?=str_repeat('*',strlen($row['ac']))?>
                        </td>
                        <td width="7%">
                            <input type="hidden" name="table" value="<?=$table?>">
                            <input type="hidden" name="id[]" value="<?=$row['id']?>">
                            <input type="checkbox" name="del[]" value="<?=$row['id']?>">
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
                <tr>
                    <td class="cent">
                        <input type="submit" value="修改刪除"><input type="reset" value="清空選取">
                    </td>
                </tr>
            </table>
        </fieldset>
</form>

    <h3>新增會員</h3>
    <div>*請設定您要註冊的帳號及密碼(最長12個字元)</div>
<table>
        <form method="post" action="./api/add.php">
						<table width="100%">
							<tbody>
								<tr>
									<td width="45%">Step1:帳號</td>
                                    <td>
                                        <input type="text" name="ac" id="">
                                    </td>
								</tr>
                                <tr>
                                    <td>Step2:密碼</td>
                                    <td> <input type="password" name="pw" id=""></td>
                                </tr>
                                <tr>
                                    <td>Step3:再次確認密碼</td>
                                    <td> <input type="password" id=""></td>
                                </tr>
                                <tr>
                                    <td>Step4:信箱(忘記密碼時使用)</td>
                                    <td> <input type="text" name="email" id=""></td>
                                </tr>
							</tbody>
                            <tr>
                            <input type="hidden" name="from" value="admin">
                            <input type="hidden" name="table" value="<?=$table?>">
                                <td class="cent"><input type="submit" value="新增"><input type="reset" value="清除">
                                </td>
                            </tr>
						</table>
					</form>
</table>


