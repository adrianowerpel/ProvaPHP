<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 09/01/2018
 * Time: 09:49
 */

require_once "PHPlot/phplot.php";

require_once "db/conexao.php";

#Instancia o objeto e setando o tamanho do grafico na tela
$grafico = new PHPlot(600,400);

#Indicamos o títul do gráfico e o título dos dados no eixo X e Y do mesmo
$grafico->SetTitle("Nota 1");
$grafico->SetXTitle("Alunos");
$grafico->SetYTitle("Notas");

$id = $_GET['id'];

$query = "SELECT Nome, Nota1 FROM Avaliacao, Aluno where Aluno_idAluno=idAluno and Turma_idTurma = $id order by Nome;";
$statement = $pdo->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$rs = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($rs as $value) {
    $resultado[] = $value;
}

$data = array();

if(isset($resultado)) {
    foreach ($resultado as $r){
        $data[] = [$r['Nome'], $r['Nota1']];
    }
} else {
    $data[]=[null,null];
}

$grafico->SetDefaultTTFont('assets/fonts/Timeless.ttf');

$grafico->SetDataValues($data);

#Neste caso, usariamos o gráfico em barras
$grafico->SetPlotType("bars");

#Exibimos o gráfico
$grafico->DrawGraph();