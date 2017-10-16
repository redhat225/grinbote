$(document).ready(function(){
		// //trigger sur le premier menu
		$("ul#game-gift-menu li.li-elements a:eq(0)").trigger("click");
		//paramètres globaux des requetes ajax
		// $.ajaxSetup({
		// 	cache:true,
		// 	error: function(){alert("Une érreur s'est produite veuillez réessayer");},
		// 	timeout:300000
		// });

});

		$("ul#game-gift-menu li.li-elements a.gg-li-a-elements").on('click',function(e){
				$(this).parent().parent().find("li.li-elements").removeClass("actived");
				$(this).parent("li.li-elements").addClass("actived");

		});

		//toggleClass Panel Admin & Gamer
		$(".hide-left-panel").on('click',function(e){
			$("#side-control-panel").toggleClass("hidden");
			$("#game-gift-variable-content").toggleClass("l10").toggleClass("l12");
			$(this).find(".custom-hidder").toggleClass("ion-ios-undo").toggleClass("ion-ios-redo");
			$(this).toggleClass("resizing-hidder-side-panel");
			$(".transparents-assets1").toggleClass("replace-transparent-assets1");
			$(".transparents-assets2").toggleClass("replace-transparent-assets2");
		});



		//toggleClass Panel Admin & Gamer
		$(".hide-left-panel-med-small-device").on('click',function(e){
			$("#side-control-panel").toggleClass("hidden");
			$(this).find(".custom-hidder").toggleClass("ion-arrow-up-b").toggleClass("ion-arrow-down-b");
			$(this).toggleClass("resizing-hidder-side-panel");
		});


		//accordion menu
		//accordion menu
		$("li.li-elements").on("click",function(){
				$(".submenu").addClass("hidden");
				$(this).find('.submenu').removeClass("hidden");
		});

		$(".submenu li").on('click',function(e){
				$(".submenu li").removeClass("activated-sub");
				$(this).addClass("activated-sub");

		});

$("table.striped").find("tr:odd").addClass("pink-sub black-text");
		// $("a.gg-li-a-elements").on('click',function(e){
		// 	e.preventDefault();
		// })
