<td class="left" valign="top"><div class="categories">���������</div><br />
<?
$result2=mysql_query("SELECT * FROM categories", $db);

if(!$result2)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@russeler.com.<strong>��� ������</strong>></p>";
exit(mysql_error());
}

if(mysql_num_rows($result2)>0)
{
$myrow2=mysql_fetch_array($result2); 

do
{
printf ("<p><a href='view_cat.php?new_category=%s' class='under_categories'>%s</a></p>", $myrow2['id'], $myrow2['title']);

}
while($myrow2=mysql_fetch_array($result2));


}
else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������</p>";
}
?>
<div class="last_notes">��������� �������</div>
<?
$result3=mysql_query("SELECT id, title FROM data ORDER BY date, id DESC LIMIT 10", $db);
$myrow3=mysql_fetch_array($result3);

if(!$result3)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@russeler.com<br><strong>��� ������:</strong></p>";
exit(mysql_error());
}
if(mysql_num_rows($result3)>0)
{

do
{
printf ("<span class='span_notes'><a href='view_post.php?id=%s' class='under_last_notes'>%s</a></span>", 
$myrow3['id'], $myrow3['title']);
}
while($myrow3=mysql_fetch_array($result3));

}
else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������</p>";
}
?>

<div class="archive">�����</div>
<?
$result4=mysql_query("SELECT DISTINCT left(date,7) AS month FROM data");
if (!$result4)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@russeler.com<br><strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result4)>0)
{
$myrow4=mysql_fetch_array($result4);
do
{

printf("<p><br><br><a href='view_date.php?date=%s' class='under_archive_date'>%s</a></p>", $myrow4['month'], $myrow4['month']);

}
while($myrow4=mysql_fetch_array($result4));

}
else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������</p>";
}

?>
<div class="friends">����� ������</div>
<?
$result7=mysql_query("SELECT title, link FROM friends");
if(!$result7)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@russeler.com<br><strong>��� ������:</strong></p>";
exit(mysql_error());
}

if(mysql_num_rows($result7))
{
$myrow7=mysql_fetch_array($result7);

do
{
printf ("<p><a href='%s' class='under_friends' target='_blank'>%s</a></p>", $myrow7['link'], $myrow7['title']);
}

while($myrow7=mysql_fetch_array($result7));

}
else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������</p>";
}

?>

<div class="about_blog">� ����� ����������</div>
<?

$result8=mysql_query("SELECT id, link FROM about_blog");

if(!$result8)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� admin@russeler.com<br><strong>��� ������:</strong></p>";
exit(mysql_error());
}

if(mysql_num_rows($result8)>0)
{
$myrow8=mysql_fetch_array($result8);

do
{
printf("<p><a href='view_about.php?id=%s' class='under_about_blog'>%s</a></p>",$myrow8['id'], $myrow8['link']);

}
while($myrow8=mysql_fetch_array($result8));
}
else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������</p>";
}
?>

<div class="nav_title">�����</div>
<form action="view_search.php" name="form_s" method="post">
<p class="search_t">��������� ������ ������ ���� �� ����� 4-� ��������</p>
<p class="search_field"><input type="text" name="search" size="25" maxlength="40" /><br />
<input type="submit" class="submit_search" name="submit_s" value="������" />
</p>
</form>
</td>