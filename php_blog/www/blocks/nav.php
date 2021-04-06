<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="25%" <?php if(isset($n)) {

if($n==1)
{
echo "class='nav_active'";
}
else
{
echo "class='nav_t'";
}
}

 ?>><p align="center"><strong><a href="index.php">Главная</a></strong></p></td>
<td width="25%" <? if(isset($n)) {if($n==2) echo "class='nav_active'"; else echo "class='nav_t'";} ?>><p align="center"><strong><a href="subscribe.php">Рассылка</a></strong></p></td>
<td width="25%" <? if(isset($n)) {if($n==3) echo "class='nav_active'"; else echo "class='nav_t'";} ?>><p align="center"><strong><a href="goodies.php">Товары</a></strong></p></td>
<td width="25%" style="border-right:none;" <? if(isset($n)) {if($n==4) echo "class='nav_active'"; else echo "class='nav_t'";} ?>><p align="center"><strong><a href="about.php">О нас</a></strong></p></td>
</tr>
</table>