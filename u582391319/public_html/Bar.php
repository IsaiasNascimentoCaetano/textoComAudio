<nav id="userBar">
		
	<ul id="barList">			
						
		<li id="logo"><a href="index.php"><img src="imagesSite/logo.png" height="48px" width="auto"></a></li>
							
		<?php
		
		include_once "autoload.php";
						
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
				
			echo '			
			<li class="options" id="loginLogoutButton"><a href="logout.php">Deslogar</a></li>
			<li class="options" id="sugestion"><a href="#">Sugestões(0)</a></li>
			<li class="options" id="userStoriePage"><a href="userStories.php">Minha histórias</a></li>
			<li class="options" id="new"><a href="createStories.php">Criar nova história</a></li>
			<li class="options" id="profile"><a href="userPage.php">Minha página</a></li>';
						
		}
		else{
				
			echo '<li class="options" id="loginLogoutButton" ><a href="createUser.php">Logar</a></li>';			
				
		}
						
		?>
								
	</ul>
														
</nav>