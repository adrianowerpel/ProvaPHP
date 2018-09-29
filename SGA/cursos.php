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
require_once 'dao/cursoDAO.php';

$template = new Template();

$template->header();
$template->sidebar();
$template->navbar();

$object = new cursoDAO();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $instituicao = (isset($_POST["instituicao"]) && $_POST["instituicao"] != null) ? $_POST["instituicao"] : "";
    $sigla = (isset($_POST["sigla"]) && $_POST["sigla"] != null) ? $_POST["sigla"] : "";

} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $instituicao = NULL;
    $sigla = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    $curso = new curso($id, '', '', '');
    $resultado = $object->atualizar($curso);
    $nome = $resultado->getNome();
    $instituicao = $resultado->getInstituicao();
    $sigla = $resultado->getSigla();
}
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    $curso = new curso($id, $instituicao, $nome, $sigla);
    $msg = $object->salvar($curso);
    $id = null;
    $nome = null;
    $instituicao = null;
    $sigla = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $curso = new curso($id, '', '', '');
    $msg = $object->remover($curso);
    $id = null;
}

?>
    <div class='content' xmlns="http://www.w3.org/1999/html">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <h4 class='title'>Cursos</h4>
                            <p class='category'>Lista de cursos do sistema</p>

                        </div>
                        <div class='content table-responsive'>

                            <form action="?act=save" method="POST" name="form1">
                                <hr>
                                <i class="ti-save"></i>
                                <input type="hidden" name="id" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                                ?>"/>
                                Nome:
                                <input type="text" size="40" name="nome" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($nome) && ($nome != null || $nome != "")) ? $nome : '';
                                ?>"/>
                                Sigla:
                                <input type="text" size="20" name="sigla" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($sigla) && ($sigla != null || $sigla != "")) ? $sigla : '';
                                ?>"/>
                                Instituição:
                                <select name="instituicao"><?php
                                    $query = "SELECT * FROM Instituicao order by Nome;";
                                    $statement = $pdo->prepare($query);
                                    if ($statement->execute()) {
                                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($result as $rs) {
                                            if ($rs->idInstituicao == $instituicao) {
                                                echo "<option value='$rs->idInstituicao' selected>$rs->Sigla</option>";
                                            } else {
                                                echo "<option value='$rs->idInstituicao'>$rs->Sigla</option>";
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
