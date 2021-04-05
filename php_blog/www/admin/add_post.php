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
if (isset($_POST['date']))
{
$date=$_POST['date'];
}
if (isset($_POST['description']))
{
$description=$_POST['description'];
}
if (isset($_POST['text']))
{
$text=$_POST['text'];
}
if (isset($_POST['author']))
{
$author=$_POST['author'];
}
if (isset($_POST['img']))
{
$img=$_POST['img'];
}
if (isset($_POST['cat']))
{
$cat=$_POST['cat'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Untitled Document</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top">

<?
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author) && isset($img) && isset($cat))
{
$result=mysql_query("INSERT INTO data (title, meta_d, meta_k, date, description, text, author, mini_img, cat) VALUES ('$title', '$meta_d', '$meta_k', '$date', '$description', '$text', '$author', '$img', '$cat')");

if($result=='true')
{
echo "<p>Ваша заметка успешно добавленна</p>";
}
else
{
echo "<p>Ваша заметка не добавленна</p>";
}

}
else
{
echo "<p>Вы ввели не всю информацию поэтому заметка в базу не может быть добавленна<p>";
}
?>
</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
