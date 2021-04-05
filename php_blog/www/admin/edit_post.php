<? include("lock.php");
if(isset($_GET['id'])) {$id=$_GET['id'];}
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

if(!isset($id))
{

echo "<p class='chose_link'>Выберите ссылку для редактирования</p>";

$result=mysql_query("SELECT id, title FROM data");
$myrow=mysql_fetch_array($result);

do
{
printf("<p class='edit'><a href='edit_post.php?id=%s' class='edit_link'>%s</a></p>", $myrow['id'], $myrow['title']);
}

while($myrow=mysql_fetch_array($result));
}

else
{
$result=mysql_query("SELECT * FROM data WHERE id=$id");

if($result)
{
$myrow=mysql_fetch_array($result);

$result2=mysql_query("SELECT id, title FROM categories");
$myrow2=mysql_fetch_array($result2);

$count=mysql_num_rows($result2);

echo "<p class='edit_post'>Редактирование заметки</p>

<form name='form1' class='form' method='post' action='update_post.php'>
<p>Категория</p>
<p><select name='cat_edit' size='$count'>";
	
do
{

if ($myrow['cat'] == $myrow2['id'])
{
printf("<option value='%s' selected>%s</option>", $myrow2["id"], $myrow2["title"]);
}
else
{
printf("<option value='%s'>%s</option>", $myrow2["id"], $myrow2["title"]);
}

}	
while($myrow2=mysql_fetch_array($result2));

echo "</select></p><br>";
	
print <<<HERE

	<p>
		<label>Введите название заметки<br>
			<input type="text" name="title" value="$myrow[title]"><br>
	<br></label>
		</p>
	<p>
		<label>Введите краткое описание заметки<br>
			<input type="text" name="meta_d" value="$myrow[meta_d]"><br>
	<br></lable>
		</p>
	<p>
		<label>Введите ключевые слова к заметки<br>
			<input type="text" name="meta_k" value="$myrow[meta_k]"><br>
	<br></label>
		</p>
    <p>
		<label>Введите дату добавления заметки<br>
			<input type="text" name="date" value="$myrow[date]"><br>
	<br></lable>
		</p>
	<p>
		<label>Введите краткое описание заметки с тегами абзацев<br>
			<textarea name="description" cols="40" rows="5">$myrow[description]</textarea><br>
	<br></lable>
		</p>
	<p>
		<lable>Введите полный текст заметки с тегами<br>
			<textarea name="text" cols="40" rows="20">$myrow[text]</textarea><br>
	<br></lable>
		</p>
	<p>
		<label>Введите автора заметки<br>
			<input type="text" name="author" value="$myrow[author]"><br>
	<br></lable>
		</p>
	<p>
		<label>Введите где лежит миниатюра<br>
			<input type="text" name="mini_img" value="$myrow[mini_img]"><br>
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

$result=mysql_query("SELECT id, title FROM data");
$myrow=mysql_fetch_array($result);

do
{
printf("<p class='edit'><a href='edit_post.php?id=%s' class='edit_link'>%s</a></p>", $myrow['id'], $myrow['title']);
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
