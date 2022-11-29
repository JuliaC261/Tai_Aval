<?php
include('conexao2.php');


//se existir email ou se existir senha, faz o login
if(isset($_POST['email']) || isset($_POST['senha'])) {
    //verificar se o campo email esta em branco
    if(strlen($_POST['email'])== 0) { //strlen = qntd de caracteres
        echo "Preencha seu e-mail";
    
    //verificar se o campo senha está em branco 
    }else if(strlen($_POST['senha'])== 0) {
        echo "Preencha sua senha";
    }else{
        //real-escape-string = limpa a string q está no campo email
        //evita invasões indesejadas
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        //sql query
        $sql_code = "SELECT * FROM usuarios WHERE 
                    email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or 
            die ("Falha na execução do código SQL: " . $mysqli->error);

        //verificar se a qntdade de registros q a consulta retornou é 1. 
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            //vai pegar os dados do BD e atribuir para a variavel
            $usuario = $sql_query->fetch_assoc();

            //criar uma nova sessão
            //se nao existir sessao, inicia uma 
            if(!isset($_SESSION)){
                session_start();
            }
            //variavel que continua válida, por um determinado período 
            //de tempo mesmo qndo a pessoa troca de página. 
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome']; 

            //redirecionar o usuário para outra página
            header("Location: painel.php");             

        }else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
    }
?>


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <script src="https://kit.fontawesome.com/fd833eef09.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link href="../estilos/style.css" rel="stylesheet"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!--tag para site responsivo-->
	<meta name="description" content="Descrição do meu web site"> <!--para o google encontrar o site-->
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<title>Museu Standfild</title>
</head>

<body>
		
	<!--iniciar a marcação do menu do site-->
	<header>
		<div class="center">
		<div class="logo left">Museu Standfield</div> <!--logo-->
		<nav class="desktop right"> <!--site será responsivo-->
			<ul>

				<li><a href="../index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="contato.php">Cadastro</a></li>
			</ul>
		</nav>
		
		<nav class="mobile right"> <!--site será responsivo-->
			<div class="botao-menu-mobile">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</div>
			<ul>
				<li><a href="../index.php">Home</a></li>

				<li><a href="login.php">Login</a></li>
				<li><a href="contato.php">Cadastro</a></li>
			</ul>
		</nav>
		<div class="clear"></div>
		</div><!--center-->
	</header>

    <section class="banner-principal">
		<div class="overlay"></div>
		<div class="center">
		<!--formulario onde o usuario vai colocar o email-->
	

		</div>
	</section>


    <br>
<center>
	<h1> Faça o seu login!</h1>
	<br>
<div class="center">
    <form action="" method="POST">
        <p> 
        <label>E-mail</label>
        <input type="text" name="email">
        </p>

        <p>
        <label>Senha</label>
        <input type="password" name="senha">

        <p>
        <button type="submit">Entrar</button>
        </p>

        </p>
    </form>
 
    </div>
</center>
<br>

		<div class="clear"></div> <!--limpar toda flutuacao da pagina.-->

	</section>
	
	<section class="especialidades"> <!--especialidades-->
		<div class="center"> 
			<h2 class="title">Especialidades</h2>
		
			<div class="w33 left box-especialidade">
				<h3><i class="fa-brands fa-css3"></i></h3>
				<h4>CSS3</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. </p>
			</div><!--box-especialidades-->
			<div class="w33 left box-especialidade">
				<h3><i class="fa-brands fa-html5"></i></h3>
				<h4>HTML5</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. </p>
			</div><!--box-especialidades-->
			<div class="w33 left box-especialidade">
				<h3><i class="fa-brands fa-js"></i></h3>
				<h4>JavaScript</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. </p>
			</div><!--box-especialidades-->
			<div class="clear"></div>
		</div><!--center-->
	

	</section><!--especialidades-->

	<section class="extras">
		<div class="center">
			<div class="w50 left depoimentos-container">
				<h2 class="title">Depoimentos dos nossos clientes</h2>
				<div class="depoimento-single">
					<p class="depoimento-descricao">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p class="nome-autor">João Da Silva</p>
				</div>
				<div class="depoimento-single">
					<p class="depoimento-descricao">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p class="nome-autor">Jorge Da Silva</p>
				</div>
				<div class="depoimento-single">
					<p class="depoimento-descricao">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p class="nome-autor">José Da Silva</p>
				</div>
			</div><!--W50-->
			<div class="w50 left servicos-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
				<ul>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
				</ul>
			</div><!--servicos-->
			</div><!--W50-->
			<div class="center"></div>
			<div class="clear"></div>
		</div><!--center-->

	</section><!--extras-->



	<footer>
	<div class="center">
		<p>Todos os direitos reservados</p>
	</div><!--center--> 
	</footer>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>


	

</body>
</html>

</body>
</html>