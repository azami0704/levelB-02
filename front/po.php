<nav>目前位置:首頁>分類網誌<span class="nav">健康新知</span></nav>
<div id="rg">
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
    <div class="text">
<?php
$rows=$News->all(['type'=>1]);
foreach($rows as $row){
    echo "<a href='#' class='arti'>{$row['title']}</a>";
    echo "<div style='display:none'><pre>{$row['text']}</pre></div>";
}
?>
</div>
</fieldset>

 </div>

 <script>
    addEvent();
    function addEvent(){
        $('.arti').click(function(){
            $(this).parent().html(`
            <h2 class="title">${$(this).text()}</h2>
            <div class="text"><pre>${$(this).next().text()}</pre></div>
            `)
        })
    }

    $('.type-list > div').click(function(){
        $(".nav").text($(this).text());
        $.get("./api/get_data.php",{table:`News`,id:$(this).index()+1})
        .done(res=>{
            let data=JSON.parse(res);
            let html='';
            $(data).each((_,item)=>{
                html+=`<a href='#' class='arti'>${item.title}</a><div style='display:none'>${item.text}</div>`;
            })
            $('.text').html(html);
            addEvent();
        })
    })
 </script>
