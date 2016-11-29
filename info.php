<?php  include('head.php');  ?>
<?php require_once 'config.inc.php';  ?>
<?php  include('count.php');  ?>
<?php  include('navigation.php');	 ?>


<body onload="prettyPrint();" class='main'>
  
		<?php 
		if(isset($_GET['id'])) 	{
		$resulte = mysql_query('SELECT * FROM data WHERE translit = "'.$_GET['id'].'" AND type =5', $db);
		while ($rowe = mysql_fetch_assoc($resulte)) {   
		$bname = $rowe['name'];
		$bauthor = $rowe['author'];
		$bcontent = $rowe['content'];
		$brubr = $rowe['rubr'];
		$bid = $rowe['id'];
		$blike = $rowe['like'];
		
		$blink = $rowe['link'];
		$blinkinfo = $rowe['linkinfo'];
		$bfile = $rowe['file'];
		$bprivate = $rowe['private'];
		$bcode = $rowe['code'];
		$btema = $rowe['tema'];
		$btranslit = $rowe['translit'];
		}}; 
		?> 
		
	 <title>
		<?php  echo $bname;   ?>
    </title>
  
    <div class="container-fluid main-content">
      <div class="row">

        <div class="col-sm-9">
    <div class="well widget-container fluid-height">
	<div class="heading">
	

	
	<style type="text/css">
      .CodeMirror {
	 
    float: left;
        width: 50%;
		 height: 200px;
     
      }
      iframe {
        width: 49%;
       margin: 0px -1px;
        height: 200px;
        border: 1px solid #ccc;
        border-left: 0px;
      }
    </style>
	
	
	<a class="edit_button fl_r" href="/edit<?php echo $bid ?>"></a></div>	
		
		<div style="font-size: 16px;"><?php echo $bname ;?></div><br>

        <?php echo htmlspecialchars_decode("$bcontent"); ?><br>
		
	<?php if(!empty($bcode)) {	?>
	
	

<div class="heading"><i class="icon-code"></i>Код</div>
 <textarea class="textcode" id="code" name="code"><?php echo htmlspecialchars_decode("$bcode"); ?></textarea>


 


    <iframe class="" id=preview></iframe>

    <script>
      var delay;

      var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
        mode: 'text/html',
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
	
   
            <div class="widget-container scrollable chat chat-page2">
               <div class="heading">
                <i class="icon-comments"></i> Ответы
              </div>
              <div class="widget-content padded">
                <ul>
                  
				  		<?php 
		if(isset($_GET['id'])) 	{
		$resulte = mysql_query('SELECT * FROM messages WHERE iddata = '.$bid.'', $db);
		while ($rowe = mysql_fetch_assoc($resulte)) {  

		$idcur = $_GET['id'];
		$autor=$rowe['autor'];

$resultecurrent = mysql_query('SELECT * FROM users WHERE id_user = '.$autor.'', $db);
while ($rowcurrent = mysql_fetch_assoc($resultecurrent)) {   
$currentid = $rowcurrent['id_user'];
$currentname = $rowcurrent['name'];
$currentavatar = $rowcurrent['avatar'];
if (empty($currentavatar) ) { $currentavatar="/images/avatar.png";}
}

		?> 
		
		
		
		 <li class="<?php  if ($current == $idcur){echo "current-user";}   ?>">
                    <img style="border-radius: 10%;" width="50" src="<?php     echo  $currentavatar;	?>">
                    <div class="bubble">
                      <a class="user-name" href=""><?php     echo  $currentname;	?>	</a>
                      <p class="message">
                       <?php echo $rowe['content']; ?>
                      </p>
                      <p class="time">
                        <strong><?php echo $rowe['date']; ?> </strong>  /  <strong><?php echo $rowe['time']; ?> </strong>
                      </p>
                    </div>
                  </li>
		 
			
		<?php }};  ?> 
				  
                  
                </ul>
				
              </div>

			  
			</div>
			<br>
			 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
     
       			  		<textarea class="content2" name="content" style="width:630px;height:200px;visibility:hidden;"></textarea><br>
						<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $bid;};?>" /> 
						<input type="hidden" name="author" value="<?php echo $socialId_user;?>" /> 		
					<input type="hidden" name="translit" value="<?php if(isset($_GET['id'])){ echo $btranslit ;}; ?>" /> 
			  	<button class="btn btn-default-outline btn-block btncolor" name="answer" value="Отправить" id="answer" type="submit">Ответить</button>
			  </form>
        </div>
		
      </div>
	  <div class="col-sm-3">
          <div class="widget-container fluid-height">
            <div class="widget-content">
              <div class="panel-group" id="accordion">
			  
			
				
        
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
	<div class="label label-default"><?php  echo $item; ?>  <i class="icon-tag"></i></div>
	 <?php } ?> 
					  
                    </div>
                  </div>
                </div>
				
				
				

				
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
						$ravatar = $rowe['avatar'];
						}
						?> 

 <?php
if (!empty($avatar_user) ) {
?>

<div class="comment">
									  <img width="50"  class="social-avatar pull-left" style="border-radius: 5%;margin-right: 15px;" src="<?php echo  $ravatar; ?>">
									  <div class="profile-details clearfix">
										<a class="user-name smoll" href="#"><?php if (!empty($rid) ) { echo $rname;	} ?></a><br><br>
										<a class="smoll " href="/tre" name="like"><div class="icon-pencil"></div> Написать автору</a>
										
									  </div>
									</div>
									


 <?php	}	?>

     

   </div>
   	 <div class="panel-body center">		 
	 
		   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
			<input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $bid;}; ?>"/> 
			<input type="hidden" name="translit" value="<?php if(isset($_GET['id'])){ echo $btranslit ;}; ?>" /> 
			<button class="btn btncolor" name="like" value="Отправить" id="like" type="submit"><div class="icon-thumbs-up-alt"></div>Проголосовать за вопрос</button><br>
			 <?php 
			$resultelike = mysql_query('SELECT count(distinct name) FROM `like` WHERE id_data = '.$bid.'', $db);
			$row = mysql_fetch_row($resultelike);
			$total = $row[0]; 
			?> 
			<small>Уже проголосовало <?php echo $total;?> человек.</small>
		</form>						
	 </div>	  
  
                  </div>
                </div>
				
				
				
				
				
    
				
				
				
				
				
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

	
	<?php
	if(isset($_POST['answer'])) 
	{ 
	$today = date("Y-m-d");
	$time = date("H:i:s"); 
	$bcont = $_POST['content'];
	$bconte = htmlspecialchars("$bcont", ENT_QUOTES);
	$db = new mysql();
	$db->query("INSERT INTO `messages` (`content`, `autor`,`iddata`,`date`,`time`) VALUES ('".$bconte."', '".$_POST['author']."','".$_POST['id']."','".$today."','".$time."');", '', '');
	?>
 <script language='JavaScript' type='text/javascript'>window.location.replace('/question/<?php echo $_POST['translit'] ?>.html')</script>   
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
   
   
</body>
</html>