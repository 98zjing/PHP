$(function(){
	hide();
	$("#run").show();
	ThisShow();
	preventD();
	var app = new Bas({
				data:[],
				user:[],
				computer:[],
				addUser:0,
				addComputer:0
	});
	app.Init();
	app.game();


	//初始都为隐藏
	function hide(){
		$("#run").hide();
		$("#game").hide();
		$("#data").hide();
	}
	//
	function ThisShow(){
		$(".start").on("click",function(){
			hide();
			$("#game").show();
			app.Init();
		});
	}
	function preventD(){
		$("input[type='submit']").on("click",function(e){
			e.preventDefault();
		});
		$("a").on("click",function(e){
			e.preventDefault();
		});
	}
})
