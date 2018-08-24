<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>amplysoft.com</title>
  <script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
 <form action="">
 <input type="text" name="fname">
 	<button type="submit" id="kkk">kkk</button>
 </form>
<div id="test1"></div>
<script type="text/javascript">
$(function(){
	 $("#kkk").click(function(){
	// $(document).ready(function(){
		// var url="post.php";
		// $.post(url,{fname:$('input[name=fname]').val} ,function(data){
 	//   $('#test1').html(data);
 	// 	  alert('555');
		// 	});

		$.post("post.php",{
			name:$('input[name=fname]').val(),
			name:$('input[name=fname]').val()

		},function(data){
			alert(data);

		});
	// });
	});
 });

</script>

</body>
</html>