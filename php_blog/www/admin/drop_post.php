<? include("lock.php");
if (isset($_POST['id'])) {$id=$_POST['id'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������� �������� �������</title>
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
$result=mysql_query("DELETE FROM data WHERE id='$id'");

if($result=='true')
{
echo "<p>���� ������� ������� �������</p>";
}
else
{
echo "<p>���� ������� �� �������</p>";
}

}
else
{
echo "<p>�� ��������� ������ ���� ��� ��������� id � �������, �������
������� �� �������� (������ ����� �� �� ������� ����������� �� ���������� ����).</p>";
}


?>


</td>
</tr>
<? include("blocks/footer.php"); ?>
</table>
</body>
</html>

