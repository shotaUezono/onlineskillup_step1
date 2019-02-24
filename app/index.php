<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8" />
 <title>PHP sample </title>
</head>

<body>
<?php 

if (isset($_POST["comment"])){
	$comment = htmlspecialchars($_POST["comment"]);
	echo $comment;
}else{
?>
 <p>Please comment</p>
 <form method="POST" action="">
  <input name="comment" />
  <input type="submit" value="送信" />
 </form>
<?php
}
?>
</body>
</html>