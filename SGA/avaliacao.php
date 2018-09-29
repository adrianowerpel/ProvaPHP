<?php

//carrega o cabeçalho e menus do site
include_once 'estrutura/Template.php';

//Class
require_once 'dao/AvaliacaoDAO.php';

$template = new Template();

$template->header();
$template->sidebar();
$template->navbar();

$object = new AvaliacaoDAO();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $curso = (isset($_POST["curso"]) && $_POST["curso"] != null) ? $_POST["curso"] : "";
    $turma = (isset($_POST["turma"]) && $_POST["turma"] != null) ? $_POST["turma"] : "";
    $aluno = (isset($_POST["aluno"]) && $_POST["aluno"] != null) ? $_POST["aluno"] : "";
    $nota1 = (isset($_POST["nota1"]) && $_POST["nota1"] != null) ? $_POST["nota1"] : "";
    $nota2 = (isset($_POST["nota2"]) && $_POST["nota2"] != null) ? $_POST["nota2"] : "";
    $notaFinal = (isset($_POST["notaFinal"]) && $_POST["notaFinal"] != null) ? $_POST["notaFinal"] : "";

} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $curso = NULL;
    $turma = NULL;
    $aluno = null;
    $nota1 = null;
    $nota2 = null;
    $notaFinal = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    $avaliacao = new Avaliacao($id, '','','','','','');
    $resultado = $object->atualizar($avaliacao);
    $curso = $resultado->getCursoIdCurso();
    $turma = $resultado->getTurmaIdTurma();
    $aluno = $resultado->getAlunoIdAluno();
    $nota1 = $resultado->getNota1();
    $nota2 = $resultado->getNota2();
    $notaFinal = $resultado->getNotaFinal();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $curso != "" && $turma != "" && $aluno != "" && $nota1 != "" && $nota2 != ""
    && $notaFinal != "") {

    $avaliacao = new Avaliacao($id, $curso, $turma, $aluno,$nota1,$nota2,$notaFinal);
    $msg =$object->salvar($avaliacao);
    $id = null;
    $curso = NULL;
    $turma = NULL;
    $aluno = null;
    $nota1 = null;
    $nota2 = null;
    $notaFinal = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $avaliacao = new Avaliacao($id, 0, '', '','','','');
    $msg = $object->remover($avaliacao);
    $id = null;
}

?>
    <div class='content' xmlns="http://www.w3.org/1999/html">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <h4 class='title'>Disciplinas</h4>
                            <p class='category'>Lista de disciplinas do sistema</p>

                        </div>
                        <div class='content table-responsive'>

                            <form action="?act=save" method="POST" name="form1" >
                                <hr>
                                <i class="ti-save"></i>
                                <input type="hidden" name="id" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                                ?>" />
                                Curso:
                                <select name="curso">
                                    <?php
                                    $query = "SELECT * FROM curso order by Nome;";
                                    $statement = $pdo->prepare($query);
                                    if ($statement->execute()) {
                                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($result as $rs) {
                                            if ($rs->idCurso == $curso) {
                                                echo "<option value='$rs->idCurso' selected>$rs->Nome</option>";
                                            } else {
                                                echo "<option value='$rs->idCurso'>$rs->Nome</option>";
                                            }
                                        }
                                    } else {
                                        throw new PDOException("Erro: Não foi possível executar a declaração sql");
                                    }
                                    ?>
                                </select>

                                Turma:
                                <select name="turma">
                                    <?php
                                    $query = "SELECT * FROM turma order by Nome;";
                                    $statement = $pdo->prepare($query);
                                    if ($statement->execute()) {
                                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($result as $rs) {
                                            if ($rs->idTurma == $turma) {
                                                echo "<option value='$rs->idTurma' selected>$rs->Nome</option>";
                                            } else {
                                                echo "<option value='$rs->idTurma'>$rs->Nome</option>";
                                            }
                                        }
                                    } else {
                                        throw new PDOException("Erro: Não foi possível executar a declaração sql");
                                    }
                                    ?>
                                </select>

                                Aluno:
                                <select name="aluno">
                                    <?php
                                    $query = "SELECT * FROM aluno order by Nome;";
                                    $statement = $pdo->prepare($query);
                                    if ($statement->execute()) {
                                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($result as $rs) {
                                            if ($rs->idAluno == $aluno) {
                                                echo "<option value='$rs->idAluno' selected>$rs->Nome</option>";
                                            } else {
                                                echo "<option value='$rs->idAluno'>$rs->Nome</option>";
                                            }
                                        }
                                    } else {
                                        throw new PDOException("Erro: Não foi possível executar a declaração sql");
                                    }
                                    ?>
                                </select>

                                Nota 1:
                                <input type="number" min="0" max="10" name="nota1" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($nota1) && ($nota1 != null || $nota1 != "")) ? $nota1 : '';
                                ?>" />

                                Nota 2:
                                <input type="number" min="0" max="10" name="nota2" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($nota2) && ($nota2 != null || $nota2 != "")) ? $nota2 : '';
                                ?>" />

                                Nota 2:
                                <input type="number" min="0" max="10" name="notaFinal" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($notaFinal) && ($notaFinal != null || $notaFinal != "")) ? $notaFinal : '';
                                ?>" />

                                <input type="submit" VALUE="Cadastrar"/>
                                <hr>
                            </form>
                            <?php
                            echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';
                            //chamada a paginação
                            $object->tabelapaginada();
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