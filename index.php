<?php include 'functions.php';
?>
    <!DOCTYPE html>
    <html lang="zh-CN">

    <head>
        <title>
            <?php echo $home_title; ?>
        </title>
        <meta name="description" content="<?php echo $home_desc; ?>" />
        <?php include 'head.php'; ?>
    </head>
    <style type="text/css">
        body {
            background: #313131;
        }    
        .success {
            font-size: 20px;
            color: #9fd329
        }
    </style>
    <body>
        <?php 
            $get_code = '<style type="text/css">
            .text {
                fill: none;
                stroke-width: 3;
                stroke-linejoin: round;
                stroke-dasharray: 70 330;
                stroke-dashoffset: 0;
                -webkit-animation: stroke 14s infinite linear;
                animation: stroke 14s infinite linear;
            }
            
            .text:nth-child(5n + 1) {
                stroke: #F2385A;
                -webkit-animation-delay: -2.4s;
                animation-delay: -2.4s;
            }
            
            .text:nth-child(5n + 2) {
                stroke: #F5A503;
                -webkit-animation-delay: -4.8s;
                animation-delay: -4.8s;
            }
            
            .text:nth-child(5n + 3) {
                stroke: #E9F1DF;
                -webkit-animation-delay: -7.2s;
                animation-delay: -7.2s;
            }
            
            .text:nth-child(5n + 4) {
                stroke: #56D9CD;
                -webkit-animation-delay: -9.6s;
                animation-delay: -9.6s;
            }
            
            .text:nth-child(5n + 5) {
                stroke: #3aa1bf;
                -webkit-animation-delay: -12s;
                animation-delay: -12s;
            }
            
            @-webkit-keyframes stroke {
                100% {
                    stroke-dashoffset: -400;
                }
            }
            
            @keyframes stroke {
                100% {
                    stroke-dashoffset: -400;
                }
            }
            /* Other stuff */
            
            html,
            body {
                height: 100%;
            }
            
            body {
                color: #fff;
            }
            
            .content {
                font: 500 11em/1 "Avenir Light", "PingHei Light", Impact;
            }
            
            svg {
                width: 50%;
                height: 200px;
                margin: 0 auto 50px;
                display: block;
                text-transform: uppercase;
                position: absolute;
                top: 50%;
                left: 50%;
                margin-left: -25%;
                margin-top: -100px;
                z-index: 999;
            }
        </style>
        <div class="main">
            <div class="background_container"></div>
            <div class="content">
               <a href="javascript:void(0)" onclick="getInvitation()">
                <svg viewBox="0 0 800 300">
                    <!-- Symbol -->
                    <symbol id="s-text">
                        <text text-anchor="middle" x="50%" y="50%" dy=".2em">点我抢码</text>
                    </symbol>
                    <!-- Duplicate symbols -->
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                </svg>
                </a>
            </div>
            <div class="black_overlay"></div>
        </div>';
            $over_code = '<style type="text/css">
            .text {
                fill: none;
                stroke-width: 3;
                stroke-linejoin: round;
                stroke-dasharray: 70 330;
                stroke-dashoffset: 0;
                -webkit-animation: stroke 14s infinite linear;
                animation: stroke 14s infinite linear;
            }
            
            .text:nth-child(5n + 1) {
                stroke: #F2385A;
                -webkit-animation-delay: -2.4s;
                animation-delay: -2.4s;
            }
            
            .text:nth-child(5n + 2) {
                stroke: #F5A503;
                -webkit-animation-delay: -4.8s;
                animation-delay: -4.8s;
            }
            
            .text:nth-child(5n + 3) {
                stroke: #E9F1DF;
                -webkit-animation-delay: -7.2s;
                animation-delay: -7.2s;
            }
            
            .text:nth-child(5n + 4) {
                stroke: #56D9CD;
                -webkit-animation-delay: -9.6s;
                animation-delay: -9.6s;
            }
            
            .text:nth-child(5n + 5) {
                stroke: #3aa1bf;
                -webkit-animation-delay: -12s;
                animation-delay: -12s;
            }
            
            @-webkit-keyframes stroke {
                100% {
                    stroke-dashoffset: -400;
                }
            }
            
            @keyframes stroke {
                100% {
                    stroke-dashoffset: -400;
                }
            }
            /* Other stuff */
            
            html,
            body {
                height: 100%;
            }
            
            body {
                color: #fff;
            }
            
            .content {
                font: 400 8em/1 "Avenir Light", "PingHei Light", Impact;
            }
            
            svg {
                width: 50%;
                height: 200px;
                margin: 0 auto 50px;
                display: block;
                text-transform: uppercase;
                position: absolute;
                top: 50%;
                left: 50%;
                margin-left: -25%;
                margin-top: -100px;
                z-index: 999;
            }
        </style>
        <div class="main">
            <div class="background_container"></div>
            <div class="content">
                <svg viewBox="0 0 800 300">
                    <!-- Symbol -->
                    <symbol id="s-text">
                        <text text-anchor="middle" x="50%" y="50%" dy=".2em">今日发放完毕</text>
                    </symbol>
                    <!-- Duplicate symbols -->
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                    <use xlink:href="#s-text" class="text"></use>
                </svg>
            </div>
            <div class="black_overlay"></div>
        </div>';

            if (checkCode()){
                echo $get_code;
            } else {
                echo $over_code;
            }
        ?>
        <div style="width:500px;position:absolute;left:50%;margin-left:-250px;text-align:center;margin-top:20px">
            <p id="invite_code">每天00:00准时发放10枚邀请码</p>
            <p>当前时间: <span id="time"></span></p>
        </div>
        <a href="javascript:void(0)" onclick="logout()" style="display:block;position:absolute;right:25px;top:20px;text-decoration:none">点击注销</a>
        <script src="js/custom.js"></script>
        <script type="text/javascript">
            if (!getCookie("invite")) {
                window.location.href = "login.php";
            }
        </script>
    </body>

    </html>