<script src="https://js.paystack.co/v1/inline.js"></script>
<div id="paystackEmbedContainer"></div>

<script>
  PaystackPop.setup({
   key: 'pk_test_12bfd5bafee3115f39584ca04ec580e10bf8a16a',
   email: '<?php echo $email; ?>',
   amount: '<?php echo $amt; ?>',
   container: 'paystackEmbedContainer',
   callback: function(response){
      alert('successfully subscribed. transaction ref is ' + response.reference);
      $.ajax({
				type: "POST",
				url: "../module/ad/updatepayment",
				data: 'id='+ '<?php echo $ad_id ?>' +'&paid='+ 1,
				cache: false,
				success: function(data){
					if (data == "Updated") {
            $('.paycont').removeClass('hide');
					} else {
						console.log(data);
					}
				}
			});
      // window.location.replace('success.php');
    },
  });
</script>
