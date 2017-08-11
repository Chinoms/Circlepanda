//Page Script

/* Messaging */
$(".Outbox,.Draft,.Spam,.Starred").hide();
$(document).ready(function(){

	$("#Inbox").click(function(){
		$(this).addClass('active');
		$("#Outbox, #Draft, #Spam, #Starred").removeClass('active');
		$(".Outbox, .Draft, .Spam, .Starred").hide();
		$(".Inbox").fadeIn(400);
	});

	$("#Outbox").click(function(){
		$("#Inbox, #Draft, #Spam, #Starred").removeClass('active');
		$("#Outbox").addClass('active');
		$(".Inbox, .Draft, .Spam, .Starred").hide();
		$(".Outbox").fadeIn(400);
	});

	$("#Draft").click(function(){
		$("#Outbox, #Spam, #Starred, #Inbox").removeClass('active');
		$("#Draft").addClass('active');
		$(".Outbox, .Spam, .Starred, .Inbox").hide();
		$(".Draft").fadeIn(400);
	});

	$("#Spam").click(function(){
		$("#Outbox, #Draft, #Inbox, #Starred").removeClass('active');
		$("#Spam").addClass('active');
		$("Outbox, .Draft, .Inbox, .Starred").hide();
		$(".Spam").fadeIn(400);
	});

	$("#Starred").click(function(){
		$("#Inbox, #Outbox, #Draft, #Spam").removeClass('active');
		$("#Starred").addClass('active');
		$(".Inbox, .Outbox, .Draft, .Spam").hide();
		$(".Starred").fadeIn(400);
	});

});

/* Notification */
$(".Like,.Post,.Share,.Request").hide();
$(document).ready(function(){

	$("#Overview").click(function(){
		$(this).addClass('active');
		$("#Like, #Post, #Share, #Request").removeClass('active');
		$(".Like, .Post, .Share, .Request").hide();
		$(".Overview").fadeIn(400);
	});

	$("#Like").click(function(){
		$("#Overview, #Post, #Share, #Request").removeClass('active');
		$("#Like").addClass('active');
		$(".Overview, .Post, .Share, .Request").hide();
		$(".Like").fadeIn(400);
	});

	$("#Post").click(function(){
		$("#Overview, #Like, #Share, #Request").removeClass('active');
		$("#Post").addClass('active');
		$(".Overview, .Like, .Share, .Request").hide();
		$(".Post").fadeIn(400);
	});

	$("#Share").click(function(){
		$("#Overview, #Post, #Like, #Request").removeClass('active');
		$("#Share").addClass('active');
		$(".Overview, .Post, .Like, .Request").hide();
		$(".Share").fadeIn(400);
	});

	$("#Request").click(function(){
		$("#Overview, #Post, #Like, #Share").removeClass('active');
		$("#Request").addClass('active');
		$(".Overview, .Post, .Like, .Share").hide();
		$(".Request").fadeIn(400);
	});

});
