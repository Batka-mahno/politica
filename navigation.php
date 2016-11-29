<?php require_once 'config.inc.php'; include_once 'module.php'; include('libauth.php');   ?>
 
<?php   
function gettitle($url)
{
        $doc = new DOMDocument();
        if($doc->loadHTMLFile($url)) {
            $list = $doc->getElementsByTagName("title");
            if ($list->length > 0) {
                return $list->item(0)->textContent;
            }
        }
}


function strtorepl($url)
{
     $str2 = str_replace('\n', '95jn88fhb118g', $url); 
	 return $str2;
}

function repltostr($url)
{
     $str2 = str_replace('95jn88fhb118g', '\n', $url); 
	 return $str2;
}









function translitIt($str) 
{
    $tr = array(
        "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
        "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
        "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
        "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
        "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
        "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
        "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", 
        " "=> "-", "."=> "", "/"=> "_"
    );
    return strtr($str,$tr);
}

function reduce ($string, $count_symbol) {
$arr=explode(" ",$string);
$arr=array_slice($arr,0,$count_symbol);
$new_str=implode(" ",$arr);
return  $new_str;
}

function russian_date($date){

switch ($date){
case 1: $m='Января'; break;
case 2: $m='Февраля'; break;
case 3: $m='Марта'; break;
case 4: $m='Апреля'; break;
case 5: $m='Мая'; break;
case 6: $m='Июня'; break;
case 7: $m='Июля'; break;
case 8: $m='Августа'; break;
case 9: $m='Сентября'; break;
case 10: $m='Октября'; break;
case 11: $m='Ноября'; break;
case 12: $m='Декабря'; break;
}
echo $m;
}


?>  
  <?php 
  error_reporting(0);
  include('lib.php');  
  
  
   if (isset($_SESSION['user'])) 
   {
    $user = $_SESSION['user'];
  
   if (!is_null($user->socialId))
   $socialId=$user->socialId;
  
  $result = mysql_query('SELECT * FROM users WHERE social_id = '.$socialId.'', $db);
while ($row = mysql_fetch_assoc($result)) {   
	$socialId_user=$row['id_user'];
	$avatar_user=$row['avatar'];
	$prev_user=$row['prev'];
	$role=$row['role'];	
}
mysql_free_result($result);


  
   
    if (!is_null($user->name))
	$name_user=$user->name;
  
    if (!is_null($user->email))
	$email_user=$user->email;

    if (!is_null($user->sex))
	$sex_user=$user->sex;

    if (!is_null($user->birthday))
	$birthday_user=$user->birthday;



	
	if (empty($avatar_user) ) { $avatar_user="/images/avatar.png";}
	
	$type_user='social';


	}
	else if (isset($_SESSION['id_user']) )
{

$result = mysql_query('SELECT * FROM users WHERE id_user = '.$_SESSION['id_user'].'', $db);
while ($row = mysql_fetch_assoc($result)) {   
	$socialId_user=$row['id_user'];
	$name_user=$row['name'];
	$email_user=$row['email'];
	$sex_user=$row['sex'];
	$birthday_user=$row['birthday'];
	$avatar_user=$row['avatar'];
	$type_user='local';
	$prev_user=$row['prev'];

	

}



mysql_free_result($result);

	
	
	
 
}


 ?>


	 <script>
		KindEditor.ready(function(K) {
				K.create('.content1', {
				
					cssPath : ['./kindeditor/plugins/code/prettify.css', 'index.css'],
						autoHeightMode : true,
						resizeType : 1,
					
					afterCreate : function() {
					
					},
					allowFileManager : false,
			
					
				items : [
		'source', 'undo', 'redo',   'code', 'justifyleft', 'justifycenter',<?php if (isset($socialId_user)) { echo "'justifyright','justifyfull',  'formatblock','bold', 'italic', 'underline', 'image', 'table',";   } ?>  'link',  'unlink','fullscreen'
	]
				});
				
						K.create('.content2', {
				
					cssPath : ['./kindeditor/plugins/code/prettify.css', 'index.css'],
						autoHeightMode : true,
						resizeType : 1,
					
					afterCreate : function() {
					
					},
					allowFileManager : false,
			
					
				items : [
		'source', 'undo', 'redo',   'code', 'image', 'table', 'link',  'unlink','map'	]
				});
		
				var colorpicker;
				K('#colorpicker').bind('click', function(e) {
					e.stopPropagation();
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
						return;
					}
					var colorpickerPos = K('#colorpicker').pos();
					colorpicker = K.colorpicker({
						x : colorpickerPos.x,
						y : colorpickerPos.y + K('#colorpicker').height(),
						z : 19811214,
						selectedColor : 'default',
						noColor : 'Очистить',
						click : function(color) {
							K('#color').val(color);
							colorpicker.remove();
							colorpicker = null;
						}
					});
				});
				K(document).click(function() {
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
					}
				});
				
						var editor = K.editor({
					allowFileManager : true
				});
				
				
				
				K('#insertfile').click(function() {
					editor.loadPlugin('insertfile', function() {
						editor.plugin.fileDialog({
							fileUrl : K('#url').val(),
							clickFn : function(url, title) {
								K('#url').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url1').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image2').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showLocal : false,
							imageUrl : K('#url2').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url2').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,
							imageUrl : K('#url3').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url3').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				
			});
	 
	 
	  </script>
 
	 
		 <?php
	 $search = $_GET['search'];
	 $page = $_GET['page'];
	 $crubr = $_GET['rubr'];
	 $ca = $_GET['a'];
	 

	
	
	
	if(isset($_GET['page']) AND isset($_GET['a'])) 	{
	

if ($page == '4'){
$_PAGING = new Paging($_DB);
$r = $_PAGING->get_page( 'SELECT * FROM data  WHERE private IN ("'.$socialId_user.'",0) AND tema LIKE "%'.$crubr.'%" AND name LIKE "%'.$search.'%" AND author = "'.$ca.'" AND del = 0 AND type = "'.$page.'" AND author = "'.$socialId_user.'" ORDER BY id DESC' ); 	
	}
	else
	{
$_PAGING = new Paging($_DB);
$r = $_PAGING->get_page( 'SELECT * FROM data  WHERE private IN ("'.$socialId_user.'",0) AND tema LIKE "%'.$crubr.'%" AND name LIKE "%'.$search.'%" AND author = "'.$ca.'" AND del = 0 AND type = "'.$page.'" ORDER BY id DESC' ); 		
	}
	
	
	}
	
	elseif(isset($_GET['page']) ) 	{
	

if ($page == '4'){
$_PAGING = new Paging($_DB);
$r = $_PAGING->get_page( 'SELECT * FROM data  WHERE private IN ("'.$socialId_user.'",0) AND tema LIKE "%'.$crubr.'%" AND name LIKE "%'.$search.'%" AND del = 0 AND type = "'.$page.'" AND author = "'.$socialId_user.'" ORDER BY id DESC' ); 	
	}
	else
	{
$_PAGING = new Paging($_DB);
$r = $_PAGING->get_page( 'SELECT * FROM data  WHERE private IN ("'.$socialId_user.'",0) AND tema LIKE "%'.$crubr.'%" AND name LIKE "%'.$search.'%" AND del = 0 AND type = "'.$page.'" ORDER BY id DESC' ); 		
	}
	
	
	}

elseif(isset($_GET['a']) ) 	{

$_PAGING = new Paging($_DB);
$r = $_PAGING->get_page( 'SELECT * FROM data  WHERE private IN ("'.$socialId_user.'",0) AND tema LIKE "%'.$crubr.'%" AND name LIKE "%'.$search.'%"  AND author = "'.$ca.'" AND name LIKE "%'.$search.'%" AND del = 0 AND type = 2 ORDER BY id DESC' ); 
}

else
{	 

$_PAGING = new Paging($_DB);
$r = $_PAGING->get_page( 'SELECT * FROM data  WHERE private IN ("'.$socialId_user.'",0) AND tema LIKE "%'.$crubr.'%" AND name LIKE "%'.$search.'%"  AND name LIKE "%'.$search.'%" AND del = 0 AND type = 2 ORDER BY id DESC' ); 
}
?>


		 <ul class="nav navbar-nav pull-right">
		 <li  class="dropdown user hidden-xs" style="margin:4px 15px;">
		 
</li>






	  </ul>
         
<form action="/index.php" method="get">
	<div class="container-fluid main-nav clearfix">
		<div class="chat">

				<?php
				$next_page = $_PAGING->get_next_page_link();
				$prev_page = $_PAGING->get_prev_page_link();
				 ?>   
 
			
			
      </form>  

	   

	   

      
		
	  
	  
    </div>

    <!-- End Navigation -->
	
	
	  <div id="content" class="container-fluid ">
	<div class="social-wrapper">
         <div class="fluid-height">
		   <div class="row" id="editsetting" style="display:none;">

	 <div >
    <div class="widget-container fluid-height">

      <div class="widget-content">
         <div class="widget-content padded">
        <div class="btn-toolbar text-editor-toolbar" data-role="editor-toolbar" data-target="#editor">


		
<div class="center">
 <?php
if (!empty($avatar_user) ) 
{
?>
 <img style="border-radius: 5%;" width="110"  src="<?php echo  $avatar_user; ?>">
 <?php
}
?>
<br>
<br>

	 <?php 
    echo  $name_user . '<br/><br/>';
	echo "Id: " . $socialId_user . '<br/><br/>';
	?>	
	
           
			 
			 </div>
		
		
		 </div>
		 
		 
    </div>
      </div>
    </div>
  </div>
	  
		  
		  
<div class="col-md-10">
        <div class="widget-container fluid-height clearfix">
          <div class="heading">
            <i class="icon-edit"></i>Настройки
          </div>
          <div class="widget-content padded">
		  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
 
				<div > 
			  <label class="control-label">Фото</label>
			     </div>
  
               <div class="col-lg-8"> 
			   <input <?php if ($type_user == 'social'){ echo 'readonly';} ?> class="form-control"  type="text" name="photo" id="url3" value="<?php echo $avatar_user; ?>" /> 
			     </div>
				 
                <div class="col-lg-1">
                 <input <?php if ($type_user == 'social'){ echo 'readonly';} ?> class="btn btncolor" type="button" id="image3" value="Загрузить" /> 
				 
				 
                </div>
				<div > 
			  <label class="control-label">ФИО</label>
			     </div>
               <div > 
			   <input <?php if ($type_user == 'social'){ echo 'readonly';} ?> class="form-control"  type="text" name="fio" id="url3" value="<?php echo $name_user; ?>" /> 
			     </div>
		 
		 		<div > 
			  <label class="control-label">E-mail</label>
			     </div>
               <div > 
			   <input readonly class="form-control"  type="text" name="email" id="url3" value="<?php	if (!empty($email_user) ) {	echo $email_user; } ?>" /> 
			     </div>
				<div > 
			  <label class="control-label">Пол</label>
			     </div>
               <div > 
			   <select  <?php if ($type_user == 'social'){ echo 'readonly';} ?> name="sex" class="form-control">
		<option value="female" <?php if ($sex_user == 'female')  {    echo 'selected';} ?> >Женский</option>
		<option value="male"  <?php if ($sex_user == 'male')  {    echo 'selected';} ?> >Мужской</option>

</select>
			   			     </div>
 
				  <div > 
			  <label class="control-label">День рождения</label>
			     </div>
               <div > 
					   	<input <?php if ($type_user == 'social'){ echo 'readonly';} ?> class="form-control" value=" <?php	if (!empty($birthday_user) ) {	echo $birthday_user; } ?>" id="dp1" name="birthday" type="text">
			     </div>
			     <div class="col-lg-9"> 
			  <button class="btn btncolor" name="edituser" value="Отправить" id="edituser" type="submit">Обновить</button>
				</div>
				
			
      <div id="window"></div> 

	</form>
	
	 <div class="col-lg-9"> 
			  <a id="changable" href="change.php">Изменить пароль</a>
				</div>
	<script>  
      $( "#changable" ).click(function( change) {
         change.preventDefault();
            $.ajax({  
                url: "change.php",  
                cache: false,  
                success: function(html){  
                    $("#window").html(html);  
                }  
            });  
        }  
      
        );  
    </script>  
	<div id="window"></div>
          </div>
        </div>
      </div>
	  
	  
	  <script>
$(document).ready(function(){
$('.btn').click(function(){
$('.popup, .overlay').css({'opacity': 1, 'visibility': 'visible'});

		var id_click = $(this).attr('id');
		var data = $(this).attr('data');
		$.ajax({ //отправляем ajax-запрос
        type: "POST", //тип (POST, GET, PUT, etc)
        url: "update.php", //УРЛ Вашего обработчика
        data: { 
		id: id_click,
		database: data	
		} //сами данные, передается POST[xmlUrl] со значением из data-link нажатой кнопки
    })
           .done(function( res ) { //при успехе (200 статус)
        	$('div.popup').html(res) //заменяем блок с id="id_click" полученной строкой от сервера.
		$('.popup .close_window, .overlay').click(function (){
$('.popup, .overlay').css({'opacity': 0, 'visibility': 'hidden'});
});
    });
    
	});
    
});
</script>
	  
	  
	
		  
		  
		  
		  <?php
if(isset($_POST['edituser'])) 
{ 
$db = new mysql();
$db->query("UPDATE `users` SET `avatar` = '".$_POST['photo']."',`name` = '".$_POST['fio']."',`email` = '".$_POST['email']."',`sex` = '".$_POST['sex']."',`birthday` = '".$_POST['birthday']."' WHERE `id_user` = ".$socialId_user.";", '', '');

if(isset($POST['Change']))
{
echo "ffff
ffff
ffff
ffff
ffff";
}
?>
  <script language='JavaScript' type='text/javascript'>window.location.replace('/')</script>   
<?php }  ?>  
		  
		  
	 
	  </div>
	   </div>
	    </div>
		 </div>
	 
	 
	 
	  <div id="top-link">
		<a href="#top" id="top-link-a"><span id="topicon"></span><span id="text">наверх</span></a>
	</div>
	 
	 
	 
	 
	 
	 
