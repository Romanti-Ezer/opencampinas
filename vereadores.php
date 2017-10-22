<!DOCTYPE html> 
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Open Campinas</title>
	<link rel="stylesheet" type="text/css" href="style.css" />	
	<link href="css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="icon" type="image/png" href="img/CC2.png"/>
	
	
</head>
<body>
	<header>
		<div id="header-inner">
			<a href="index.html" id="logo"></a>
			<nav>
				<a href="#" id="menu-icon"></a>
				<ul>
					<li><a href="index.html">Início</a></li>
					<li><a href="#" class="current">Vereadores</a></li>
					<li><a href="servidores.php">Servidores</a></li>
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
	<div id="body_vereadores">
	
	
<!-- Slogan -->

<!-- Vereadores -->
	<?php
	$json_data = file_get_contents("http://sagl-api.campinas.sp.leg.br/parlamentares");
	$array_parlamentares = json_decode($json_data, true);
	
	
	for ($i = 0; $i < count($array_parlamentares['data']); $i++){
		echo "<section class='vereadores_list'>";
		echo "<p class='title'>".$array_parlamentares['data'][$i]['nome_parlamentar']."</p><br/>";
		echo "<center><img src='".$array_parlamentares['data'][$i]['url_foto']."'/></center><br/>";
		$temp_txt = "".strip_tags($array_parlamentares['data'][$i]['biografia']);
		$bio = substr($temp_txt, 0, 225);
		echo "<b>Biografia</b>: ".$bio."...<br/>";
		echo "<b>Partido atual</b>: ".$array_parlamentares['data'][$i]['partido_atual']."<br/>";
		echo "<center><a href='vereador.php?id={$array_parlamentares['data'][$i]['id']}'>Ver mais detalhes do perfil e gastos</a></center><br/>";
		echo "</section>";
	}
	if ($i%2 != 0){
		echo "<section class='vereadores_list' id='last' style='visibility: hidden'>";
		echo "</section>";
	}
	
	?>
	
	
	<footer id="footer_vereadores">
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
	</div>
</body>
</html>
