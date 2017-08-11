$(document).ready(function(){
	//Github
	$('.git').mouseenter(function(){
		$('.a').css('color','#FFF').css('background-color','#4C9ED9');
	});
	$('.git').mouseleave(function(){
		$('.a').css('color','#4C9ED9').css('background-color','transparent');
	});

	//Slack
	$('.slack').mouseenter(function(){
		$('.b').css('color','#FFF').css('background-color','#4C9ED9');
	});
	$('.slack').mouseleave(function(){
		$('.b').css('color','#4C9ED9').css('background-color','transparent');
	});

	//Dropbox
	$('.drop').mouseenter(function(){
		$('.c').css('color','#FFF').css('background-color','#4C9ED9');
	});
	$('.drop').mouseleave(function(){
		$('.c').css('color','#4C9ED9').css('background-color','transparent');
	});

	//Dropbox
	$('.wallet').mouseenter(function(){
		$('.d').css('color','#FFF').css('background-color','#4C9ED9');
	});
	$('.wallet').mouseleave(function(){
		$('.d').css('color','#4C9ED9').css('background-color','transparent');
	});
});
