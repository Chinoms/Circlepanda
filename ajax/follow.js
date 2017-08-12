$(".follow").on('click', function(){
	event.preventDefault();
	var user_id = $(this).attr('data-userid');
	var check = $(".follow").attr('data-set');
	var count = $(".countfollowers").text();
	switch (check) {
		case 'follow':
			$.ajax({
				type: "POST",
				url: "../module/follow/user",
				data: 'user_id='+ user_id,
				cache: false,
				success: function(data){
					if (data == "Follow successful") {
						$(".follow").addClass('active');
						$(".follow").html('Following <i class="fa fa-check-circle"></i>');
					} else if (data == "Succesfully Unfollowed") {
						$(".follow").removeClass('active');
						$(".follow").html('Follow');
					}
				}
			});
			break;
		default:
		return;
	}
});

/*
$(".follow-btn").on('click', function(evt){
	evt.preventDefault();
	$(this).addClass('active');
});
*/
