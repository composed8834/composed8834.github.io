
<?php include("blocks/bd.php");

if (isset($_POST['author']))
{
$author=$_POST['author'];
}

if (isset($_POST['text']))
{
$text=$_POST['text'];
}

if (isset($_POST['pr']))
{
$pr=$_POST['pr'];
}

if (isset($_POST['sub_com']))
{
$sub_com=$_POST['sub_com'];
}

if (isset($_POST['id']))
{
$id=$_POST['id'];
}



if (isset($sub_com))
{

if (isset($author)) 
{
trim($author);
}
else
{
$author="";
}
if (isset($text))
{
trim($text);
}
else
{
$text="";
}

if (empty($author) or empty($text))
{
exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля. <br> <input type='button' value='Вернуться назад' name='back' onclick='javascript:self.back();'</p>");
}

$author=stripslashes($author);
$text=stripslashes($text);
$author=htmlspecialchars($author);
$text=htmlspecialchars($text);

$result=mysql_query("SELECT sum FROM comment_setting", $db);
$myrow=mysql_fetch_array($result);

if ($pr == $myrow['sum'])
{
$data=date("Y-m-d");
$result2=mysql_query("INSERT INTO comments (post, author, text, data) VALUES ('$id', '$author', '$text', '$data')", $db);
$addres="admin@russeler.com";
$subject="Новый коментарий на блоге";
$result3=mysql_query("SELECT title FROM data WHERE id='$id'");
$myrow3=mysql_fetch_array($result3);
$post_title=$myrow3['title'];
$message="Появился коментарий к заметке- ".$post_title."\nКоментарий добавил(а): ".$author."\nТекст коментария: ".$text."\nСсылка на заметку http://php_blog/view_post.php?id=".$id."";
mail($addres, $subject, $message, "Content-type:text/plain; Charset=windows-1251\r\n");

echo "<html><head><meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'></head></html>";
exit();
}
else
{
exit("<p>Вы ввели не верную сумму цифр с картинки на предыдущей странице. <br> <input type='button' value='Вернуться назад' name='back' onclick='javascript:self.back();'<p>");
} 




}
?>