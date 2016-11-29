<?php
header("content-type: text/xml;");
 
echo '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
              xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
              xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                                  http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd">
';
 
include 'config.inc.php';
        DEFINE('ITEMS_PER_PAGE', 1000);
 
$query="SELECT COUNT(*) FROM data";
$res = mysql_query( $query );
$total = mysql_result( $res, 0, 0 );
 
$howmuch=ceil($total/ITEMS_PER_PAGE);
for($i=1; $i<=$howmuch; $i++)
{
echo '<sitemap><loc>http://adatum.ru/sitemap'.$i.'.xml</loc></sitemap>';
}
 ?> 
</sitemapindex>
