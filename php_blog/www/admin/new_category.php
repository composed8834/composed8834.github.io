<? include("lock.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Страница добавления новой категории</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top"><br />
<p class='new_post'>Добавление категории</p>
<form name="form1" class="form" method="post" action="add_category.php">
<p>
<label>Введите название категории<br />
<input type="text" name="title"/><br /><br />
</label>
</p>
<p>
<label>Введите краткое описание категории<br />
<input type="text" name="meta_d" /><br /><br />
</label>
</p>
<p>
<label>Введите ключевые слова для категориии<br />
<input type="text" name="meta_k" /><br /><br />
</label>
</p>
<p>
<label>Введите полный текст категориии с тегами<br />
<textarea name="text" cols="40" rows="20"></textarea><br /><br />
</label>
</p>
<p>
<label>
<input type="submit" name="submit" class="submit" value="Занести категории в базу" /><br /><br />
</label>
</p>
</form>
</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
