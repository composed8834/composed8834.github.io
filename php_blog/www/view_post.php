<? include("blocks/bd.php");
if (isset($_GET['id'])) {$id=$_GET['id'];}
if (!isset($id)) {$id=1;}

$result=mysql_query("SELECT * FROM data WHERE id='$id'", $db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошёл. Напишите об этом администратору admin@russeler.com. <br/> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result)>0)

{
$myrow=mysql_fetch_array($result);
$new=$myrow["view"]+1;
mysql_query ("UPDATE data SET view='$new' WHERE id='$id'", $db);
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

<? $n=0; include("blocks/nav.php"); ?>

<?

printf("<p class='comment' align='center'>%s</p><p class='post_comment'>Автор: %s</p><p class='post_comment'>Дата: %s</p><p class='text_comment'>%s</p><br><p class='view_comment'>Просмотров: %s</p>", $myrow["title"], $myrow["author"], $myrow["date"], $myrow["text"], $myrow["view"]);

echo "<p class='under_view_comment'>Коментарии к этой заметке:</p>";

$result3=mysql_query("SELECT * FROM comments WHERE post='$id'", $db);

if(mysql_num_rows($result3)>0)
{
$myrow3=mysql_fetch_array($result3);

do
{
printf ("<p class='comment_add'>Коментарй добавил(а): <strong>%s</strong><br> Дата: <strong>%s</strong></p><br> 
<p class='under_comment_add'>%s</p>", $myrow3['author'], $myrow3['data'], $myrow3['text']);
}
while($myrow3=mysql_fetch_array($result3));
}

$result4=mysql_query("SELECT img FROM comment_setting", $db);
$myrow4=mysql_fetch_array($result4);

?>

<p class="post_your_comment">Добавить ваш коментарий:</p>
<form action="comment.php" method="post" name="form_com" class="form_comment">
<p class="comment_name"><label>Ваше имя:</label> <input type="text" name="author" size="30" maxlength="30" onkeyup="this.style.backgroundColor='yellow'" onblur="this.style.backgroundColor='white'" /></p>
<p class="comment_text"><label>Текст коментария: <br /> <textarea name="text" cols="32" rows="4" onkeyup="this.style.backgroundColor='yellow'" onblur="this.style.backgroundColor='white'" ></textarea></label></p>
<p class="comment_figure">Введите сумму чисел с картинки<br /><br /><img src="<? echo $myrow4['img']; ?>" width="81" height="43" />
<input type="text" name="pr" size="5" maxlength="5" onkeyup="this.style.backgroundColor='yellow'"
 onblur="this.style.backgroundColor='white'" /></p>
<input type="hidden" name="id" value="<? echo $id; ?>" />
<p class="comment_submit"><input type="submit" name="sub_com" value="Комментировать" class="submit" /></p>
</form>
</td>
</tr>
</table>
</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
