<? include("lock.php");
if (isset($_POST['title']))
{
$title=$_POST['title'];
}
if (isset($_POST['link']))
{
$link=$_POST['link'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Страница добавления нового сайта друга</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top">

<?
if (isset($title) && isset($link))
{
$result=mysql_query("INSERT INTO friends (title, link) VALUES ('$title', '$link')");

if($result=='true')
{
echo "<p>Ваш сайт успешно добавлен</p>";
}
else
{
echo "<p>Ваша сайт не добавлен</p>";
}

}
else
{
echo "<p>Вы ввели не всю информацию поэтому сайт в базу не может быть добавлен<p>";
}
?>
</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
