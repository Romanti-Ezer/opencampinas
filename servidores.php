<!DOCTYPE html> 
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Open Campinas</title>
	<link rel="stylesheet" type="text/css" href="style.css" />	
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/png" href="img/CC2.png"/>
	<style>
	#chartdiv {
	  width: 100%;
	  height: 500px;
	}
</style>
		<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

</head>
<body>
	<header>
		<div id="header-inner">
			<a href="index.html" id="logo"></a>
			<nav>
				<a href="#" id="menu-icon"></a>
				<ul>
					<li><a href="index.html">Início</a></li>
					<li><a href="vereadores.php">Vereadores</a></li>
					<li><a href="#" class="current">Servidores</a></li>
					<li><a href="orcamento.php">Orçamento</a></li>
				</ul>
			</nav>
		</div>
	</header>
	
<!-- End Header -->
	<section class="banner2">
		<h2><span style="margin-left: -18%">Open Campinas</span></h2>
		<div class="banner-inner">
			<img src="img/people_banner3.png" alt="Banner do projeto">
		</div>
		<p>Aqui você pode facilmente visualizar o que acontece com o dinheiro público, aproveite!</p>
	</section>
	
<!-- End Banner -->
<!-- Slogan -->
	<section class="one-fourth" id="info">
		<td><i class="fa fa-info-circle"></i></td>
		<h3>Informe-se</h3>
	</section>
	<section class="one-fourth" id="acomp">
		<td><i class="fa fa-bar-chart"></i></td>
		<h3>Acompanhe</h3>
	</section>
	<section class="one-fourth" id="seo">
		<td><i class="fa fa-search"></i></td>
		<h3>Fiscalize</h3>
	</section>
	<section class="one-fourth" id="social">
		<td><i class="fa fa-users"></i></td>
		<h3>Pratique a Cidadania</h3>
	</section>
	<!-- <h2 style="border-bottom: 1px solid white; line-height: 150%"> Dados de todos os funcionários</h2>-->
	
<!-- Slogan -->

<!-- Servidores -->
	<?php
	$row = 1;
	
	if (($handle = fopen("remuneracao.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
		
			$row++;
			
			$con = mysqli_connect("localhost","root","","hack");
					mysqli_set_charset($con,"utf8");
					$database = $con;
			
				
		}
    fclose($handle);
	}
?>

		<?php
			
			$f = fopen("data.csv","w");
			$result = @mysqli_query($database,"SELECT DISTINCT cargo FROM remuneracao");
			$i = 0;
			while($row = mysqli_fetch_assoc($result))
			{
				$sql = "SELECT SUM(salario_bruto) AS total FROM remuneracao WHERE cargo=\"".$row["cargo"]."\"";
				$resultado = mysqli_query($database,$sql);
				$linha = mysqli_fetch_assoc($resultado);
				fwrite($f,"{\"cargo\": \"".$row["cargo"]."\",
			valor: ".$linha["total"]."\r\n},");
				$i++;
				
			}
			fclose($f);
			
		?>
	<div id="chartdiv"></div>
		<script>
		var chart = AmCharts.makeChart( "chartdiv", {
		  "type": "pie",
		  "theme": "light",
		  "dataProvider": [ 
			  <?php
					
				echo file_get_contents("data.csv");
					
			  ?>
			],
		  "valueField": "valor",
		  "titleField": "cargo",
		   "balloon":{
		   "fixedPosition":true
		  },
			"radius": "42%",
		  "innerRadius": "60%",
		  "export": {
			"enabled": true
		  }
		} );
		</script>
	<footer>
		<ul class="social">
			<li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></1l>
			<li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a></li>
			<li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
		</ul>
	</footer>
<!--- End Footer Section -->
	<footer class="second">
		<p>&copy; Public Devs</p>
	</footer>
<!--- End Second Footer -->
</body>
</html>
