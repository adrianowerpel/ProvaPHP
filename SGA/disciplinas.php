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
require_once 'dao/disciplinaDAO.php';

$template = new Template();

$template->header();
$template->sidebar();
$template->navbar();

$object = new disciplinaDAO();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $professor = (isset($_POST["professor"]) && $_POST["professor"] != null) ? $_POST["professor"] : "";
    $sigla = (isset($_POST["sigla"]) && $_POST["sigla"] != null) ? $_POST["sigla"] : "";
    $cargaHoraria = (isset($_POST["cargaHoraria"]) && $_POST["cargaHoraria"] != null) ? $_POST["cargaHoraria"] : "";

} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $professor = NULL;
    $sigla = null;
    $cargaHoraria = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    $disciplina = new disciplina($id, '','','','');
    $resultado = $object->atualizar($disciplina);
    $nome = $resultado->getNome();
    $professor = $resultado->getProfessor();
    $sigla = $resultado->getSigla();
    $cargaHoraria = $resultado->getCargaHoraria();
}
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    $disciplina = new disciplina($id, $professor, $nome, $sigla,$cargaHoraria);
    $msg =$object->salvar($disciplina);
    $id = null;
    $nome = null;
    $professor = null;
    $sigla = null;
    $cargaHoraria = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $disciplina = new disciplina($id, 0, '', '',0);
    $msg = $object->remover($disciplina);
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
                                    Nome:
                                    <input type="text" size="40" name="nome" value="<?php
                                    // Preenche o nome no campo nome com um valor "value"
                                    echo (isset($nome) && ($nome != null || $nome != "")) ? $nome : '';
                                   ?>" />
                                    Sigla:
                                    <input type="text" size="5" name="sigla" value="<?php
                                    // Preenche o nome no campo nome com um valor "value"
                                    echo (isset($sigla) && ($sigla != null || $sigla != "")) ? $sigla : '';
                                    ?>" />
                                    Carga Horaria:
                                    <input type="number" min="1" max="80" name="cargaHoraria" value="<?php
                                    // Preenche o nome no campo nome com um valor "value"
                                    echo (isset($cargaHoraria) && ($cargaHoraria != null || $cargaHoraria != "")) ? $cargaHoraria : '';
                                    ?>" />
                                    Professor:
                                    <select name="professor">
                                        <?php
                                        $query = "SELECT * FROM Professor order by Nome;";
                                        $statement = $pdo->prepare($query);
                                        if ($statement->execute()) {
                                            $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($result as $rs) {
                                                if ($rs->idProfessor == $professor) {
                                                    echo "<option value='$rs->idProfessor' selected>$rs->Nome</option>";
                                                } else {
                                                    echo "<option value='$rs->idProfessor'>$rs->Nome</option>";
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