function validate() {
	$("form :input").blur(function(){
		var $parent = $(this).parent();
		$parent.prev(".formtips").remove();
		//验证学号
		if($(this).is('#number')){
			if(!(/^20\d{8}$/.test(this.value))){
				var errorMsg = '学号不符合要求';
				$parent.before('<span class="formtips onError">'+errorMsg + '</span>');
			}else{
				var okMsg = '';
				$parent.before('<span class = "formtips onSuccess">'+okMsg + '</span>');
			}
		}
		//验证姓名
		if($(this).is('#name')){
			if(this.value ==""){
				var errorMsg = "姓名不能为空";
				$parent.before('<span class="formtips onError">'+errorMsg + '</span>');
			}else{
				var okMsg = '';
				$parent.before('<span class = "formtips onSuccess">'+okMsg + '</span>');
			}
		}
		//验证QQ
		if($(this).is('#QQ')){
			if(!(/^[1-9]\d{4,10}$/.test(this.value))){
				var errorMsg = "QQ号不存在";
				$parent.before('<span class="formtips onError">'+errorMsg + '</span>');
			}else{
				var okMsg = '';
				$parent.before('<span class = "formtips onSuccess">'+okMsg + '</span>');
			}
		}
		//验证验证码
		if($(this).is('#code')){
			if(this.value==""){
				var errorMsg = "验证码必须填写";
				$parent.before('<span class="formtips onError">'+errorMsg + '</span>');
			}else{
				var okMsg = '';
				$parent.before('<span class = "formtips onSuccess">'+okMsg + '</span>');
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