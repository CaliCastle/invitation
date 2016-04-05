function dismissModal(){
    $('.overlay').fadeOut();
    setTimeout(function(){
        $('p#message').html('');
        $('.message-box a').remove();
    },500);
}


function addCode(){
    $('tbody').append('<tr class="warning"><th></th><th><input type="text" value="" placeholder="用户名..." class="col-lg-10" id="code" autofocus></th><th class="col-lg-2"><input type="text" value"" id="date" placeholder="日期" maxlength="5" /></th><th><a class="btn btn-warning" id="confirm-add-button" onclick="confirmAddCode()">确定</a></th></tr>');
    $('a#add-admin').fadeOut();
}

function confirmAddCode(){
    var code = $('input#code').val();
    var date = $('input#date').val();
    if (code.length == 0 || date.length == 0){
        return;
    }
    full_url = "addCode.php?code="+code+"&date="+date;
    
    jQuery.ajax({
        url: full_url,
        dataType: "text",
        success: function(result){
            switch(result){
                case "1":
                    showMessageBox('<i class="fa fa-check-o"></i> 添加成功！',1500,'success',function(){window.location.reload()});
                    break;
                default:
                    showMessageBox('<i class="fa fa-frown-o"></i> 未知错误，重试',1500,'error');
                    break;
            }
        }
    })
}

function showMessageBox(message,time,className,callback){
    $('p#message').html(message);
    $('p#message').addClass(className);
    $('.overlay').fadeIn();
    setTimeout(function(){
        $('.overlay').fadeOut();
        $('p#message').removeClass(className);
        if (callback)
            callback();
    }, time);
}
