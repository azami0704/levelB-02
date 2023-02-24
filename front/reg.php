<?php
$table='User';
?>

<fieldset>
    <legend>會員註冊</legend>

    <div>*請設定您要註冊的帳號及密碼(最長12個字元)</div>
<table>
        <form method="post" action="./api/add.php" id="reg-form">
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
                                    <td> <input type="password" id="pwc" ></td>
                                </tr>
                                <tr>
                                    <td>Step4:信箱(忘記密碼時使用)</td>
                                    <td> <input type="text" name="email" id=""></td>
                                </tr>
							</tbody>
                            <tr>
                            <input type="hidden" name="from" value="index">
                            <input type="hidden" name="table" value="<?=$table?>">
                                <td class="cent"><input type="submit" value="新增"><input type="reset" value="清除">
                                </td>
                            </tr>
						</table>
					</form>
</table>
</fieldset>
<script>
    $("#reg-form").submit(function(e){
        e.preventDefault();
        let data=$(this).serialize();
        
        if(data.indexOf('=&')!=-1){
            alert("不可空白");
        }else if($('#pwc').val()!=$('[name="pw"]').val()){
            alert("密碼錯誤");
        }else{
            $.post("./api/login.php",data)
            .done(res=>{
                if(res[0]!='e'){
                    alert("帳號重複");
                }else{
                    this.submit();
                }
            })
        }
    })

</script>