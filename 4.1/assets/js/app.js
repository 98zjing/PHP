$(function(){
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
//
function run(){
	start();
	UserGame();
	startBtn();
}
function start(){
	$(".field button").attr("class","btn img_tic").removeAttr("disabled");
}
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
						alert("赢了");
						window.location.href = "index.php?template=2";
					}
					if(data.game == "computer"){
						alert("输了");
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
function computer(id){
		$("#" + id).attr("class","btn img_tic x").attr("disabled","");
	$.ajax({
			url:"index.php",
			data:{ajax:"y",index:id-1,where:"computer"},
			dataType:"json",
			success:function(data){
				load(data);
				if(data.game){
					if(data.game == "user"){
						alert("赢了");
						window.location.href = "index.php?template=2";
					}
					if(data.game == "computer"){
						alert("输了");
						window.location.href = "index.php?template=2";
					}
					disabled();
				}
			}
	});
}
//
function load(data){
	start();
	if(data.user){
		for(var i=0;i<data.user.length;i++){
			$(".field").eq(data.user[i]).children("button").attr("class","btn img_tic o").attr("disabled","");
		}
	}
	if(data.computer){
		for(var i=0;i<data.computer.length;i++){
			$(".field").eq(data.computer[i]).children("button").attr("class","btn img_tic x").attr("disabled","");
		}
	}
	if(data.alert){
		$('.alert ').html(data.alert);
		disabled();
	}
}
//
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
function disabled(){
	$(".field button").attr("disabled","");
}