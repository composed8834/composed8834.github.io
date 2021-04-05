<? include("blocks/bd.php");
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (isset($id)) {$id=1;};
$result=mysql_query("SELECT * FROM about_blog WHERE page='blog'");
if(!$result)
{
echo"<p>Запрос на выборку данных из базы не прошёл. Напишите об этом администратору admin@russeler.com<br><strong>Код ошибки:</strong></p>";
exit(mysql_error());
}
if(mysql_num_rows($result)>0)
{
$myrow=mysql_fetch_array($result);
}
else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей</p>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="<?php echo $myrow['meta_d'];  ?>" />
<meta name="keywords" content="<?php echo $myrow['meta_k']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title><? $myrow['title']; ?></title>
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
<td class="right" valign="top">
<?
echo "<p class='about_webmaster' align='center'><br>О блоге ВебМастера</p>";
echo "<div class='webmaster_under'>".$myrow['about']."</div>";
?><br /><br />
<div align="center"><img src="<? echo $myrow['img'] ?>" /></div><br />
<br /><div class="webmaster_text"><? echo $myrow['about_blog'] ?></div>
</td>
</tr>
</table>
</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
