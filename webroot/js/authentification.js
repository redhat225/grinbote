$(document).ready(function(){

	//manage authentification form
	// $("form").attr("id","authentication-form");
	$("form").on("submit",function(e){
			e.preventDefault();
			var isErrorFree= true;

			$("input.required",this).each(function(){
					if(validateElement.isValid(this)==false)
					    isErrorFree = false;
					});
					if (isErrorFree){
				  	var $form=$(this);
					$.ajax({
						beforeSend : function(){
							$(".loaderAjax").fadeIn();
							$("#submit-login-admin").fadeOut();
						},
						type:'POST',
						data : $form.serialize(),
						url: "/grinBote/",
						dataType:"text",
						success:function(data){
							if(data=="ko")
							{
								$("#mainModal-suiviAdmin h6").text("Login/Mot de passe incorrects veuillez réessayer");
								$("#mainModal-suiviAdmin").openModal({
									'dismissible' : false
								});
							}
							else
							window.location.href="/grinBote/sales";
								},
						complete : function(){
							$(".loaderAjax").fadeOut();
							$("#submit-login-admin").fadeIn();
						}
					});
				  }
				  else
				  	return false;
	});

});

//client Side Validator
	validateElement = {
		
		isValid:function(element){
				var isValid= true;
				var $element=$(element);	
				var id=$element.attr('id');
				var name=$element.attr('name');
				var value= $element.val();

				var type=$element[0].type.toLowerCase();

				switch(type){				
					case 'password':
							if(!/^[a-z0-9_-]{8,25}$/i.test(value)){
								isValid = false;
							}
					break;

					case 'tel' : 
					     if(!/^[0-9]{8}$/.test(value)){
					     	isValid = false;
						}
					break;

				}//end switch
			
			var method=isValid? 'valid' : 'invalid' ;
			
			 if(isValid)
			 	$element.removeClass('invalid').addClass(method);
			 else
			 	$element.removeClass('valid').addClass(method);

			 $element.unbind('change.isValid')
			 	.bind('change.isValid', function(){validateElement.isValid(this);});
				
			return isValid;

		}

	};