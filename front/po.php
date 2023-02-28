<nav>目前位置:首頁 > 分類網誌 ><span id="bc">健康新知</span></nav>
<div class="wrap">
<fieldset>
    <legend>分類網誌</legend>
    <div class="type-list">
        <div>健康新知</div>
        <div>菸害防治</div>
        <div>癌症防治</div>
        <div>慢性病防治</div>
    </div>
</fieldset>
<fieldset>
    <legend>文章列表</legend>
    <div class="po-list">
    <?php
    $rows=$News->all(['type'=>1]);
    foreach($rows as $row){
        echo "<div><a class='po-title'>{$row['title']}</a><div style='display:none'>{$row['text']}</div></div>";
    }
    ?>
    </div>
</fieldset>

</div>
<script>
    addEvent();

    $('.type-list div').click(function(){
        $('#bc').text($(this).text());
        $.get("./api/get_data.php",{type:$(this).index()+1})
        .done(res=>{
            let data=JSON.parse(res);
            let html='';
            $(data).each((_,item)=>{
                html+=`<div><a class='po-title'>${item.title}</a><div style='display:none'>${item.text}</div></div>`
            })
            $('.po-list').html(html);
            addEvent();
        })
    })

    function addEvent(){
        $('.po-title').click(function(){
            $('.po-list').html(`<h2>${$(this).text()}</h2>
<pre>${$(this).next().text()}</pre>`);
        })
    }
</script>