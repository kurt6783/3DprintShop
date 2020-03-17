<div class="container">
	<div class="page-header">
		<h1><?php echo $title ?></h1>
	</div>
</div>
<div class="container">
	<div class="form-group">
		<ul>
			
		</ul>
	</div>
</div>


<div >
	<h2 id="div1">使用 jQuery AJAX 修改文本内容</h2>
	<button id = "submit">Submit</button>
</div >

<script>	
	$("#submit").click(function(){
		$.ajax({url:"AJAX/test",
			success:function(result){$("#div1").html(result);console.log(result);},
			error:function(){$("#div1").html("error");}
		});
	});
</script>

<script >
	setInterval(function(){
		$.ajax({url:"AJAX/test",
			success:function(result){$("#div1").html(result);console.log(result);},
			error:function(){$("#div1").html("error");}
		});
	},1000);
</script>
</div>