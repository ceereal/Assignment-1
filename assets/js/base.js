$("body").ready(function(){
  console.log('test');

});

$("#playerInventory").on("click", ".botPiece", function(){
  console.log('test');
  var token = $(this).parent().attr("data-token");

  query = $.ajax({url : '<?php echo base_url("index.php/assembly/get_collection_by_token', method: 'POST', data : {"token" : token}, dataType:'json'});

	query.success(function(data){
		console.log(data[0]);
	});

	query.error(function (jqXHR, textStatus, errorThrown){
			alert('Error with the connection: ' + textStatus + " " + errorThrown);
	});


});
