
<div class="tab">
    <div class="active">健康新知</div>
    <div>菸害防治</div>
    <div>癌症防治</div>
    <div>慢性病防治</div>
</div>
<div class="article">
    <h2>健康新知</h2>
    <div class="content">
    <?php
    $row=$News->find(['type'=>1]);
    echo $row['title'].$row['text'];
    ?>
    </div>
    <?php
    
    ?>
</div>
<script>
    $('.tab div').click(function(){
        $('.article h2').text($(this).text());
    })
    $('.tab > div').click(function(){
        $('.tab > div').removeClass('active');
        $(this).addClass('active');
        $.get("./api/get_data.php",{type:$(this).index()+1})
        .done(res=>{
            let data=JSON.parse(res);
            let html=`${data[0].title}${data[0].text}`;
            $('.content').html(html);
        })
    })
</script>