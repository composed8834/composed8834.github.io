<? include("lock.php");
if (isset($_POST['id'])) {$id=$_POST['id'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Страница удаления категории</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top">

<?

if(isset($id))
{

$result0=mysql_query("SELECT id FROM data WHERE cat='$id'", $db);

if (mysql_num_rows($result0) > 0) {

echo "<p>В категории которую вы хотите удалить есть заметки. Сначала
перекинте их по другим категориям.</p>";

}
else
{

$result=mysql_query("DELETE FROM categories WHERE id='$id'");

if($result=='true')
{
echo "<p>Ваша категория успешно удалена</p>";
}
else
{
echo "<p>Ваша категория не удалена</p>";
}

}

}

else
{
echo "<p>Вы запустили данный файл без параметра id и поэтому, удалить
категорию не возможно (скорее всего вы не выбрали радиокнопку на предыдущем шаге).</p>";
}


?>


</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>

