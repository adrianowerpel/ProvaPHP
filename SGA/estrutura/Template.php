<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 09/03/2018
 * Time: 21:37
 */

class Template
{

    function header()
    {
        session_start();

        if ((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:login.php');
        }

        echo "
<!doctype html>
<html lang='pt-br'>
<head>
	<meta charset='utf-8' />
	<link rel='icon' type='image/png' sizes='96x96' href='assets/img/favicon.png'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
	<title>Sistema de Gestão Acadêmica</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name='viewport' content='width=device-width' />
    <!-- Bootstrap core CSS     -->
    <link href='assets/css/bootstrap.min.css' rel='stylesheet' />
    <!-- Animation library for notifications   -->
    <link href='assets/css/animate.min.css' rel='stylesheet'/>
    <!--  Paper Dashboard core CSS    -->
    <link href='assets/css/paper-dashboard.css' rel='stylesheet'/>
    <!--  Fonts and icons     -->
    <link href='http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href='assets/css/themify-icons.css' rel='stylesheet'>
    <!--Meu estilo-->
    <link href='assets/css/estilo.css' rel='stylesheet'>
    
</head>
<body>
";
    }


    function footer()
    {
        echo "
<footer class='footer'>
            <div class='container-fluid'>
                <nav class='pull-left'>
                    <ul>
                        <li>
                            <a href='http://www.tassio.eti.br'  target='_blank'>Site do Prof. Tassio Sirqueira</a>
                        </li>
                        <li>
                            <a href='http://intranet.viannajunior.edu.br/' target='_blank'>Intranet do Vianna Jr.</a>
                        </li>
                    </ul>
                </nav>
                <div class='copyright pull-right'>
                    &copy; <script>document.write(new Date().getFullYear())</script>, template made with <i class='fa fa-heart heart'></i> by <a href='http://www.creative-tim.com'>Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>
</body>
</html>
";
    }


    function sidebar()
    {
        echo "
<div class='wrapper'>
	<div class='sidebar' data-background-color='white' data-active-color='danger'>

    <!--
Tip 1: you can change the color of the sidebar's background using: data-background-color='white | black'
		Tip 2: you can change the color of the active button using the data-active-color='primary | info | success | warning | danger'
	-->

    	<div class='sidebar-wrapper'>
            <div class='logo'>
                <a href='index.php'><img src='assets/img/logo.gif' width='220px'/></a>
            </div>

            <ul class='nav'>
                <li>
                    <a href='dashboard.php'>
                        <i class='ti-dashboard'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href='instituicoes.php'>
                        <i class='ti-bookmark-alt'></i>
                        <p>Instituições</p>
                    </a>
                </li>
                <li>
                    <a href='cursos.php'>
                        <i class='ti-agenda'></i>
                        <p>Cursos</p>
                    </a>
                </li>
                <li>
                    <a href='professores.php'>
                        <i class='ti-user'></i>
                        <p>Professores</p>
                    </a>
                </li>
                <li>
                    <a href='disciplinas.php'>
                        <i class='ti-book'></i>
                        <p>Disciplinas</p>
                    </a>
                </li>
                <li>
                    <a href='turmas.php'>
                        <i class='ti-folder'></i>
                        <p>Turmas</p>
                    </a>
                </li>
                <li>
                    <a href='alunos.php'>
                        <i class='ti-id-badge'></i>
                        <p>Alunos</p>
                    </a>
                </li>
                <li>
                    <a href='avaliacao.php'>
                        <i class='ti-bar-chart-alt'></i>
                        <p>Avaliação</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    
";
    }

    function navbar()
    {
        echo "
<div class='main-panel'>
		<nav class='navbar navbar-default'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar bar1'></span>
                        <span class='icon-bar bar2'></span>
                        <span class='icon-bar bar3'></span>
                    </button>
                </div>
                <div class='collapse navbar-collapse'>
                    <ul class='nav navbar-nav navbar-right'>
                        <li>
                                <i class='ti-calendar'></i>
								<p>";
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        echo strftime('%A, %d de %B de %Y', strtotime('today'));
        echo "
                                </p>
                        </li>
						<li>
                            <a href='sair.php'>
								<i class='ti-'></i>
								<p>Sair</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
";
    }

}