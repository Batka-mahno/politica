
<?php  include('head.php');  ?>
<?php  include('navigation.php');   ?>
<?php  include('count.php');  ?>


<body onload="prettyPrint();" class='main'>
  

  
		<?php 
		if(isset($_GET['id'])) 	{
		$resulte = mysql_query('SELECT * FROM data WHERE translit = "'.$_GET['id'].'" AND type IN (1,2,3)', $db);
		while ($rowe = mysql_fetch_assoc($resulte)) {   
		$bname = $rowe['name'];
		$bdate = $rowe['date'];
		$bauthor = $rowe['author'];
		$bcontent = $rowe['content'];
		$brubr = $rowe['rubr'];
		$bid = $rowe['id'];
		$blike = $rowe['like'];
		$btype = $rowe['type'];
		$blink = $rowe['link'];
		$blinkinfo = $rowe['linkinfo'];
		$bfile = $rowe['file'];
		$bprivate = $rowe['private'];
		$bcode = $rowe['code'];
		$btema = $rowe['tema'];
		$btranslit = $rowe['translit'];
		}}; 
		?> 
		
	 <title><?php  echo 'Adatum - '.$bname;   ?></title>
  
    <div itemscope itemtype="http://schema.org/Article"  class="container-fluid main-content">
      <div class="row">
	  
	  
        <div class="col-sm-3">
          <div class="widget-container fluid-height">
            <div class="widget-content">
              <div class="panel-group" id="accordion">
			  
			
				
        <?php if (!empty($brubr) ) { 	?> 
                <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title"><a class="accordion-toggle" data-toggle="collapse" href="#collapseTwo"><div class="caret pull-right"></div>Метки</a></div>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseTwo">
                    <div class="panel-body ">
					
        
					 
			
	<?php    			
	$arr = explode(',',$brubr);
	$arr=str_replace('"', '', $arr);
	$arr=str_replace('[', '', $arr);
	$arr=str_replace(']', '', $arr);
	$arr = array_diff($arr, array('"'));
	
	foreach($arr as $item) {
	?> 
	<div class="label label-default"><span itemprop="keywords"><span itemscope="itemscope" itemtype="http://schema.org/Text"><?php  echo $item; ?></span></span>  <i class="icon-tag"></i></div>
	 <?php } ?> 
					  
                    </div>
                  </div>
                </div>
					 <?php } ?> 
					 
					 
				
				<?php if (!empty($bfile) ) { 	?> 
				<div class="panel">
              
                  <div class="panel-heading">
                    <div class="panel-title"><a class="accordion-toggle" data-toggle="collapse" href="#collapse9"><div class="caret pull-right"></div>Файл</a></div>
                  </div>
               
                  <div class="panel-collapse collapse in" id="collapse9">
                    <div class="panel-body center">
					<a class="btn btncolor" href="<?php  echo $bfile; ?>"><div class="icon-download-alt  "></div> Скачать</a>
                    </div>
                  </div>
                </div>
					<?php } ?>
				
				 <div class="panel">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" href="#collapse3"><div class="caret pull-right"></div>Автор</a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse in" id="collapse3">
				  
                    <div class="panel-body">
					
						<?php 
						$resulte = mysql_query('SELECT * FROM users WHERE id_user = '.$bauthor.'', $db);
						while ($rowe = mysql_fetch_assoc($resulte)) {   
						$rid = $rowe['id_user'];
						$rname = $rowe['name'];
						$rdatereg = $rowe['datereg'];
						$rdate = $rowe['date'];
						$ravatar = $rowe['avatar'];
					
						}
						?> 


<span itemprop="author" itemscope itemtype="http://schema.org/Person">
<div class="comment">
									 <a href="index.php?a=<?php echo $rid; ?>"> <img width="50"  class="social-avatar pull-left" style="border-radius: 5%;margin-right: 15px;" src="<?php echo  $ravatar; ?>"></a>
									  <div class="profile-details clearfix">
										<a class="user-name smoll" href="index.php?a=<?php echo $rid; ?>"><span itemprop="name"><?php if (!empty($rid) ) { echo $rname;	} ?></span></a><br>
										<div class="user-name smoll center" href="#">Зарегестрирован:<br><?php echo substr ($rdatereg, 8, 2).'&nbsp;';  russian_date(substr ($rdatereg, 5, 2));	echo '&nbsp';		 echo substr ($rdatereg, 0, 4);  	?></div>
										<div class="user-name smoll center" href="#">Заходил:<?php echo substr ($rdate, 8, 2).'&nbsp;';  russian_date(substr ($rdate, 5, 2));	echo '&nbsp';		 echo substr ($rdate, 0, 4);  	?></div>
									  </div>
									</div>
									</span> 
									



     

   </div>
   	 <div class="panel-body center">		 
	 
		   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
			<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $bid;}; ?>"/> 
			<input type="hidden" name="translit" value="<?php if(isset($_GET['id'])){ echo $btranslit ;}; ?>" /> 
			<button class="btn btncolor" name="like" value="Отправить" id="like" type="submit"><div class="icon-thumbs-up-alt"></div>Сказать спасибо !</button><br>
			 <?php 
			$resultelike = mysql_query('SELECT count(distinct name) FROM `like` WHERE id_data = '.$bid.'', $db);
			$row = mysql_fetch_row($resultelike);
			$total = $row[0]; 
			?> 
			<small itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">Уже поблагодарили <span itemprop="ratingValue"><?php echo $total;?> </span> человек.</small>
		</form>						
	 </div>	  
  
  
 
  	<?php 

	if($btype == 3 AND $prev_user ==9) 	{  ?> 
						
     <div class="panel-body center">		 
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
			<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $bid;}; ?>"/> 
			<button class="btn btncolor" name="publicgo" value="Отправить" id="publicgo" type="submit"><div class="icon-flag-checkered"></div>Опубликовать --> </button><br>
		</form>						
	 </div>	
<?php }	?> 
	 
	 
                  </div>
                </div>
				
				
				
				
				
                <div class="panel filter-categories">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" href="#collapseThree"><div class="caret pull-right"></div>Комментарии</a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseThree">
                    <div class="panel-body center">
			
		   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
					<div class="comments padded">
		
						<input type="hidden" name="translit" value="<?php if(isset($_GET['id'])){ echo $btranslit ;}; ?>" /> 
						<input class="form-control"  type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $bid;};?>" /> 
						<input class="form-control"  type="hidden" name="author" value="<?php echo $socialId_user;?>" /> 					
						
						<?php 
						if(isset($_GET['id'])) 	{
						$resulte = mysql_query('SELECT * FROM comments WHERE iddata = "'.$bid.'"', $db);
						while ($rowcom = mysql_fetch_assoc($resulte)) {  
						$resulteuser = mysql_query('SELECT * FROM users WHERE id_user = "'.$rowcom['author'].'"', $db);
						while ($rowuser = mysql_fetch_assoc($resulteuser)) { $naneusercomm =  $rowuser['name']; $avatarusercomm =  $rowuser['avatar'];  }
						?>  
								<div class="comment">
								  <img width="40" height="40" class="round social-avatar pull-left" src="<?php echo $avatarusercomm; ?> ">
								  <div class="profile-details clearfix">
									<a class="user-name smoll" href="#"><?php echo $naneusercomm; ?></a>
									<p class="smoll"><em><?php echo $rowcom['date']; ?></em><em><?php echo $rowcom['time']; ?></em></p>
								  </div>
								  <p class="content smoll"><?php echo   $rowcom['content']; ?></p>
								</div>
								<?php }}; 
								if (!empty($socialId_user) ){
								?>

								  <div class="form-group">
									<textarea placeholder="Ваш комментарий" name="content" class="form-control smoll" rows="7" cols="20"></textarea>
										<div class="widget-content padded">
									<button class="btn btncolor" name="comment" value="Отправить" id="comment" type="submit"><div class="icon-bullhorn"></div>Добавить</button>
								  </div>
								  </div>

				 <?php } else { ?>	
				Войдите чтобы оставить комментарии
				 <?php } ?>	   		  
			
					</div> 
					</form>
                    </div>
                  </div>
                </div>
				
				
				
				
				
				
              </div>
            </div>
          </div>
        </div>
		
        <div class="col-sm-9">
    <div class="well widget-container fluid-height">
	<div class="heading"><i class="icon-star-empty"></i>
	
	<span itemprop="articleSection"><?php 
						$resulte = mysql_query('SELECT * FROM rubr WHERE id = '.$btema.'', $db);
						while ($rowe = mysql_fetch_assoc($resulte)) {   
						echo $rowe['name'];
					
						}
						?></span>
	
	
	
	<?php if($socialId_user==$bauthor) { ?>
	<a class="edit_button fl_r" href="/edit<?php echo $bid ?>"></a>
	<?php } ?>
	
	</div>	
		<div content="<?php echo $bdate; ?>" class="smoll  fl_r" style="  opacity: 1; color: #9bb1c8; ">	
								<?php echo substr ($bdate, 8, 2).'&nbsp;';  russian_date(substr ($bdate, 5, 2));	echo '&nbsp';		 echo substr ($bdate, 0, 4);  	?>
					</div><br>
					<div itemprop="datePublished" class="smoll  fl_r" style="  opacity: 1; color: #9bb1c8; "><?php echo $bdate; ?></div>
					
					
		
		<div itemprop="name" style="font-size: 16px;"><?php echo $bname ;?></div><br>
		<div itemprop="articleBody" class="content">
		

        <?php 
		
		
		$bcontent =  htmlspecialchars_decode("$bcontent");
		$bcontent = repltostr($bcontent);
		
echo $bcontent;
		
		?>
		
		

		
	<?php if(!empty($bcode)) {	?>
		
		<div class="heading"><i class="icon-code"></i>Код</div>
	
 <textarea class="textcode" id="code" name="code"><?php echo htmlspecialchars_decode("$bcode"); ?></textarea>
 
 
 <br>
 <div class="heading"><i class="icon-ticket"></i>Пример</div>
    <iframe class="preview" id=preview></iframe>
	
	
	
	
	
	
	
	
	
    <script>
      var delay;

      var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
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
	<?php }	?>	
	
    </div>
  </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
        </div>
      </div>
    </div>

	
	<?php
	if(isset($_POST['comment'])) 
	{ 
	$today = date("Y-m-d");
	$time = date("H:i:s"); 
	$bcont = $_POST['content'];
	$bconte = htmlspecialchars("$bcont", ENT_QUOTES);
	$db = new mysql();
	$db->query("INSERT INTO `comments` (`content`, `author`,`iddata`,`date`,`time`) VALUES ('".$bconte."', '".$_POST['author']."','".$_POST['id']."','".$today."','".$time."');", '', '');
	?>
	 <script language='JavaScript' type='text/javascript'>window.location.replace('/<?php echo $_POST['translit'] ?>.html')</script>   
	<?php } ?>



	<?php
	if(isset($_POST['like'])) 
	{ 
	$count_user = $_SERVER['REMOTE_ADDR'];
	$count_name = $_SERVER['REQUEST_URI'];
	$db = new mysql();
	$db->query("INSERT INTO `like` (`name`, `ip`,`id_data`) VALUES ('".$count_user."', '".$count_name."','".$_POST['id']."');", '', '');
	?>
	 <script language='JavaScript' type='text/javascript'>window.location.replace('/<?php echo $_POST['translit'] ?>.html')</script>   
	<?php    
	}       
	?> 
	
	
		<?php
	if(isset($_POST['publicgo'])) 
	{ 
	$db = new mysql();
	$db->query("UPDATE `data` SET `type` = '2' WHERE `id` = '".$_POST['id']."';", '', '');
  
	?>
	 <script language='JavaScript' type='text/javascript'>window.location.replace('/')</script>   
	<?php    
	}       
	?> 
	
	
	
	
	
   
   
</body>
</html>