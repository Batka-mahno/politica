 <?php  include('head.php');  ?>
  <?php  include('navigation.php');  ?>
 <?php  include('count.php');  ?>

 <title> Adatum &#8212; Уроки по созданию сайта,  и многое другое.</title>

  <body class='main'>
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
   

  
	<?php 
	if(isset($_GET['id'])) 	{
	$resulte = mysql_query('SELECT * FROM data WHERE id = "'.$_GET['id'].'"', $db);
	while ($rowe = mysql_fetch_assoc($resulte)) {   
	$bname = $rowe['name'];
	$bcontent = $rowe['content'];
	$bid = $rowe['id'];
	$bauthor = $rowe['author'];
	$brubr = $rowe['rubr'];
	$blink = $rowe['link'];
	$blinkinfo = $rowe['linkinfo'];
	$bfile = $rowe['file'];
	$bprivate = $rowe['private'];
	$bcode = $rowe['code'];
	$btranslit = $rowe['translit'];
	

	} }; 
	?> 

	<?php 
						$resulte = mysql_query('SELECT * FROM users WHERE id_user = '.$socialId_user.'', $db);
						while ($rowe = mysql_fetch_assoc($resulte)) {   
						$rid = $rowe['id_user'];
						$rname = $rowe['name'];
						$rdatereg = $rowe['datereg'];
						$rdate = $rowe['date'];
						$ravatar = $rowe['avatar'];
						$prev_user = $rowe['prev'];
						}
				
						?> 

   
  
    <div class="container-fluid main-content">
      <div class="row">
        <div class="col-sm-3">
          <div class="widget-container fluid-height">
            <div class="widget-content">
              <div class="panel-group" id="accordion">
               
				<div class="panel">
                
				<div class="panel-heading">
                    <div class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" href="#collapseTwo"><div class="caret pull-right"></div>Метки</a>
                    </div>
                </div>
				  
                  <div class="panel-collapse collapse in" id="collapseTwo">
                  	  <div class="panel-body">	  
					
<?php $resulte = mysql_query('SELECT * FROM tags', $db); ?> 
								
					<script id="script_e15">
$(document).ready(function () {
$("#e15").select2({tags:[

<?php while ($rowrubr = mysql_fetch_assoc($resulte)) { echo '"'.$rowrubr['name'].'",';	}; 	?>  
]});
$("#e15").on("change", function() { $("#e15_val").html($("#e15").val());});

$("#e15").select2("container").find("ul.select2-choices").sortable({
    containment: 'parent',
    start: function() { $("#e15").select2("onSortStart"); },
    update: function() { $("#e15").select2("onSortEnd"); }
});
});
</script>
  

       	<div class="input-group">
                <span class="input-group-addon"><i class="icon-tags"></i></span>
				<input name="rubr" type="hidden" id="e15" style="width:100%;" value="<?php if(isset($_GET['id']) AND $socialId_user==$bauthor) { echo $brubr; }; ?>" tabindex="-1" class="select2-offscreen">
              </div>
          
             

</div>
   </div>			  
       </div>


			<div class="panel">
				  
                  <div class="panel-heading">
                    <div class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" href="#collapse3"><div class="caret pull-right"></div>Дата создания</a>
                    </div>
                  </div>
				  
                  <div class="panel-collapse collapse in" id="collapse3">
                  	  <div class="panel-body">	  
					  	<div class="input-group">
                <span class="input-group-addon"><i class="icon-calendar-empty"></i></span>	<input class="form-control dp1" value="<?php echo date("Y-m-d");?>" name="datecom" type="text">		
              </div>
							
					</div>
                  </div>
				  
            </div>
			
			<div class="panel">
				  
                  <div class="panel-heading">
                    <div class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" href="#collapse4"><div class="caret pull-right"></div>Приложить файл</a>
                    </div>
                  </div>
				  
                  <div class="panel-collapse collapse in" id="collapse4">
                  	  <div class="panel-body">	  
					  
					  	<div class="input-group">
                <span class="input-group-addon"><i class="icon-file-alt"></i></span>	<input class="ke-input-text form-control" type="text" id="url" name="file" value="<?php  echo $bfile; ?>" readonly="readonly"/>	
              </div>
							<br>
							
               
               <?php if(isset($socialId_user)) { ?>

<button type="button" id="uploadButton" value="Загрузить"></button>

			  <?php   }; ?>
				
				
					</div>
                  </div>
				  
            </div>
			

	   
	   	<div class="panel">
				  
                  <div class="panel-heading">
                  
                  </div>

                  <div class="panel-collapse collapse in" id="collapse5">
                  	  <div class="panel-body">	 
					  <label class="checkbox"><input name="private" <?php  if($bprivate){echo "checked";} ?> type="checkbox"><span>Только для личного просмотра</span></label><br>
					 
					 	<?php if(isset($_GET['id']) and ($socialId_user==$bauthor)) 	{  ?>
			<div class="col-lg-12"> 
					<button class="btn btn-default-outline btn-block" name="go" value="Отправить" id="go" type="submit">Обновить</button>
			</div>
		   <?php  } elseif(isset($socialId_user)){ ?>
		   
		   
			<div class="col-lg-12"> 
				<button class="btn btn-default-outline btn-block" name="add" value="Отправить" id="add" type="submit">Добавить</button>
			</div>
			<?php  } else { ?>
			Для добавления заметки пожалуйсто войдите.
			<li class="dropdown user hidden-xs"> <a href="/login.php" class="top_nav_link"">Вход/Регистрация</a> </li>
	
			
			
			<?php  } ?>
					</div>
                  </div>
				  
       </div>
	   
	   
	   	
				
              </div>
            </div>
          </div>
        </div>
		
		

	 
		
    <div class="col-sm-9">
     
	 <div class="well widget-container fluid-height">
<div class="heading"><i class="icon-edit"></i>Название</div>		
 
		 <div class=" selected-filters">	 
			<input style="width: 100%;" class="form-control"  type="text" name="name" value="<?php if(isset($_GET['id']) AND $socialId_user==$bauthor) { echo $bname; }; ?>" /> 
			
			<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $bid ;}; ?>" /> 
			<input type="hidden" name="translit" value="<?php if(isset($_GET['id'])){ echo $btranslit ;}; ?>" /> 
			<input type="hidden" name="author" value="<?php echo $socialId_user;?>"/> 
			

			
          </div>
		  
 <div class="heading"><i class="icon-edit"></i>Рубрика <a title="Добавить рубрику" class="dropdown-toggle fl_r smoll" href="javascript:void(0);" onclick="viewdiv('addrubr');">+ Добавить рубрику</a></div>	



 
		 <div class="selected-filters">	 
				<select name="tema" class="e1">
					<?php 
					$resulte = mysql_query('SELECT * FROM rubr', $db);
					while ($rowrubr = mysql_fetch_assoc($resulte)) {   
					$rubrid = $rowrubr['id'];
					$rubrname = $rowrubr['name'];	
						?> 
						 <option value="<?php echo $rubrid;?>"><?php echo $rubrname;?></option>
						
					<?php 
					}; 
					?> 
				</select>
          </div>


		   <div id="addrubr" style="display:none;">
		  	<?php 
 
	if($prev_user ==9) 	{  ?> 
						
     <div class="panel-body center">		 
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
			 <div class="col-md-9"><input class="form-control" type="text" name="rubrname" value=""/>  </div>	
			 <div class="col-md-3"><button class="btn btncolor" name="addrubr" value="Отправить" id="addrubr" type="submit">Добавить рубрику </button> </div>	
		</form>						
	 </div>	
<?php }	?> 
   </div>	
		  
		  <div class="heading"><i class="icon-pencil"></i>Текст заметки</div>
		  <textarea class="content1" name="content" style="width:650px;height:400px;visibility:hidden;"><?php if(isset($_GET['id']) AND $socialId_user==$bauthor) { echo repltostr($bcontent); }; ?></textarea>
   
   




<div class="heading"><i class="icon-code"></i>Код</div>
	

	
 <textarea class="textcode" name="code" id="code" ><?php if($bcode AND $socialId_user==$bauthor) { echo htmlspecialchars_decode("$bcode"); } ?></textarea>
 
 
 <br>
 <div class="heading"><i class="icon-ticket"></i>Пример</div>
    <iframe class="preview" id=preview></iframe>
	

	<script>
	      var delay;
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        mode: "application/x-httpd-php",
        tabMode: 'indent',
		  lineNumbers: true,	
        autoCloseTags: true,
    styleActiveLine: true,
    matchBrackets: true
    });
	      editor.on("change", function() {
        clearTimeout(delay);
        delay = setTimeout(updatePreview, 300);
      });
      
      function updatePreview() {
        var previewFrame = document.getElementById('preview');
        var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;
        preview.open();
        preview.write(editor.getValue());
        preview.close();
      }
      setTimeout(updatePreview, 300);
  </script>
		
	





   </div>
    </div>
	</form>
      </div>
    </div>

	
	
	
<?php	if (!empty($socialId_user) ) {	
if(isset($_POST['go'])) 
{ 
	$bcont = $_POST['content'];
		$bname = $_POST['name'];
	$blink = $_POST['link'];
	$blinkinfo = $_POST['linkinfo'];
	$bcode = $_POST['code'];
	$author = $_POST['author'];
	$bcode = htmlspecialchars("$bcode", ENT_QUOTES);
	$bfile = $_POST['file'];
	$bprivate = $_POST['private'];
	if($bprivate == 'on') { $bprivate = $author;} else {$bprivate = '';};
	$today = date("Y-m-d");
	$time = date("H:i:s"); 
//	$x = '';
//foreach ($_POST['rubr'] as &$brubr) 
//	{
//    $y = $brubr.',';
//	$x.=$y;
//	}
	$x=$_POST['rubr'];
	$bname = htmlspecialchars("$bname", ENT_QUOTES);
	$bcont = strtorepl($bcont);
	$bconte = htmlspecialchars("$bcont", ENT_QUOTES);
	$db = new mysql();
	$db->query("UPDATE `data` SET `name` = '".$bname."',`tema` = '".$_POST['tema']."',`content` = '".$bconte."',`rubr` = '".$x."',`dateedit` = '".$today."',`timeedit` = '".$time."',`code` = '".$bcode."',`file` = '".$bfile."',`private` = '".$bprivate."' WHERE `id` = '".$_POST['id']."';", '', '');
   ?>
 <script language='JavaScript' type='text/javascript'>window.location.replace('/<?php echo $_POST['translit'];?>.html')</script>   
<?php   }     ?>





<?php
if(isset($_POST['add'])) 
{ 



	$time = date("H:i:s"); 
	$bname = $_POST['name'];
	$bcont = $_POST['content'];
	$bcode = $_POST['code'];
	$today = $_POST['datecom']; 
	$author = $_POST['author'];
	$tema = $_POST['tema'];
	$bprivate = $_POST['private'];
	if($bprivate == 'on') { $bprivate = $author;} else {$bprivate = '';};


//	if(isset($_POST['rubr'])) {	
//	$x = '';
	//foreach ($_POST['rubr'] as &$brubr) 
//		{
//		$y = $brubr.',';
//		$x.=$y;
//	}
//	}
$x = $_POST['rubr'];

$bcode = htmlspecialchars("$bcode", ENT_QUOTES);
$bname = htmlspecialchars("$bname", ENT_QUOTES);
$bcont = strtorepl($bcont);
$bconte = htmlspecialchars("$bcont", ENT_QUOTES);
$urlstr = $_POST['name'];
if (preg_match('/[^A-Za-z0-9_\-]/', $urlstr)) {
    $urlstr = translitIt($urlstr);
    $urlstr = preg_replace('/[^A-Za-z0-9_\-]/', '', $urlstr);
}
$urlstr=strtolower($urlstr);


$res = mysql_query("SELECT translit from data WHERE translit='$urlstr'");
$count = mysql_num_rows($res);
if ($count>0) {
  $urlstr=$urlstr.'-new';
}

$db = new mysql();
$db->query("INSERT INTO `data` (`name`, `content`, `date`,`author`,`rubr`,`time`,`type`,`translit`,`file`,`private`,`code`,`tema`) VALUES ('".$bname."', '".$bconte."', '".$today."', '".$author."', '".$x."', '".$time."','2','".$urlstr."','".$_POST['file']."','".$bprivate."','".$bcode."','".$_POST['tema']."');", '', '');
 

 ?>
  <script language='JavaScript' type='text/javascript'>window.location.replace('/index.php?&page=2')</script>   
<?php   }     ?>
   
   
   
   
<?php
if(isset($_POST['addrubr'])) 
{ 
$db = new mysql();
$db->query("INSERT INTO `rubr` (`name`) VALUES ('".$_POST['rubrname']."');", '', '');
   ?>
  <script language='JavaScript' type='text/javascript'>window.location.replace('/notes/edit')</script>   
<?php   }     ?>
   
   

			
   
  <?php 	}     ?>  


  
  
  
   
</body></html>