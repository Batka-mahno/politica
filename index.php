<?php

include('head.php'); ?> 
<?php require_once 'config.inc.php'; include_once 'module.php';?>
<?php  include('count.php'); ?>
<?php  include('navigation.php');?>
<title>Название</title>
<body >
<div itemscope='itemscope' itemtype='http://schema.org/Blog' style='display: none;'>
<meta content='Gridz Responsive Blogger Template' itemprop='name'/>
</div>

<!-- PAGE WRAP -->
<div id='page-wrap'>
<!-- NAVIGATION -->
<div class='pi-navigation1'>
<div class='container'>
<div class='topnav section' id='topnav'><div class='widget PageList' data-version='1' id='PageList1'>
<h2>Pages</h2>
<div class='widget-content navlist'>
<ul>
<li class='selected'><a href='index.html'>Home</a></li>

<li><a href='p/about.html'>About</a></li>
<li><a href='p/contact-us.html'>Contact Us</a></li>
</ul>
<div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='http://www.blogger.com/rearrange?blogID=8716316713512045313&amp;widgetType=PageList&amp;widgetId=PageList1&amp;action=editWidget&amp;sectionId=topnav' onclick='return _WidgetManager._PopupConfig(document.getElementById("PageList1"));' target='configPageList1' title='Edit'>

</a>
</span>
</span>
<div class='clear'></div>
</div>
</div></div>

<div class='share-box'>
<a class='social-facebook' href='#' target='_blank'><i class='fa fa-facebook'></i></a>
<a class='social-twitter' href='#' target='_blank'><i class='fa fa-twitter'></i></a>
<a class='social-gplus' href='#' target='_blank'><i class='fa fa-google-plus'></i></a>
<a class='social-linkedin' href='#' target='_blank'><i class='fa fa-linkedin'></i></a>
<a class='social-pinterest' href='#' target='_blank'><i class='fa fa-pinterest'></i></a>
<a class='social-youtube' href='#' target='_blank'><i class='fa fa-youtube'></i></a>
<a class='social-vimeo' href='#' target='_blank'><i class='fa fa-vimeo-square'></i></a>
<a class='social-instagram' href='#' target='_blank'><i class='fa fa-instagram'></i></a>


</div>
</div>
</div>
<!-- END / NAVIGATION -->
<!-- HEADER -->
<header class='header' id='header'>
<div class='container'>
<!-- LOGO -->
<div class='logo text-center'>
<div class='header section' id='header'><div class='widget Header' data-version='1' id='Header1'>
<div id='header-inner'>
<a href='index.html' style='display: block'>
<img alt='Gridz Responsive Blogger Template' height='72px; ' id='Header1_headerimg' src='../2.bp.blogspot.com/-BBwV8hyRIHk/VZJ_8x1y6sI/AAAAAAAAGBM/5tVdi18E3LU/s1600/gridz-logo.png' style='display: block' width='220px; '/>
</a>
</div>
</div></div>
</div>
<!-- END / LOGO -->
</div>
</header>
<nav class='pi-navigation' data-menu-responsive='992'>
<div class='container'>
<div class='open-menu'>
<span class='item item-1'></span>
<span class='item item-2'></span>
<span class='item item-3'></span>
</div>
<div class='close-menu'></div>
<ul class='navlist'>
<li ><a class="<?php if(($_GET['page'])==2 OR !isset($_GET['page'])){echo 'current';} ?>" class="" href="/index.php?search=<?php if(isset($_GET['search'])){echo $_GET['search'];}; ?>&page=2<?php if(!empty($_GET['a'])){echo '&a='.$_GET['a'];}; ?>"><div class="icon-book "></div> Статьи</a>
	<?php 
	if($prev_user== "admin") 	{  ?> 				
  <li class="dashboard"><a style="margin: 0px -25px 0px 0px;" href="/notes/edit"><div class="icon-plus"></div></a></li>
<?php }	?> </li>
<li><a href='index.html'>Home</a></li>
<li><a href='p/about.html'>About us</a></li>
<li><a href='#'>Drop Down</a>
<ul class='sub-menu'>
<li><a href='#'>Sub Menu with Subs</a>
<ul class='sub-menu'>
<li><a href='#'>Feminist</a></li>
<li><a href='#'>Persona</a></li>
<li><a href='#'>Expose</a></li>
</ul>
</li>
<li><a href='#'>Powergame</a></li>
<li><a href='#'>Fashion</a></li>
</ul>
</li>
<li class='megamenu col-5'><a href='#'>Mega menu</a>


</li>
<li><a href='http://www.themexpose.com/2015/06/gridz-responsive-blogger-template.html'>Download</a></li>
<li><div class='search-box'>
  <form action="/index.php" method="get">
            <div class="post-message">
              <input name="search" class="icon-search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}; ?>" placeholder="Введите слово" type="text" />
			  <input class="btn btncolor" type="submit" value="Поиск"/>
			  <input name="page"  value="2" type="hidden"/>
            </div>
				<?php
				$next_page = $_PAGING->get_next_page_link();
				$prev_page = $_PAGING->get_prev_page_link();
				 ?>   	
      </form>
</div>	  
</li>

<?php
if (isset($socialId_user) ) 
{   
?>


<li >
	<a title="Настройки профиля" class="dropdown-toggle" href="javascript:void(0);" onclick="viewdiv('editsetting');">  <span class="icon-cogs"></span><div class="sr-only"></div></a>                   
 </li>
		
<li  >
<a title="Показать только мои записи" href="/index.php?a=<?php echo  $socialId_user; ?>"><img width="30" height="30" src="<?php echo  $avatar_user; ?>"><?php echo $name_user; ?>
	<!-- 
<p class="counter">3</p>-->	
</a>       
</li>





<li > <a title="Выйти" class="dropdown-toggle "  href="/logout.php?exit"> <span class="icon-signout "></span><div class="sr-only"></div></a></li>


	
<?php
}
 else if (!isset($_GET['code']) && !isset($_SESSION['user'])) 
{

?>

<?php
if (!isset($_GET['code']) && !isset($_SESSION['user'])) 
{   foreach ($adapters as $title => $adapter) {    
echo '<a class="btn btn-primary pull-' . ucfirst($title) . ' ' . ucfirst($title) . '" href="' . $adapter->getAuthUrl() . '"><i class="icon-' . ucfirst($title) . '"></i> Войти с ' . ucfirst($title) . ' </a>';  
 
}}
?>
<li class="dropdown user hidden-xs"> <a href="/login.php" class="top_nav_link"">Вход/Регистрация</a> </li>
<?php } ?>



</ul>
</div>

</nav>
<!-- END / HEADER -->
<!-- FEATURED -->
<div class='featured' id='featured'>


</div>
<!-- END / FEATURED -->
<!-- BLOG MAIN CONTENT -->
<article class='blog-content blog-grid'>
<div class='container'>
<div class='row'>
<!-- CONTENT -->
<div class='col-md-9'>
<div class='content'>
<div class='main section' id='main'>


<div class='widget Blog' data-version='1' id='Blog1'>

<div class='post-wrapper'>
                        
<?php 
while($row = $r->fetch_assoc())
{
?>

<?php 
$resulte = mysql_query('SELECT * FROM users WHERE id_user = '.$row['author'].'', $db);
while ($rowe = mysql_fetch_assoc($resulte)) {   
$rid = $rowe['id_user'];
$rname = $rowe['name'];
$ravatar = $rowe['avatar'];
$role = $rowe['role']; //мое
if (empty($ravatar) ) { $ravatar="/images/avatar.png";}
}
?> 

<?php
$cont=$row['content'];
$decont = htmlspecialchars_decode("$cont");
preg_match( '#<img[^>]*src=(["\'])([^"\']*)\1[^>]*>#', $decont, $poster); 
 ?>

 <?php 
if ($row['type']==2 OR $row['type']==3)
{
?>	
 <div class='grid-item col-md-4'>                           
<div class='post hentry' itemprop='blogPost' itemscope='itemscope' itemtype='http://schema.org/BlogPosting'>
<div class='entry-content' id='post-body-202452633544924310' itemprop='description articleBody'>
<div class='post-media'>
<div class='image-wrap'>
<div class='mask'></div>
<?php
			if (!empty($poster[2]) ) 
			{
			?>
			<a href="/<?php echo $row['translit'] ?>.html"><img  itemprop="img"  class="social-content-media" src=" <?php echo $poster[2]; ?>"></a>
			 <?php
			}
			?>

</div>

</div>
<div class='post-meta'>

<div class='post-comment'>
<i class='fa fa-comment'></i>
<a href=''><?php echo $count_p; ?></a>
</div>
</div>
<div class='post-body'>
<div class='post-author'>			 
<div class='image-thumb'>
<img img width="50" height="50" class="social-avatar pull-left" src="<?php echo $ravatar; ?>">
</div>

<div class='name-author'>
<cite> <a class="user-name" href="index.php?a=<?php echo $rid; ?>"> </a></cite>
<span itemprop="author" itemscope itemtype="http://schema.org/Person">
<a class="user-name" href="index.php?a=<?php echo $rid; ?>"><span itemprop="name"><?php echo $rname; ?></span></a>	</span> 
</div>

</div>
<div class='post-title'>
<h2> <a href="/<?php echo $row['translit'] ?>.html"><span itemprop="name"> <?php echo $row['name']; ?></span> </a> </h2>
</div>
<div class='post-entry'>
<p> 
<?php
$text=reduce ($decont,12);  	
$text = repltostr($text);		
echo strip_tags($text );		
?>
</p>
</div>



<div class='traingle'></div>
<div class='postfooter clearfix'>
<div class='socialpost'>
<div class='icons clearfix'>
<a href='http://twitter.com/share?url=http://gridz-themexpose.blogspot.ru/2015/03/papilion-minter-savior.html' target='_blank'><i class='fa fa-twitter'></i>
<div class='texts'>Twitter</div>
</a>
<a href='http://www.facebook.com/sharer.php?u=http://gridz-themexpose.blogspot.ru/2015/03/papilion-minter-savior.html' target='_blank'><i class='fa fa-facebook'></i>
<div class='texts'>Facebook</div>
</a>
<a href='https://plus.google.com/share?url=http://gridz-themexpose.blogspot.ru/2015/03/papilion-minter-savior.html' target='_blank'><i class='fa fa-google-plus'></i>
<div class='texts'>Google+</div>
</a>
<a href='http://pinterest.com/pin/create/button/?source_url=http://gridz-themexpose.blogspot.ru/2015/03/papilion-minter-savior.html' onclick='javascript:window.open(this.href, &#39;&#39;, &#39;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600&#39;);return false;' target='_blank'><i class='fa fa-pinterest'></i><div class='texts'>Pinterest</div></a>
</div>
</div>
<a href="/<?php echo $row['translit'] ?>.html">
<div class='read'>Читать далее
</div>
<?php	
if ($prev_user== "admin") 
			{
			?>
			
			<a class="del_button fl_r" id="example<?php echo $row['id'] ?>" title="Удалить"></a>
			<a class="edit_button fl_r" href="/edit<?php echo $row['id'] ?>" title="Редактировать"></a>
							<?php if(!empty($row['private'])) {  ?>
			<a class="icon-eye-close fl_r" style="" title="Только для личного просмотра"></a>
			<?php } 	?>  
			 <script>
							$(document).ready(function() {
				$("#example<?php echo $row['id'] ?>").popover({
					placement: 'left',
					html: 'true',
					title : '<span class="text-info"><strong>Удалить запись ?</strong></span>'+
							'<button type="button" id="close" class="close" onclick="$(&quot;#example<?php echo $row['id'] ?>&quot;).popover(&quot;hide&quot;);">&times;</button>',
					content : '<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><button class="btn btn-xs btn-danger-outline" name="go" value="Отправить" type="submit">да</button><a class="btn btn-xs btn-success-outline" id="close" class="close" onclick="$(&quot;#example<?php echo $row['id'] ?>&quot;).popover(&quot;hide&quot;);"> Нет </a><input type="hidden" name="id_post" id="url3" value="<?php if(isset($row['id'])) 	{ echo $row['id'];} ?>" /><input type="hidden" name="getp"  value="<?php if(isset($_GET['page'])) { echo $_GET['page'];}; ?>" /></form>'
					
				});
			});
				 </script>
			 <?php	}	?>
</a>

</div>


					<div class="fl_r" style="  opacity: 1; color: #9bb1c8; ">
			<?php
			$resulte_c = mysql_query('SELECT * FROM cont WHERE name = "/'.$row['translit'].'.html"', $db);
			$count_c = mysql_num_rows($resulte_c);
			 ?>		
			 
			 	<?php
			$resulte_p = mysql_query('SELECT * FROM comments WHERE iddata = "'.$row['id'].'"', $db);
			$count_p = mysql_num_rows($resulte_p);
			 ?>	
			 
			 <?php 
			$resultelike = mysql_query('SELECT count(distinct name) FROM `like` WHERE id_data = '.$row['id'].'', $db);
			$row = mysql_fetch_row($resultelike);
			$total = $row[0]; 
			?> 
				 <i style="  opacity: 1; color: #c4d1e1; " class="icon-comments-alt"></i>&nbsp;<?php echo $count_p; ?>&nbsp;&nbsp;
				 <i style="  opacity: 1; color: #c4d1e1; " class="icon-thumbs-up-alt"></i>&nbsp;<span itemprop="ratingValue"><?php echo $total; ?></span>&nbsp;&nbsp;
				 <i style="  opacity: 1; color: #c4d1e1; "class="icon-eye-open "></i>&nbsp;<?php echo $count_c; ?>
					</div>

			
<div class='linker clearfix'>
<div class='forwards'>
<a href='2015/03/papilion-minter-savior.html'><i class='fa fa-share'></i></a>

</div>
<i class='fa fa-comment'></i>
<?php echo $count_p; ?>
                          <a class='mcate' href='2015/03/papilion-minter-savior.html#comments'><i class='fa fa-comments-o'></i></a>
<div class='buttonlightbox'>
<a class='fancybox' href='../2.bp.blogspot.com/-bUB5nj_rVVo/VZBzlSLT3II/AAAAAAAAF8Y/aYyzVca-MvA/s1600/pf-1.jpg'><i class='fa fa-search'></i></a>
</div>

<div class="fl_l smoll" style="  opacity: 1; color: #9bb1c8; ">	
<?php echo substr ($row['date'], 8, 2).'&nbsp;';  russian_date(substr ($row['date'], 5, 2));	echo '&nbsp';		 echo substr ($row['date'], 0, 4);  	?>
</div>


</div>
</div>
</div>
</div>
</div>
<?php 
} 
}
?>
		<?php
			if(isset($_POST['go'])) 
			{ 
			$getp=$_POST['getp'];
			$db = new mysql();
			$db->query("UPDATE `data` SET `del` = 1 WHERE `id` = '".$_POST['id_post']."';", '', '');
			   ?>
			   <script language='JavaScript' type='text/javascript'>window.location.replace('index.php?page=<?php echo $getp;?>')</script>  
			<?php   
			}    
			?>
	
                 
<div class='blog-pager' id='blog-pager'>
<span id='blog-pager-older-link'>
<a class='blog-pager-older-link' href='search34c2.html?updated-max=2014-02-08T11:36:00-08:00&amp;max-results=9' id='Blog1_blog-pager-older-link' title='Older Posts'>Older Posts</a>
</span>
<a class='home-link' href='index.html'>Home</a>
</div>
<div class='clear'></div>

</div></div>
</div>
</div>
<!-- END / CONTENT -->
<!-- SIDEBAR -->

<!-- END / SIDEBAR -->
<div class='clear'></div>
</div>
</div>
</article>
<!-- BLOG MAIN CONTENT -->
<!-- FOOTER -->
<footer class='footer' id='footer'>
<div class='container'>
<div class='row'>
<!-- WIDGET NEWSLETTER -->
<div class='col-md-4'>
<div class='footer-section section' id='footer1'><div class='widget PopularPosts' data-version='1' id='PopularPosts2'>
<h2>Popular Posts</h2>
<div class='widget-content popular-posts'>
<ul>
<li>
<div class='item-thumbnail-only'>

<div class='item-thumbnail'>
<a href='2015/03/papilion-minter-savior.html' target='_blank'>
<img alt='' border='0' src='../2.bp.blogspot.com/-bUB5nj_rVVo/VZBzlSLT3II/AAAAAAAAF8Y/aYyzVca-MvA/w72-h72-p-nu/pf-1.jpg'/>
</a>
</div>
<div class='item-title'><a href='2015/03/papilion-minter-savior.html'>Papilion Minter Savior</a></div>
</div>
<div style='clear: both;'></div>
</li>
<li>
<div class='item-thumbnail-only'>
<div class='item-thumbnail'>
<a href='2015/03/draught-vaein-mynel.html' target='_blank'>
<img alt='' border='0' src='../2.bp.blogspot.com/-bCb-IOhdboQ/VZBz0Sj2w0I/AAAAAAAAF8o/eQz4BihUNBM/w72-h72-p-nu/pf-5.jpg'/>
</a>
</div>
<div class='item-title'><a href='2015/03/draught-vaein-mynel.html'>Draught Vaein Mynel</a></div>
</div>
<div style='clear: both;'></div>
</li>
<li>
<div class='item-thumbnail-only'>
<div class='item-thumbnail'>
<a href='2015/03/right-path-mystery.html' target='_blank'>
<img alt='' border='0' src='../2.bp.blogspot.com/-AvOz8o1h4pQ/VZBz9csMI7I/AAAAAAAAF8w/RbUIxf0yk_s/w72-h72-p-nu/pf-9.jpg'/>
</a>
</div>
<div class='item-title'><a href='2015/03/right-path-mystery.html'>Right Path Mystery</a></div>
</div>
<div style='clear: both;'></div>
</li>
</ul>
<div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='http://www.blogger.com/rearrange?blogID=8716316713512045313&amp;widgetType=PopularPosts&amp;widgetId=PopularPosts2&amp;action=editWidget&amp;sectionId=footer1' onclick='return _WidgetManager._PopupConfig(document.getElementById("PopularPosts2"));' target='configPopularPosts2' title='Edit'>

</a>
</span>
</span>
<div class='clear'></div>
</div>
</div></div>
</div>
<!-- END / WIDGET NEWSLETTER -->
<!-- WIDGET META -->
<div class='col-md-4'>
<div class='footer-section section' id='footer2'><div class='widget Label' data-version='1' id='Label5'>
<h2>Labels</h2>
<div class='widget-content cloud-label-widget-content'>
<span class='label-size label-size-5'>
<a dir='ltr' href='search/label/Break.html'>Break</a>
</span>
<span class='label-size label-size-5'>
<a dir='ltr' href='search/label/featured.html'>featured</a>
</span>
<span class='label-size label-size-4'>
<a dir='ltr' href='search/label/Food.html'>Food</a>
</span>
<span class='label-size label-size-2'>
<a dir='ltr' href='search/label/Slider.html'>Slider</a>
</span>
<span class='label-size label-size-3'>
<a dir='ltr' href='search/label/Sport.html'>Sport</a>
</span>
<span class='label-size label-size-1'>
<a dir='ltr' href='search/label/Technology.html'>Technology</a>
</span>
<span class='label-size label-size-3'>
<a dir='ltr' href='search/label/Video.html'>Video</a>
</span>
<span class='label-size label-size-4'>
<a dir='ltr' href='search/label/vimeo.html'>vimeo</a>
</span>
<div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='http://www.blogger.com/rearrange?blogID=8716316713512045313&amp;widgetType=Label&amp;widgetId=Label5&amp;action=editWidget&amp;sectionId=footer2' onclick='return _WidgetManager._PopupConfig(document.getElementById("Label5"));' target='configLabel5' title='Edit'>

</a>
</span>
</span>
<div class='clear'></div>
</div>
</div><div class='widget HTML' data-version='1' id='HTML5'>
<div class='widget-content'>
<div class="flickr_plugin">
</div>
</div>
<div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='http://www.blogger.com/rearrange?blogID=8716316713512045313&amp;widgetType=HTML&amp;widgetId=HTML5&amp;action=editWidget&amp;sectionId=footer2' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML5"));' target='configHTML5' title='Edit'>

</a>
</span>
</span>
<div class='clear'></div>
</div></div>
</div>
<!-- END / WIDGET META -->
<!-- WIDGET TWITTER -->
<div class='col-md-4'>
<div class='footer-section section' id='footer3'><div class='widget BlogArchive' data-version='1' id='BlogArchive1'>
<h2>Blog Archive</h2>
<div class='widget-content'>
<div id='ArchiveList'>
<div id='BlogArchive1_ArchiveList'>
<ul class='flat'>
<li class='archivedate'>
<a href='2015_03_01_archive.html'>March</a> (5)
      </li>
<li class='archivedate'>
<a href='2014_07_01_archive.html'>July</a> (3)
      </li>
<li class='archivedate'>
<a href='2014_02_01_archive.html'>February</a> (2)
      </li>
<li class='archivedate'>
<a href='2013_08_01_archive.html'>August</a> (1)
      </li>
</ul>
</div>
</div>
<div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='http://www.blogger.com/rearrange?blogID=8716316713512045313&amp;widgetType=BlogArchive&amp;widgetId=BlogArchive1&amp;action=editWidget&amp;sectionId=footer3' onclick='return _WidgetManager._PopupConfig(document.getElementById("BlogArchive1"));' target='configBlogArchive1' title='Edit'>

</a>
</span>
</span>
<div class='clear'></div>
</div>
</div></div>
</div>
<!-- END / WIDGET TWITTER -->
<!-- END / WIDGET ARCHIVES -->
<div class='clear'></div>
</div>
</div>
<div class='copyright text-center'>
<div class='container'>
<div class='footer-left'>
           Copyright &#169; 2015 
          <a href='index.html'>
Gridz Responsive Blogger Template
</a>
</div>
<div class='footer-right'>
<p>Created By <a href='http://themexpose.com/' id='mycontent' rel='dofollow' target='_blank' title='Free Blogger Templates'>ThemeXpose</a></p>
</div></div>
<div class='totop'>
<div class='totop-inner'>
<i class='fa fa-angle-up'></i>
</div>
</div>
</div>
</footer>
<!-- END / FOOTER -->
</div>



			
				    <div class="panel filter-categories">
                  <div class="panel-heading">
                    <div class="panel-title">
					
                      <a class="accordion-toggle" data-toggle="collapse" href="#collapse4"><div class="caret pull-right"></div>  <i class="icon-group"></i> Топ Авторов</a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse in" id="collapse4">
                    <div class="panel-body">
			
		  <div class="widget-container scrollable list task-widget" style="padding-top: 0px; height: 100px;">
            <div class="widget-content">
              			
					<?php            
					$resulte = mysql_query('SELECT author FROM data WHERE type IN (2,3)', $db);
					$x = '';
					while ($rowe = mysql_fetch_assoc($resulte)) {   
					$y = ','.$rowe['author'];
					$x.=$y;
					}
					$arr = explode(',',$x);
					$arr = array_diff($arr, array(''));
					$pages=array_count_values($arr); 
					arsort($pages);

					foreach($pages as $key => $value) 
					{ 
					 ?>	
					  <?php 
					$resulte = mysql_query('SELECT * FROM users WHERE id_user = '.$key.'', $db);
					while ($rowe = mysql_fetch_assoc($resulte)) {   
					$rid = $rowe['id_user'];
					$rname = $rowe['name'];
					$ravatar = $rowe['avatar'];
					$role = $rowe['role'];
					if (empty($ravatar) ) { $ravatar="/images/avatar.png";}
					}
					?> 
					 
					 <div class="comment">
									  <img width="30" height="30" class="round social-avatar pull-left" src="<?php echo $ravatar; ?> ">
									  <div class="profile-details clearfix">
										<a class="user-name smoll" href="index.php?a=<?php echo $rid; ?>"><?php echo $rname; ?></a>
										<p class="smoll"><em>  <?php echo   $value; ?></em> публикаций</p>
									  </div>
									</div>
					<?php }  ?>		
						


			  
		   </div>
          </div>
			
			
                    </div>
                  </div>
                </div>
				
				
				  <div class="panel filter-categories">
                  <div class="panel-heading">
                    <div class="panel-title">
					
                      <a class="accordion-toggle" data-toggle="collapse" href="#collapse7"><div class="caret pull-right"></div>  <i class="icon-group"></i> Последние комментарии</a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse in" id="collapse7">
                    <div class="panel-body">
			
		  <div class="widget-container scrollable list task-widget" style="padding-top: 0px; height: 250px;">
            <div class="widget-content">
              			
			<?php 
						
						$resulte = mysql_query('SELECT * FROM comments LIMIT 5', $db);
						while ($rowcom = mysql_fetch_assoc($resulte)) {
						
						$resulteuser = mysql_query('SELECT * FROM users WHERE id_user = "'.$rowcom['author'].'"', $db);
						while ($rowuser = mysql_fetch_assoc($resulteuser)) { $naneusercomm =  $rowuser['name']; $avatarusercomm =  $rowuser['avatar']; if (empty($avatarusercomm) ) { $avatarusercomm="/images/avatar.png";} }
						$resultenote = mysql_query('SELECT * FROM data WHERE id = "'.$rowcom['iddata'].'"', $db);
						while ($rownote = mysql_fetch_assoc($resultenote)) { $namenote =  $rownote['name']; $nametrans =  $rownote['translit'];  }
						?>  
					 
					 <div class="comment">
									  <img width="30" height="30" class="round social-avatar pull-left" src="<?php echo $avatarusercomm; ?>">
									  <div class="profile-details clearfix">
									  
										<a class="user-name smoll"  href="index.php?a=<?php echo $rid; ?>"><?php echo $naneusercomm; ?></a>
										<p class="smoll"><em><?php echo $rowcom['date']; ?></em><em><?php echo $rowcom['time']; ?></em></p>
									  </div>
									   <p class="content smoll"><?php echo   $rowcom['content']; ?></p>
		  <p class="smoll">Комментарии к заметке <a class="user-name smoll" href="<?php echo   $nametrans; ?>.html"> <?php echo   $namenote; ?></a></p>
									</div>
					<?php }  ?>		
						
		   </div>
          </div>
			
			
                    </div>
                  </div>
                </div>
					
	  

	
   
		


	
	<nav role="navigation">
		<ul class="cd-pagination no-space">
			<?php	echo $_PAGING->get_prev_page_link(); ?>
			<?php	echo $_PAGING->get_page_links(); ?>
			<?php	echo $_PAGING->get_next_page_link(); ?>
		</ul>
	</nav> <!-- cd-pagination-wrapper -->
</div>
    </div>

 

</body></html>