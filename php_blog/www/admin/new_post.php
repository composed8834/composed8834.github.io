<? include("lock.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������� ���������� ����� �������</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<? include("blocks/header.php"); ?>
<tr>
<? include("blocks/left.php"); ?>
<td class="right" valign="top"><br />
<? echo "<p class='new_post'>���������� �������</p>"; ?>
<form name="form1" class="form" method="post" action="add_post.php">
<p>
<label>������� �������� �������<br />
<input type="text" name="title"/><br /><br />
</label>
</p>
<p>
<label>������� ������� �������� �������<br />
<input type="text" name="meta_d" /><br /><br />
</label>
</p>
<p>
<label>������� �������� ����� ��� �������<br />
<input type="text" name="meta_k" /><br /><br />
</label>
</p>
<p>
<label>������� ���� ���������� �������<br />
<input type="text" name="date" value="<?php $date =date("Y-m-d"); echo $date; ?>" /><br /><br />
</label>
</p>
<p>
<label>������� ������� �������� ������� � ������ �������<br />
<textarea name="description" cols="40" rows="5"></textarea><br /><br /> 
</label>
</p>
<p>
<label>������� ������ ����� ������� � ������<br />
<textarea name="text" cols="40" rows="20"></textarea><br /><br />
</label>
</p>
<p>
<label>������� ������ �������<br />
<input type="text" name="author" /><br /><br />
</label>
</p>
<p>
<label>������� ���� ��� ����� ���������<br />
<input type="text" name="img" /><br /><br />
</label>
</p>
<p>
<label>�������� ��������� �������<br />
<select name="cat">
<?
$result=mysql_query("SELECT id, title FROM categories");
if (!$result)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@russeler.com. <br/><strong>��� ������:</strong></p>";
exit(mysql_error());
}

if(mysql_num_rows($result)>0)
{
$myrow=mysql_fetch_array($result);
do
{
printf("<option value='%s'>%s</option>", $myrow['id'], $myrow['title']);

}
while($myrow=mysql_fetch_array($result));
}
else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������</p>";
}
?>
</select><br /><br />
</label>
</p>
<p>
<label>
<input type="submit" name="submit" class="submit" value="������� ������� � ����" /><br /><br />
</label>
</p>
</form>

</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>
