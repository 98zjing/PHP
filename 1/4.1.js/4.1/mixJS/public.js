/*
	data:可走地方
	user:玩家走过的地方
	computer:电脑走过的地方
	addUser:玩家步数
	addComputer:电脑步数
*/
function Bas(data){
	this.data = [0,1,2,3,4,5,6,7,8];
	this.user = [];
	this.computer = [];
	this.addUser = 0;
	this.addComputer = 0;
	this.mix = [
				[0,1,2],
				[3,4,5],
				[6,7,8],
				[0,3,6],
				[1,4,7],
				[2,5,8],
				[0,4,8],
				[2,4,6]
			];
	this.where = null;
}
//开始新的游戏
Bas.prototype.Init = function(){
	$(".field button").attr("class","btn img_tic").removeAttr("disabled");
	this.data = [0,1,2,3,4,5,6,7,8];
	this.user = [];
	this.computer = [];
	this.addUser = 0;
	this.addComputer = 0;
	this.InitMovers();
	this.where = null;
}
//玩家玩游戏
Bas.prototype.game = function(){
	var th = this;
	$(".field button").on("click",function(){
		$(this).attr("class","btn img_tic o").attr("disabled","");
		var index = $(this).attr("id") -1;
		th.userMovers();
		th.unData("user",index);
		if(th.mixs(th.user) ){
			th.where = "You Win!!";
			alert("赢了！");
			th.datas();
		}else {
			th.computerGame();
		}
	});
}
//电脑走棋
Bas.prototype.computerGame = function(){
	var len = this.data.length;
	var index = Math.floor(Math.random()*len);
	$(".field").eq(this.data[index]).children("button").attr("class","btn img_tic x").attr("disabled","");
	this.unData("computer",this.data[index]);
	this.computerMovers();
	if(this.mixs(this.computer) ){
			this.where = "Computer Win!!";
			alert("输了！");
			this.datas();
	}
}
//玩家步数
Bas.prototype.userMovers = function(){
	this.addUser++;
	$(".usermoves").html(this.addUser);
}
//电脑步数
Bas.prototype.computerMovers = function(){
	this.addComputer++;
	$(".computermoves").html(this.addComputer);
}
//步数初始化
Bas.prototype.InitMovers = function(){
	$(".moves").html("0");
}
//删除走过的地方
Bas.prototype.unData = function(where,index){
	var th = this;
	switch (where) {
		case "user":
			for(var i=0;i<th.data.length;i++){
				if(th.data[i] == index){
					th.data.splice(i,1);
					th.user.push(index);
				}
			}
			break;
		case "computer":
			for(var i=0;i<th.data.length;i++){
				if(th.data[i] == index){
					th.data.splice(i,1);
					th.computer.push(index);
				}
			}
			break;
		default:
			// statements_def
			break;
	}
}
//判定
Bas.prototype.mixs = function(data){
	for(var i=0;i<this.mix.length;i++){
		var index = 0;
		for(var k=0;k<data.length;k++){
			for(var j=0;j<this.mix[i].length;j++){
				if(data[k] == this.mix[i][j]){
					index++;
				}
			}
		}
		if(index>=3){
			return true;
		}
	}
}
//游戏结束重新加载游戏界面
Bas.prototype.datas = function(){
	$(".container-game").hide();
	$("#data").show();
	$(".usermoves").html(this.addUser);
	$(".computermoves").html(this.addComputer);
	$(".field button").attr("disabled","");
	$("#where").html(this.where);
	for(var i=0;i<this.user.length;i++){
		$("#data .game .field").eq(this.user[i]).children("button").attr("class","btn img_tic o");
		console.log($(".field").eq(this.user[i]).children("button").attr("class"));
	}
	for(var k=0;k<this.computer.length;k++){
		$("#data .game .field").eq(this.computer[k]).children("button").attr("class","btn img_tic x");
	}
}