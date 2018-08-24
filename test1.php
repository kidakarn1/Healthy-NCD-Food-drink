<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <script src="js/jquery-3.1.1.min.js"></script>
  <title>Document</title>
 </head>
 <body>
  <form method="post" action="">
	<input type="text" name="fname">
	<input type="text" name="lname">
	<input type="submit" id="test1">
  </form>
<script type="text/javascript">

$(function(){
$('#test1').click(function(){
	var url='post.php';
	$.post(url,{name:$('input[name=fname]').val()
				},function(data){
	
	alert(data);
		});
    });
});

</script>
 </body>
</html>
