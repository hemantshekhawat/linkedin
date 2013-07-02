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
                console.log(data);
                var gData=new Array();
                var pData=new Array();
                var color = new Array('#F38630','#E0E4CC','#86B404','#F781F3','#00FFBF');
                var colorhtml = "<li>"+data.firstName+"&nbsp"+data.lastName+"&nbsp"+data.headline+"</li>";
                var colorhtml2 = '';
                for (var i=0;i<data.educations._total;i++)
                    { 
                        
                            colorhtml += '<li id='+color[i]+'>'+data.educations.values[i].degree+"&nbsp"+data.educations.values[i].fieldOfStudy+"<span>&nbsp"+data.educations.values[i].startDate.year+"&nbspTo&nbsp"+data.educations.values[i].endDate.year+"&nbsp</span><span style='width: 40px; height: 15px; background-color:"+color[i]+";display: inline-block;margin-left:10px;'></span></li>";

                        
                            gData.push({
					value: data.educations.values[i].endDate.year - data.educations.values[i].startDate.year,
					color:color[i]
                                        });
                    }
                    for (var i=0;i<data.positions._total;i++)
                    { 
                        if(data.positions.values[i].isCurrent == true){
                            var vdata = (2013 - data.positions.values[i].startDate.year)*12 + (7 - data.positions.values[i].startDate.month); 
                        
                        var enddate = 2013;
                        }else{
                        var enddate = data.positions.values[i].endDate.year
                          var vdata = (data.positions.values[i].endDate.year - data.positions.values[i].startDate.year)*12 + (data.positions.values[i].endDate.month - data.positions.values[i].startDate.month) 
                        }
                           
                                        
                            pData.push({
					value: vdata,
					color:color[i]
                                        });
                           
                           
                            colorhtml2 += '<li id='+color[i]+'>'+data.positions.values[i].company.name+"&nbsp"+data.positions.values[i].company.industry+"<span>&nbsp"+data.positions.values[i].startDate.year+"&nbspTo&nbsp"+enddate+"&nbsp</span><span style='width: 40px; height: 15px; background-color:"+color[i]+";display: inline-block;margin-left:10px;'></span></li>";
                    }
                    
                var pieData = gData;
                var pieData2 = pData;
                $("#colorreff").html(colorhtml);
                $("#colorreff2").html(colorhtml2);     

	var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
        var myPie2 = new Chart(document.getElementById("canvas2").getContext("2d")).Pie(pieData2);
        });
        
    </script>

</head>
<body>

    <div id="container">
	<h1>Welcome to Resume Chart</h1>
        
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        <canvas id="canvas" height="250" width="250"></canvas>
        <canvas id="canvas2" height="250" width="250"></canvas>
        <div >
            <ul id="colorreff">
            </ul>
            <ul id="colorreff2">
            </ul>
        </div>
        <div id="link">
            <?php //echo "<pre>"; print_r($this->session->userdata('linkedpala')); //print_r($linkindata);?>
            
        </div>
</div>

</body>
</html>