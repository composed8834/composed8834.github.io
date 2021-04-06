<? include ("blocks/bd.php");
if(isset($_POST['search']))
{
$search=$_POST['search'];
}
if(isset($_POST['submit_s']))
{
$submit_s=$_POST['submit_s'];
}

if(isset($submit_s))
{
if(empty($search) or strlen($search)<4)
{
exit("<p>Поисковый запрос не введён, либо он менее 4-х символов.</p>");
}

$search=trim($search);
$search=htmlspecialchars($search);
$search=stripslashes($search);

}
else
{
echo "<p>Вы обратились к файлу без необходимых параметров</p>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title><?php echo "Заметки по запросу $search"; ?></title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" align="center" cellspacing="0" cellpadding="0" class="main_border">
<? include("blocks/header.php"); ?>
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top" align="center">

<? $n=0; include("blocks/nav.php"); ?>

<br />
<?php 

$result=mysql_query("SELECT id, title, description, date, author, mini_img, view FROM data WHERE MATCH (text) AGAINST('$search')", $db);

if(!$result)
{
echo "<p>Запрос на выборку данных из базы не прошёл. Напишите об этом администратору admin@russeler.com. <br/> <strong>Код ошибки:</strong> </p>";
exit(mysql_error());
}

if(mysql_num_rows($result)>0)
{
$myrow=mysql_fetch_array($result);
do
{
printf("<br><table class='post'>
	<tr>
		<td class='post_title'>
		<p class='post_name'><img align='left' src='%s' class=post_img><a href='view_post.php?id=%s'>%s</a></p>
		<p class='post_add'>Дата добавления: %s</p>
		<p class='post_add'>Автор урока: %s</p></td>
	</tr>
	<tr>
		<td class='under_post_add'><p>
		%s</p><p class='post_view'>Проссмотров: %s</p>
		</td>
	</tr>
</table><br><br>", $myrow['mini_img'], $myrow['id'], $myrow['title'], $myrow['date'], $myrow['author'], $myrow['description'], $myrow['view']);
}
while($myrow=mysql_fetch_array($result));
}
else
{
echo "<p>Информация по вашему запросу на блоге не найдена.</p>";
exit();
}

 ?></td>
</tr>
</table>
</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
