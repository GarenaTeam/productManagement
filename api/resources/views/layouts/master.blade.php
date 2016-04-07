<!DOCTYPE html>
<html lang="en">
<head>
    @yield("head.title")
    <meta charset="utf-8">
    
    @yield("head.style")
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body >
	<div >
	    @yield("body.content")
	</div>
    @yield("body.js")

</body>
</html>