<? include("lock.php");
if(isset($_GET['id'])) {$id=$_GET['id'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Страница редактирования сайта друга</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top">

<?

if(!isset($id))
{

echo "<p class='chose_link'>Выберите ссылку для редактирования</p>";

$result=mysql_query("SELECT id, title FROM friends");
$myrow=mysql_fetch_array($result);

do
{
printf("<p class='edit'><a href='edit_friend.php?id=%s' class='edit_link'>%s</a></p>", $myrow['id'], $myrow['title']);
}

while($myrow=mysql_fetch_array($result));
}

else

{
$result=mysql_query("SELECT * FROM friends WHERE id=$id");

if($result)
{
$myrow=mysql_fetch_array($result);

echo "<p class='edit_post'>Редактирование сайта друга</p>";
	
print <<<HERE

<form name='form1' class='form' method='post' action='update_friend.php'>
	<p>
		<label>Введите название сайта друга<br>
			<input type="text" name="link" value="$myrow[link]"><br>
	<br></label>
		</p>
	<p>
		<label>Введите ссылку на сайт друга<br>
			<input type="text" name="title" value="$myrow[title]"><br>
	<br></lable>
		</p>
			<input type="hidden" name="id" value="$myrow[id]">
	<p>
		<label>
			<input type="submit" name="submit" value="Сохранить изменения" class='submit'>
		</lable>
	</p>

</form>

HERE;
}

else
{

echo "<p class='chose_link'>Выберите ссылку для редактирования</p>";

$result=mysql_query("SELECT id, title FROM friends");
$myrow=mysql_fetch_array($result);

do
{
printf("<p class='edit'><a href='edit_friend.php?id=%s' class='edit_link'>%s</a></p>", $myrow['id'], $myrow['title']);
}

while($myrow=mysql_fetch_array($result));
}

}

?>

</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
