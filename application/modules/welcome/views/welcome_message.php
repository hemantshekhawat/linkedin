<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
        
        <script src="<?php echo base_url();?>js/jquery-2.0.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/Chart.js" type="text/javascript"></script>
        <meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
        <style>
			canvas{
			}
		</style>
        <script type="text/javascript">
        
        $(document).ready(function(){
                var data = JSON.parse(<?php print_r($this->session->userdata('linkedpala')); ?>);
                //alert(data);
                console.log(data.educations.values[0]);
                var gData=new Array();
                var color = new Array('#F38630','#E0E4CC');
                var colorhtml = '';
                for (var i=0;i<data.educations._total;i++)
                    { 
                        
                            colorhtml += '<li id='+color[i]+'>'+data.educations.values[i].degree+"<span>"+data.educations.values[i].startDate.year+"To"+data.educations.values[i].endDate.year+"</span><span style='width: 40px; height: 15px; background-color:"+color[i]+";display: inline-block;margin-left:10px;'></span></li>";

                        
                            gData.push({
					value: data.educations.values[i].endDate.year - data.educations.values[i].startDate.year,
					color:color[i]
                                        });
                    }
                    
                var pieData = gData;
                $("#colorreff").html(colorhtml);
                        console.log(pieData);

	var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
        });
        
    </script>

</head>
<body>

    <div id="container">
	<h1>Welcome to CodeIgniter!</h1>
        
	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        <canvas id="canvas" height="450" width="450"></canvas>
        <div >
            <ul id="colorreff">
            </ul>
        </div>
        <div id="link">
            <?php //echo "<pre>"; print_r($this->session->userdata('linkedpala')); //print_r($linkindata);?>
            
        </div>
</div>

</body>
</html>