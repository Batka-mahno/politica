<?php
header("content-type: text/xml;");
include 'config.inc.php';
    // let us generate sitemap!
$data_r.='<?xml version="1.0" encoding="UTF-8" ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
############1 data from pages table
        DEFINE('ITEMS_PER_PAGE', 1000);
$query="SELECT COUNT(*) FROM data";
$res = mysql_query( $query );
$total = mysql_result( $res, 0, 0 );
 
if ( isset($_GET['page']) ) {
          $page = (int)$_GET['page'];
          if ( $page < 1 ) $page = 1;
        } else {
          $page = 1;
        }
if ($page==1)
{
 
  $data_r.='<url><loc>http://adatum.ru</loc> 
  <changefreq>always</changefreq> 
  <priority>0.5</priority> 
</url>
 
';  
}
        // Сколько всего получится страниц
        $cnt_pages = ceil( $total / ITEMS_PER_PAGE );
        if ( $page > $cnt_pages ) $page = $cnt_pages;
        // Начальная позиция
        $start = ( $page - 1 ) * ITEMS_PER_PAGE;
 
$sm_data=mysql_query("SELECT * FROM  
data WHERE del = 0 AND translit !='' LIMIT ".$start.", ".ITEMS_PER_PAGE);
 
 while($sm_row=mysql_fetch_array($sm_data))
 {
 $sm_row['query2']=str_replace(" ","+", $sm_row['translit']);
    $data_r.= '
<url>
  <loc>http://adatum.ru/'.$sm_row['translit'].'.html</loc> 
  <changefreq>daily</changefreq> 
  <lastmod>'.$sm_row['date'].'</lastmod>
  <priority>0.5</priority> 
</url>
';
 }
$data_r.='</urlset>';
$content = $data_r;
 
echo $content;
?>