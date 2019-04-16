<?php
	
	session_start();
	
	include_once "autoload.php";
	
	$crud = new CRUDStories();
	
	//$stories = array();
	$stories = $crud->GetMoreRecentStories();
	
	
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<title>Kurz</title>
	<link rel="stylesheet" href="style.css">
	
</head>

<body>

	<script type="text/javascript" src="changePage.js"></script>

	<div id="content">
			
		<p class="title">Melhores e novas histórias com música e som</p>
		
		<?php
						
		if(sizeof($stories) > 0){
			
			for($i = 0; $i < 2; $i++){
				
				$link = "changePage({$stories[$i]->idStories})";

				switch($i){
					
					case 2:
					
						echo '<div class="news another" onClick="'.$link.'">';
						break;
						
					default:
				
						echo '<div class="news" onClick="'.$link.'">';	
						break;
					
				}
				
				date_default_timezone_set('America/Sao_Paulo');
				$dateP  = new DateTime($stories[$i]->publication);
				
				echo '<p class="textTitle"><a href="#">Título: '. $stories[$i]->title .'</a></p>';
				echo '<img src="'. $stories[$i]->sinopse->imageSinopse->imagePath .'" class="sinopseImage">';
				echo '<p class="sinopse"><a href="#">Sinopse: </a>' . $stories[$i]->sinopse->sinopse . '<p>';
				echo '<p class="genre"><a href="#">Gênero: </a>' . utf8_encode($stories[$i]->genre->genre) . '</p>';
				echo '<p class="author">Autor: <a href="#">'. $stories[$i]->userData->userName .'</a></p>';
				echo '<p class="date">Data de publicação: ' . $dateP->format("d-m-Y") . '</p>';
				echo '<p class="note">Avaliação dos leitores: ' . $stories[$i]->avaliation .'</p>';
				
				echo '</div>';
				
			}
						
		}
		?>
			
		<p class="title another">Sobre o site</p>

		<br>

		<div id="about">

			<p></p>
			<p>Esse é meu primeiro site que faz algo, não vou falar algo útil, mas algo que funciona. Sinceramente, eu odeio mexer com javascript e css, principalmente
css. Neste site consegui escrever mais ou menos 730 linhas de css, o que já é um grande avanço.</p>
                <p>Para o pessoal que não entende de programação, meu nome é Isaias Nascimento Caetano Pinto(não riam do último nome, é de origem portuguesa, ou seja,
em Portugal é um sobrenome comum, assim como o Silva é aqui no Brasil), sou um desenvolvedor(ou programador) que as vezes cria alguma coisa, geralmente bem ruim.</p>
                <p>Tive a ideia de criar esse site, na madrugada do dia 6 de outubro de 2016, quando comecei a reler uma fanfic que escrevi(inclusive a única até a presente data),
e lembrei das músicas que eu escutava enquanto escrevia. Lembrando dessas músicas, pensei da seguinte forma: "E se o leitor tivesse a possibilidade de sentir a mesma coisa que 
o escritor sentiu quando criou a história? Nem que fosse ao menos a música que ele escutou, para se inspirar ou se transportar para o universo da história?"</p>
                <p>Inicialmente achei a ideia muito tosca, inútil(como ainda acho as vezes), mas fui falar com um amigo meu, o famoso Victor, ou Victorovski(sei lá como se escreve
), e ele ficou empolgado com a ideia e assim comecei a fazer o site, claro, bem devagar, pois estava no meu primeiro semestre de faculdade. Logo consegui uma outra inspiração, 
que me fez seguir até agora(não vou falar o que ou quem, mas é a melhor inspiração possível).</p>
                <p>Então hoje, dia 16 de dezembro de 2016, lanço o Kurz, uma plataforma onde você pode escrever sua história e colocar a música para acompanhar, tipo uma
songfic.</p>
                <p>Aproveitem</p>

		</div>

		</br>
			
	</div>
	
	<?php
				
		include_once "Bar.php";
		
	?>
	
</body>
</html>