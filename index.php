<!Doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ppt</title>
    
    <link href="css/base.css" rel="stylesheet" />
    <!-- include socket.js -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
    <script src="js/jquery.min.js"></script>
    <script src="websocket.js"></script>
</head>

<?php

if( isset($_GET['password']) ){
    if($_GET['password'] == 'mobile'){
?>

<body>

    <link href="css/mobile.css" rel="stylesheet" />

    <div class="title">感谢使用远程ppt系统</div>

    <div class="mobile">

        <div class="event" id="up"><img src="img/up.png"></div>
        <div class="event" id="left"><img src="img/left.png"></div>
        <div class="event" id="reload"><img src="img/repeat.png"></div>
        <div class="event" id="right"><img src="img/right.png"></div>
        <div class="event" id="down"><img src="img/down.png"></div>
    </div>

    <br><br>
	
	<div class="page">
		<ul class="pagination">
            <li><a>1</a></li>
            <li><a>2</a></li>
            <li><a>3</a></li>
            <li><a>4</a></li>
            <li><a>5</a></li>
			<li><a>6</a></li>
			<li><a>7</a></li>
        </ul>	
	</div>

    <div class="info"></div>

</body>

<script>
$(document).ready(function() {

    var Server = new FancyWebSocket('ws://115.28.169.16:9300');

    function send( text ) {
        Server.send( 'message', text );
    }

    $('.event').click(function(){
        var type=$(this).attr('id');
        console.log(type);
        send(type);
    });

    $('.pagination li a').click(function(e){
    	var id = $(this).html();
    	console.log(id);
        send(id); 
    });

    Server.bind('open', function() {
        $('.info').html("connected!");    
    });

    Server.bind('close', function( data ) {
       $('.info').html("connect failure !");         
    });

    Server.bind('message', function( payload ) {
        if( payload == 'sent'){
            $('.info').html('<img src="img/send.png">').attr('opacity','0');;
            $('.info img').slideDown(1000);
            $('.info img').fadeOut(1800);
        }
    });

    Server.connect();
});
</script>


<?php
    }else if($_GET['password'] == 'desktop'){
?>

<link href="css/impress-demo.css" rel="stylesheet" />

<body class="impress-not-supported">

<div id="impress">

	<!-- step1 -->
    <div class="step slide" data-x="0" data-y="-1500">
        <q>
        	<strong class="step1-title">基于声波认证的手机刷卡系统</strong>
        	<br><br><br>
        	<div class="step1-member">姚宏伟、周思立、梁瀚雷、习容铜、沈涔</div>
        </q>
    </div>

	<!-- step2 -->
    <div class="step slide" data-x="1000" data-y="-1500">
        <q>
			<ul class="">
				<li> What we do? </li>
				<li> How to do? </li>
				<li> What did we do? </li>
				<li> What will we do? </li>
			</ul>
        </q>
    </div>

	<!-- step3 -->
    <div id="step3" class="step" data-x="0" data-y="0" data-scale="4">
        <div>
			<ul class="news">
				<li> 1、SlickLogin公司研发声波传输密码技术<br>在2014年初，谷歌收购了SlickLogin。 </li><br>
				<li> 2、微软研究院在2013年8月份展示类似的声波技术<br>主要用于移动传输文件功能。 </li>
			</ul>
        </div>
        
    </div>

	<!-- step4 -->
    <div id="step4" class="step" data-x="850" data-y="3000" data-rotate="90" data-scale="4">
		<div class="step4-body">
			<div class="step4-title">NO1. What we do?</div>
			<br>
			<div class="todo">
				<img class="todo_img" src="img/liucheng.jpg">
			</div>
		</div>
    </div>

	<!-- step5 -->
    <div id="step5" class="step" data-x="2825" data-y="2325" data-z="-4000" data-rotate="360" data-scale="2">
      	<div class="step5-body">
			<div class="step5-title">NO2. How to do? </div>
			<br>
			<div class="howdo">
				<img class="todo_img" src="img/howdo.jpg">
			</div>
		</div>
    </div>

	<!-- step6 -->
    <div id="step6" class="step" data-x="4500" data-y="-500" data-scale="6">
        <div class="step5-body">
			<div class="step5-title">NO2. How to do? </div>
			<br>
			<div class="howdo">
				<ul class="detail">
					<li> 1、每隔100ms发送一个正弦声波。 </li><br>
					<li> 2、检测频率，加密解密。 </li><br>
					<li> 3、1->1500HZ; 2->1600HZ; 3->1700HZ </li>
				</ul>
			</div>
		</div>
    </div>

	<!-- step7 -->
    <div id="step7" class="step" data-x="6300" data-y="3000" data-rotate="20" data-scale="4">
        <br>
        <br>
        <div class="step7-body">
			<div class="step7-title">NO3. What did we do? </div>
			<br>
			<div class="havedo">
				<ul class="havedoimg">
					<li class="left"><img src="img/desktop.jpg"></li>
					<li class="right"><img src="img/mobile.jpg"></li>
				</ul>
			</div>
		</div>
    </div>
	
	<!-- step8 -->
    <div id="step8" class="step" data-x="5000" data-y="4300" data-z="-100" data-rotate-x="-40" data-rotate-y="10" data-scale="2">
        <div class="step8-body">
			<div class="step8-title">NO4. What wiil we do? </div>
			<br>
			<div class="willdo">
				<ul class="willdo">
					<li>1、服务器模块</li>
					<li>2、手机服务器认证通信</li>
					<li>3、公司服务器认证模块</li>
					<li>4、扩展模块设计</li>
				</ul>
			</div>
		</div>
    </div>


    <!-- step9 -->
    <div id="step9" class="step" data-x="4000" data-y="6000" data-scale="1">
        <div class="step9-body">
			<div class="step9-title"> Thank you!! </div><br>
			<div class="step9-title"> Q&A </div>
		</div>
    </div>

    <div id="overview" class="step" data-x="3000" data-y="1500" data-scale="10"></div>

</div>
</body>

<script src="js/impress.js"></script>
<script>

impress().init();

$(document).ready(function() {
    var Server;
    var call = impress();

    function send( text ) {
        Server.send( 'message', text );
    }

    Server = new FancyWebSocket('ws://115.28.169.16:9300');
    
    /* 3 socket function */
    Server.bind('open', function() {
    
    });
    Server.bind('close', function( data ) {
    
    });

    Server.bind('message', function( payload ) {
        if( payload == 'left'){
            call.prev();
        }else if( payload == 'right' ){
            call.next();
        }else if( payload == 'reload' ){
            location.reload();
        }else if( (int)payload>0 && (int)payload<8 ){
        	call.goto(payload);
        }
        send('sent');
    });

    call.goto(4);

    Server.connect();
});
</script>

<?php
    }else{
        header("refresh:3;url=index.php");
        echo'<br><br><br><div class="text-center">Password error!!<br><br>Go back in 3 second !!</div>';
    }      
}else{
?>
    <div class="check">
        <form method="get" action="index.php">
            <div class="control">
                <input class="form-control" name="password" type="text" placeholder="请输入密码">
            </div>
            <br><br>
            <button class="btn btn-success">确认</button>
        </form>
    </div>
<?php
}
?>

</html>

