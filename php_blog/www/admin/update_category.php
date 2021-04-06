<? include("lock.php");
if (isset($_POST['title']))
{
$title=$_POST['title'];
}
if (isset($_POST['meta_d']))
{
$meta_d=$_POST['meta_d'];
}
if (isset($_POST['meta_k']))
{
$meta_k=$_POST['meta_k'];
}
if (isset($_POST['text']))
{
$text=$_POST['text'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Страница редактирования заметки</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top">
<?

if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text))
{
$result=mysql_query("UPDATE categories SET title='$title', meta_d='$meta_d', meta_k='$meta_k', text='$text' WHERE id='$id'");

if($result=='true')
{
echo "<p>Ваша категория успешно обновленна</p>";
}
else
{
echo "<p>Ваша категория не обновленна</p>";
}
}
else
{
echo "<p>Вы ввели не всю информацию, поэтому категория в базе не может быть обновленна</p>";
}
?>
</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>

