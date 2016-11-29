<?php session_start() ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Название</title>
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

<meta name="generator" content="www.rusoturismo.ru" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index, follow"/>
	
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'/>	

<link href="/css/Bootstrap.css" media="all" rel="stylesheet" type="text/css">
<link href="/css/font-awesome.css" media="all" rel="stylesheet" type="text/css">
<link href="/css/style.css" media="all" rel="stylesheet" type="text/css">    <!-- убрать -->
<link href='/css/Main.css' type='text/css' rel='stylesheet'  />


<!-- проверить удалить лишнее--> 
<script src="/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/js/Bootstrap.js" type="text/javascript"></script>
<script src="/js/select2.js" type="text/javascript"></script>
<script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/js/excanvas.min.js" type="text/javascript"></script>
<script src="/js/styleswitcher.js" type="text/javascript"></script>
<script src="/js/button_down.js"></script> 
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/jquery.visualize.min.js"></script>

<script src="/editor/kindeditor.js" charset="utf-8" ></script>
<script src="/js/prettify.js" type="text/javascript" ></script>

<script src="/js/codemirror/codemirror.js"></script>
<script src="/js/codemirror/closetag.js"></script>
<script src="/js/codemirror/xml.js"></script>
<script src="/js/codemirror/javascript.js"></script>
<script src="/js/codemirror/css.js"></script>
<script src="/js/codemirror/htmlmixed.js"></script>
<script src="/js/codemirror/clike.js"></script>
<script src="/js/codemirror/php.js"></script>
<script src="/js/codemirror/matchtags.js"></script>



</head>




	<script>
			$(document).ready(function() {
			
				$('.tablegra').each(function() {
					var chartType = ''; // Set chart type
					var chartWidth = $(this).parent().width()*0.85; // Set chart width to 85% of its parent
					var chartHeight = chartWidth; // Nice squares
					
					if ($(this).attr('data-chart')) { // If exists chart-chart attribute
						chartType = $(this).attr('data-chart'); // Get chart type from data-chart attribute
					} else {
						chartType = 'area'; // If data-chart attribute is not set, use 'area' type as default. Options: 'bar', 'area', 'pie', 'line'
					}
					
					if(chartType == 'line' || chartType == 'pie') {
						$(this).hide().visualize({
							type: chartType,
							width: chartWidth,
							height: chartHeight,
							lineWeight: 2,
							colors: ['#389abe','#fa9300','#6b9b20','#d43f3f','#8960a7','#33363b','#b29559','#6bd5b1','#66c9ee'],
							lineDots: 'double',
							interaction: true,
							multiHover: 5,
							tooltip: true,
							tooltiphtml: function(data) {
								var html ='';
								for(var i=0; i<data.point.length; i++){
									html += '<p class="tooltip chart_tooltip"><div class="tooltip-inner"><strong>'+data.point[i].value+'</strong> '+data.point[i].yLabels[0]+'</div></p>';
								}	
								return html;
							}
						});
					} else {
						$(this).hide().visualize({
							type: chartType,
							width: chartWidth,
							height: chartHeight,
							colors: ['#389abe','#fa9300','#6b9b20','#d43f3f','#8960a7','#33363b','#b29559','#6bd5b1','#66c9ee'],
						});
					}
				});
			
			});

function hidee(id){
var el=document.getElementById(id);
el.style.display="none";
}

function viewdiv(id){
var el=document.getElementById(id);
if(el.style.display=="block"){
el.style.display="none";
} else {
el.style.display="block";
}
}
	

			
			
			
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '/editor/php/upload_json.php?dir=file',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#url').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('Специальных сообщениях об ошибках: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});

	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('.dp1').datepicker({
				format: 'yyyy-mm-dd'
				
			});
						
			

		});
	
	$(document).ready(function() { $(".e1").select2(); });  
	</script>