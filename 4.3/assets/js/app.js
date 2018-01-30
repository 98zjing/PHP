$(function(){
	$("#hots").css("display","none");
	$(".time").html( " 0 sec");
	run();
	$.ajax({
		url:"index.php",
		data:{ajax:"y",where:"load"},
		dataType:"json",
		success:function(data){
			load(data);
		}
	});
})
//游戏入口
function run(){
	start();
	UserGame();
	startBtn();
	moves();
	addTime();
	dataSubmit();
}
//新游戏开始模板清空
function start(){
	$(".field button").attr("class","btn img_tic").removeAttr("disabled");
}
//用户玩游戏
function UserGame(){
	$(".field button").click(function(){
		$(this).attr("class","btn img_tic o").attr("disabled","");
		var index = $(this).attr("id") -1;
		$.ajax({
			url:"index.php",
			data:{ajax:"y",index:index,where:"user"},
			dataType:"json",
			success:function(data){
				if(data.game){
					if(data.game == "user"){
						load(data);
						clearInterval(timer);
						alert("赢了");
						window.location.href = "index.php?template=2";
					}
					disabled();
				}else{
					computer(data.index);
					load(data);
				}
			}
		});
	});
}
//电脑走棋
function computer(id){
		$("#" + id).attr("class","btn img_tic x").attr("disabled","");
		//电脑步数
	$.ajax({
			url:"index.php",
			data:{ajax:"y",index:id-1,where:"computer"},
			dataType:"json",
			success:function(data){
				if(data.game){
					if(data.game == "computer"){
						load(data);
						alert("输了");
						window.location.href = "index.php?template=2";
					}
					disabled();
				}else{
					load(data);
				}
			}
	});
}
//页面重新加载游戏数据保留，防止不被刷新
function load(data){
	start();
	//玩家走过的地方
	if(data.user){
		for(var i=0;i<data.user.length;i++){
			$(".field").eq(data.user[i]).children("button").attr("class","btn img_tic o").attr("disabled","");
		}
	}
	//电脑走过的地方
	if(data.computer){
		for(var i=0;i<data.computer.length;i++){
			$(".field").eq(data.computer[i]).children("button").attr("class","btn img_tic x").attr("disabled","");
		}
	}
	//获胜
	if(data.alert){
		if(data.alert != false){
			$('.alert ').html(data.alert);
			disabled();
		}
	}
	//玩家的步数
	if(data.addUser){
		addMoves("user",data.addUser);
	}	
	//电脑的步数
	if(data.addComputer){
		addMoves("computer",data.addComputer);
	}
	if(data.time){
		$(".time").html(data.time + " sec");
	}
}
//开始新的游戏，所有数据初始化
function startBtn(){
	$(".start").click(function(){
		$.ajax({
			url:"index.php",
			dataType:"json",
			data:{ajax:"y",where:"start"},
			success:function(data){
				alert();
				start();
			}
		});
	});
}
//游戏结束游戏模版禁止点击
function disabled(){
	$(".field button").attr("disabled","");
}
//新游戏开始初始化玩家与电脑的走棋步数
function moves(){
	$(".moves").html("0");
}
//步数添加
function addMoves(where,add){
	switch(where){
		case "user":
			$(".usermoves").html(add);
			break;
		case "computer":
			$(".computermoves ").html(add);
			break;
	}
}
//游戏开始计时器添加
var timer = null;
function addTime(){
	timer = setInterval(function(){
		$.ajax({
			url:"index.php",
			dataType:"json",
			data:{ajax:"y",where:"time"},
			success:function(data){
				if(data.time){
					$(".time").html(data.time + " sec");
				}
				if(data.untime){
					clearInterval(timer);
				}
			}
		});
	},1000);
}
//数据提交为空时提示
function dataSubmit(){
	$(".ok").on("click",function(e){
		if($("#nickname").val() == ""){
			$("#hots").css("display","block");
			e.preventDefault();
		}
	});
}