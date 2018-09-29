<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 09/01/2018
 * Time: 10:53
 */

//carrega a conexão com o banco
require_once 'db/conexao.php';

//carrega o template
include_once 'estrutura/Template.php';

$template = new Template();
$template->header();
$template->sidebar();
$template->navbar();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
}

?>
    <div class='content' xmlns="http://www.w3.org/1999/html">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <h4 class='title'>Dashboard</h4>
                            <p class='category'>Acompanhamento do desenpenhos dos alunos</p>

                        </div>
                        <div class='content table-responsive'>


                            <form action="?act=listar" method="POST" name="form1" >
                                <hr>
                                Turma:
                                <select name="id">
                                    <?php

                                    $query = "SELECT * FROM Turma";

                                    foreach ($pdo->query($query) as $value) {
                                    $resultado[] = $value;
                                    }

                                    if(isset($resultado)) {
                                        foreach ($resultado as $r){
                                            echo "<option value=$r[idTurma]>$r[Nome]</option>";
                                        }
                                    } else {
                                        echo "Nenhum Registro Encontrado";
                                    }

                                    ?>
                                </select>
                                <input type="submit" VALUE="Selecionar"/>
                                <hr>
                            </form>

                            <?php
                            if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "listar" && $id != "") {

                                echo "<img src=graficoNota1.php?id=$id />";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$template->footer();
?>