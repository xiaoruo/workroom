
function mouseHover() {
	$("a.nav-bgd").hover(
		function() {
			$(this).stop()
				.animate({
					"background-color": "#4CD9C0",
					"color": "#fff"
				}, 400);
		},
		function() {
			$(this).stop()
				.animate({
					"background-color": "#42566E",
					"color": "#4CD9C0"
				}, 400);
		});
	$(".search-right :submit").hover(
		function() {
			$(this).stop()
				.animate({
					"background-color": "#fff",
					"color": "#3D4F67"
				}, 400);
		},
		function() {
			$(this).stop()
				.animate({
					"background-color": "#8DB4C5",
					"color": "#fff"
				}, 400);
		});
	$("#nav-new a.nav-bgd").hover(
		function() {
			$(this).stop()
				.animate({
					"background-color": "#4CD9C0",
					"color": "#fff"
				}, 400);
		},
		function() {
			$(this).stop()
				.animate({
					"background-color": "#fff",
					"color": "#4CD9C0"
				}, 400);
		});
	$("#relation").hover(
		function() {
			$(this).stop()
				.animate({
					"background-color": "#fff",
					"color": "#7191A8",
				}, 400);
		},
		function() {
			$(this).stop()
				.animate({
					"background-color": "#7191A8",
					"color": "#fff"
				}, 400);
		});
		$("#introduce a.join").hover(
		function() {
			$(this).stop()
				.animate({
					"background-color": "#4CD9C0",
					"color": "#fff",
				}, 400);
		},
		function() {
			$(this).stop()
				.animate({
					"background-color": "#fff",
					"color": "#4CD9C0"
				}, 400);
		});
}

function backTop() {
	$(window).scroll(function() {
		var scrollValue = $(window).scrollTop();
		scrollValue > 100 ? $('.backtop').fadeIn() : $('.backtop').fadeOut();
	});
	$('.backtop').click(function() {
		$("html,body").animate({
			scrollTop: 0
		}, 600);
	});
}

function showNav() {
	$(window).scroll(function() {
		var scrollValue = $(window).scrollTop();
		scrollValue > 600 ? $("#nav-new").fadeIn() : $("#nav-new").fadeOut();
	});
}

function skip() {
	$('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var $target = $(this.hash);
			$target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
			if ($target.length) {
				var targetOffset = $target.offset().top-80;
				$('html,body').animate({
						scrollTop: targetOffset
					},
					1000);
				return false;
			}
		}
	});
}


/*function onLoads() {
	var maxnum = 20; //设置加载最多次数
	var num = 1;
	var totalheight = 0;
	var main = $(".introduce-left"); //主体元素
	$(window).scroll(function() {
		var srollPos = $(window).scrollTop(); //滚动条距顶部距离(页面超出窗口的高度)
		totalheight = parseFloat($(window).height()) + parseFloat(srollPos);
		if (($(document).height()) <= totalheight && num != maxnum) {
			main.append("<div class='intro'></div>");
			num++;
		}
	});
}*/

function onLoads() {
	$(window).scroll(function() {
		var srollPos = $(window).scrollTop(); //滚动条距顶部距离(页面超出窗口的高度)
		totalheight = parseFloat($(window).height()) + parseFloat(srollPos);
		if (($(document).height()) <= totalheight) {
			$.getJSON('./js/introduce.json', function(data) {
				$.each(data, function(key, value) {
					var intro = $('<div>').addClass('intro').appendTo($('.introduce-left'));
					var h3 = $('<h3>').appendTo($(intro));
					var a1 = $('<a>').attr('href',$(value).attr('url')).appendTo($(h3));
					$(a1).append(value['name']);
					var p1 = $('<p>').appendTo($(intro));
					$(p1).append("指导教师：");
					var span1 = $('<span>').appendTo($(p1));
					$(span1).append(value['teacher']);
					var p2 = $('<p>').appendTo($(intro));
					$(p2).append("负责人：");
					var span2 = $('<span>').appendTo($(p2));
					$(span2).append(value['leader']);
					$(p2).append('　联系方式：');
					var span3 = $('<span>').appendTo($(p2));
					$(span3).append(value['phone']);
					$(p2).append('　QQ：');
					var span4 = $('<span>').appendTo($(p2));
					$(span4).append(value['qq']);
					var p3 = $('<p>').appendTo($(intro));
					$(p3).append('其他成员：');
					var span5 = $('<span>').appendTo($(p3));
					$(span5).append(value['member']);
					var p4 = $('<p>').appendTo($(intro));
					$(p4).append('地点：');
					var span6 = $('<span>').appendTo($(p4));
					$(span6).append(value['place']);
					var p5 = $('<p>').appendTo($(intro));
					$(p5).append('主要方向：');
					var span7 = $('<span>').appendTo($(p5));
				/*	console.log(value['direction']);
					$.each(direction,function(keys,values){
					});*/


				})
			})
		}
	})
}

function checkScrollSlide(){
	var srollPos = $(window).scrollTop(); //滚动条距顶部距离(页面超出窗口的高度)
		totalheight = parseFloat($(window).height()) + parseFloat(srollPos);
	return (($(document).height()) >= totalheight)?true:false;
}

function showShade(){
	var screenWidth = $(window).width();//当前窗口宽度
	var screenHeight = $(window).height();//当前窗口高度
	$("#relation").click(function(){
		$("#shade").css({"height":screenHeight});
		$("#shade").fadeIn();
		document.documentElement.style.overflow = "hidden";
	})
	$("#close").click(function(){
		$("#shade").fadeOut();
		document.documentElement.style.overflow = "visible";
	})
}

function changeColor(){
	$(".notice-main ul li :odd").css({"background-color":"#95B6C7","color":"#fff"});
	$(".notice-main ul li :even").css({"background-color":"color","color":"#95B6C7"});
}

function validate(){
	$("form :input").blur(function(){
		var $parent = $(this).parent();
		$parent.prev(".formtips").remove();
		if($(this).is('#problem')||$(this).is('#code')){
			if(this.value ==""){
				var errorMsg = "不能为空";
				$parent.before('<span class="formtips onError">'+errorMsg + '</span>');
			}else{
				var okMsg = '';
				$parent.before('<span class = "formtips onSuccess">'+okMsg + '</span>');
			}
		}
		if($(this).is('#QQ')){
			if(/^[1-9]\d{4,10}$/.test(this.value) && this.value){
				var okMsg = '';
				$parent.before('<span class = "formtips onSuccess">'+okMsg + '</span>');
				
			}else if(!(/^[1-9]\d{4,10}$/.test(this.value)) && this.value){
				var errorMsg = "QQ号码不存在";
				$parent.before('<span class="formtips onError">'+errorMsg + '</span>');
			}
		}
	})
	$("form :submit").click(function(){
		$("form :input").trigger('blur');
		var numError = $('form .onError').length;
		if(numError > 0){
			return false;
		}
	});
}