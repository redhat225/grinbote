$(document).ready(function(){
	$("#add-new-item,#add-cart-bills").on("click",function(e){
		e.preventDefault();
		//ajaxCaller
		$.get(
				'/grinBote/baskets/add',
				{},
				function(data){$("#related-adding-basket-cart").append(data);
					triggerRetired();
					triggerCancel();
					managePrevTotal();
					$(".related-adding-basket-content").removeClass("hidden");
				}
			);
	});


	//manage cart-form

	$("#form-cart-prestation").on("submit",function(e){
			e.preventDefault();
			var isErrorFree= true;

				$("input.required",this).each(function(){
					if(validateElement.isValid(this)==false)
					    isErrorFree = false;
				});

				if($("tbody tr",this).length==0)
						isErrorFree=false;

				if(isErrorFree)
				{
					var $form=$(this);
					$.ajax({
						beforeSend : function(){
						   $("div.ajaxLoader").removeClass('hidden');
						   $(".related-adding-basket-content").fadeOut();
						// $("span#error-login-admin-content").fadeOut();
						},
						data : $form.serialize(),
						dataType:'text',
						url:'/grinBote/baskets/add',
						type:'POST',
						success:function(data){
							if(data==="ok")
								window.location.reload();
							else
								alert(data);

								},
						complete : function(){
						   $("div.ajaxLoader").addClass('hidden');
						   $(".related-adding-basket-content").fadeIn();
						}
					});	
				}
	});


	$("#confirmPrinted").on('click',function(e){
		e.preventDefault();
		var $isErrorFree=true;
		//get CSRF Token
		var $csrftoken=getCookie('csrfToken');
		var $idBill=$("#confirmPrinted").attr("bills");
		var $totalprinted=parseInt($("#totalprinted").text());
		var $reward=parseInt($("#tremise").val());
			if($reward>=0)
			{
				$isErrorFree=true;
			}
		var $isPrinted=$("#confirmPrinted").attr("printed");


		if($isPrinted=="1")
		{
			window.location.href="/grinBote/sales/view/"+$idBill+".pdf";
		}
		else{
			  if($isErrorFree)
			  {
				$.ajax({
						beforeSend:function(xhr, settings){
							xhr.setRequestHeader("X-CSRF-Token", $csrftoken);
						},
						dataType:'text',
						data:'id='+$idBill+"&reward="+$reward+"&total="+$totalprinted,
						url:'/grinBote/sales/printed',
						type:'POST',
						success:function(data){
							window.location.href="/grinBote/sales/view/"+$idBill+".pdf";
						}
				});
			  }
			  return false;
			}

    });

});

function triggerRetired(){	
		$("i.retired-basket-item").on('click',function(e){
		e.preventDefault();
		var $selectedItemLine=$(this).parents('tr');
		// var $currentTotal=parseInt($("#tfacture").val());
		// var $selectedLineTotal=	parseInt($selectedItemLine.find("input.required.pfacture").val());
		// alert($selectedLineTotal);
		// $("#tfacture").val($currentTotal-$selectedLineTotal);
		$selectedItemLine.fadeOut().remove();
		checkEmptyTr();
	});
}

function checkEmptyTr()
{
		if($("#form-cart-prestation tbody").find("tr").length==0)
		 $("#reset-add-new-basket-trigger").trigger("click");
}

function triggerCancel(){
	$("#reset-add-new-basket-trigger").on("click",function(e){
		$("#related-adding-basket-cart tr").each(function(){
				$(this).remove();
		});
		$(".related-adding-basket-content").addClass("hidden");
	});

}

function manageTotalList(){
			var $tfacture=0;
			$('input.required.pfacture').each(function(){
					if(parseInt($(this).val())>0)
						$tfacture+=parseInt($(this).val());
			});
				$("#tfacture").val("");
				$("#tfacture").val(($tfacture));
}

function managePrevTotal()
{
	$(".basket-item").each(function(){
		var $cell1,$cell2="";
		var $currentLine=$(this);
			$("td:eq(1)",this).on('change',function(e){
				 $cell1=$("input",this).val();
				 if(($cell2!="" && $cell2>0) && ($cell1!="" && $cell1>0))
				 {
				 	$total=parseInt($cell1*$cell2);
				 	$currentLine.find("td.basket-item-total input").val($total);
				 	manageTotalList();
				 }
				 else
				 	{
				 		$total=parseInt(0);
				 		$currentLine.find("td.basket-item-total input").val($total);
				 	}
			});

			$("td:eq(2)",this).on('change',function(e){
				 $cell2=$("input",this).val();
				 if( ($cell1!="" && $cell1>0) && ($cell2!="" && $cell2>0) )
				 {
				 	$total=parseInt($cell1*$cell2);
				 	$currentLine.find("td.basket-item-total input").val($total);
				 	manageTotalList();
				 }
				 else
				 {
				 	$total=parseInt(0);
				 	$currentLine.find("td.basket-item-total input").val($total);
				 }
			});
	});
}

// using jQuery
function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie !== '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) === (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}

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
					case 'text':
							if (!/^[a-z0-9_-]{2,25}$/i.test(value))
								isValid = false;
					break;

					case 'file':
							if(value=="")
							 isValid = false;
					break;						
					case 'password':
							if(!/^[a-z0-9_-]{8,25}$/i.test(value)){
								isValid = false;
							}
					break;
					case 'number':
							if(!/^[0-9]{1,9}$/.test(value) || value<0 || value==="" || value==0){
								isValid = false;
							}
					break;
					case 'textarea' :
						if(value.length == 0 || value.replace(/\s/g,'').length == 0 )
						{
							isValid = false;
						}else
						{
							if(!/^[a-z0-9\s-!?()éè&àùê'./]{2,150}$/i.test(value)){
						 	isValid = false;
						 }
						}
					break;

					case 'email' : 
						 if(!/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/i.test(value)){
						 	isValid = false;
						 }
						    break;

					case 'tel' : 
					     if(!/^([0-9]{2}){4}$/.test(value)){
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
