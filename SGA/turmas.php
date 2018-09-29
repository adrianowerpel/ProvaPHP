<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 09/01/2018
 * Time: 13:33
 */

//carrega o cabeçalho e menus do site
include_once 'estrutura/Template.php';

//Class
require_once 'dao/turmaDAO.php';

$template = new Template();

$template->header();
$template->sidebar();
$template->navbar();

$object = new turmaDAO();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $disciplina = (isset($_POST["disciplina"]) && $_POST["disciplina"] != null) ? $_POST["disciplina"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $disciplina = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $turma = new turma($id, '','');

    $resultado = $object->atualizar($turma);
    $nome = $resultado->getNome();
    $disciplina = $resultado->getDisciplina();
}
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    $turma = new turma($id, $disciplina, $nome);
    $msg =$object->salvar($turma);
    $id = null;
    $nome = null;
    $disciplina = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $turma = new turma($id, '', '');
    $msg = $object->remover($turma);
    $id = null;
}

?>
    <div class='content' xmlns="http://www.w3.org/1999/html">
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='card'>
                            <div class='header'>
                                <h4 class='title'>Turmas</h4>
                                <p class='category'>Lista de Turmas do sistema</p>

                            </div>
                            <div class='content table-responsive'>

                                <form action="?act=save" method="POST" name="form1" >
                                    <hr>
                                    <i class="ti-save"></i>
                                    <input type="hidden" name="id" value="<?php
                                    // Preenche o id no campo id com um valor "value"
                                    echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                                    ?>" />
                                    Nome:
                                    <input type="text" size="50" name="nome" value="<?php
                                    // Preenche o nome no campo nome com um valor "value"
                                    echo (isset($nome) && ($nome != null || $nome != "")) ? $nome : '';
                                   ?>" />
                                    Disciplina:
                                    <select name="disciplina"><?php
                                        $query = "SELECT * FROM Disciplina order by Nome;";
                                        $statement = $pdo->prepare($query);
                                        if ($statement->execute()) {
                                            $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($result as $rs) {
                                                if ($rs->idDisciplina == $disciplina) {
                                                    echo "<option value='$rs->idDisciplina' selected>$rs->Nome</option>";
                                                } else {
                                                    echo "<option value='$rs->idDisciplina'>$rs->Nome</option>";
                                                }
                                            }
                                        } else {
                                            throw new PDOException("Erro: Não foi possível executar a declaração sql");
                                        }
                                    ?>
                                    </select>
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