<!DOCTYPE html>
<html>
	<head>
		<title>{title}</title>
		<meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="-------"/>  //enter stylesheet location 
	</head>
	<body>
		<div class="navbar">
			<div class="leftNav">
				<h1>{title}</h1> 
			</div>           
			<div class="midNav"> 
				{options} // changing options - justify content 
			</div>
			<div class="rightNav">
				{signOptions} //user or login 
			</div>

		</div>
		<div id="body">
                {content}
		</div>
	</body>
</html>