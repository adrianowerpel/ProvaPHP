<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 16/03/2018
 * Time: 21:17
 */

class aluno
{

    private $idAluno;
    private $matricula;
    private $nome;

    /**
     * alunos constructor.
     * @param $idAluno
     * @param $matricula
     * @param $nome
     */
    public function __construct($idAluno, $nome, $matricula)
    {
        $this->idAluno = $idAluno;
        $this->matricula = $matricula;
        $this->nome = $nome;
    }


    /**
     * @return mixed
     */
    public function getIdAluno()
    {
        return $this->idAluno;
    }

    /**
     * @param mixed $idAluno
     */
    public function setIdAluno($idAluno)
    {
        $this->idAluno = $idAluno;
    }


    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

}
