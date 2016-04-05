var count = 1;
var isGetting = false;
//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function () {
    timer();
    showtime();
    $(window).bind("load resize", function () {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function () {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

function timer() {
    changeBackground();
    setTimeout('timer()', 700);
}

function changeBackground() {
    if (count == 7) count = 1;
    $('#banner').css('background-position', '-' + count * 200 + 'px 0px');
    count++;
}

function submitLogin() {
    var user_name = jQuery('input#username').val();
    var user_pwd = jQuery('input#password').val();
    if (user_name.length > 0 && user_pwd.length > 0) {
        login(user_name, user_pwd);
    } else {
        $('p#message').html('请输入帐号或密码！');
        $('p#message').addClass('error');
        $('.overlay').fadeIn();
        setTimeout(function () {
            $('.overlay').fadeOut();
            $('p#message').removeClass('error');
        }, 1500);
    }
}

function login(username, userpass) {
    url = "generate_auth_cookie.php?username=" + username + "&password=" + userpass;
    $('p#status').html('<i class="fa fa-spin fa-spinner"></i> 正在登录中...');
    jQuery.ajax({
        url: url,
        dataType: "json",
        success: function (results) {
            $('p#status').html('');
            if (results["status"] == "ok") {
                setCookie('invite', results["user"]["username"], 300000);
                $('p#status').html('<i class="fa fa-check-o"></i> 登录成功！');
                $('p#status').addClass('success');
                setTimeout(function () {
                    window.location.href = "index.php";
                }, 500);
            } else {
                $('p#status').fadeIn(500);
                $('p#status').html('<i class="fa fa-times-circle-o"></i> 帐号或密码错误！');
                $('p#status').addClass('error');
                setTimeout(function () {
                    $('p#message').removeClass('error');
                    $('p#status').html('');
                }, 1500);
            }
        }
    });
}

function setCookie(c_name, value, expiredays) {
    var exdate = new Date()
    exdate.setDate(exdate.getDate() + expiredays)
    document.cookie = c_name + "=" + escape(value) +
        ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString())
}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=")
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1
            c_end = document.cookie.indexOf(";", c_start)
            if (c_end == -1) c_end = document.cookie.length
            return unescape(document.cookie.substring(c_start, c_end))
        }
    }
}

function getInvitation() {
    if (isGetting) return;
    isGetting = true;
    url = 'get_invite_code.php';
    jQuery.ajax({
        url: url,
        dataType: 'json',
        success: function (results) {
            isGetting = false;
            if (results['status'] == "1") {
                $('a').remove();
                $('p#invite_code').html('恭喜成功抢到注册码('+results['code']+')：<a href="http://bbs.abletive.com/index.php?invite='+results['code']+'" target="_blank" style="color:#eee">点击前往</a><br>请尽快前往激活,若暂时不方便，请复制下面的 url 以后访问<br>http://bbs.abletive.com/index.php?invite='+results['code']);
                $('p#invite_code').addClass('success');
            } else {
                alert('已抢完...');
                window.location.reload();
            }
        }
    });
}

function showtime() {
    var today, hour, second, minute;
    today = new Date();
    
    hour = today.getHours();
    minute = today.getMinutes();
    second = today.getSeconds();
    if (hour < 10){
        hour = '0'+hour;
    }
    if (minute < 10){
        minute = '0'+minute;
    }
    if (second < 10){
        second = '0'+second;
    }
    $('span#time').html(hour + ":" + minute + ":" + second);
    setTimeout("showtime();", 1000);
}
function logout(){
    delCookie("invite");
    window.location.href = "login.php";
}

function delCookie(name){
   var date = new Date();
   date.setTime(date.getTime() - 300000);
   document.cookie = name + "=a; expires=" + date.toGMTString();
}