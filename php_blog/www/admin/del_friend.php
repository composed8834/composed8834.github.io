<? include("lock.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Страница удаления сайта друга</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top">

<p class="choose_del">Выберите сайт для удаления</p>
	<form action="drop_friend.php" method="post" class="form">
<?

$result=mysql_query("SELECT id, title FROM friends");
$myrow=mysql_fetch_array($result);

do
{
printf("<p class='del'><input type='radio' name='id' value='%s'><lable>%s</label></p>", $myrow['id'], $myrow['title']);
}
while($myrow=mysql_fetch_array($result));

?>

<p><input type="submit" value="Удалить сайт друга" class="submit" /></p>
</form>

</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
