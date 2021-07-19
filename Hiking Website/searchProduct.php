<?php include "HikerHome.php";?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Live Search</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>
	<body>
		<div class="wrapper">
<div class="main_container">
<div class="item">
		
			<br />
			<br />
			<br />
			<div class="form-group">
					<div class="input-group">
					<input type="text" id="search_text" placeholder="You Can Search By Name OR price" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		

	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetchProduct.php",
			method:"post",
			data:{query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>



</div>
</div>
</div>
</body>
</html>