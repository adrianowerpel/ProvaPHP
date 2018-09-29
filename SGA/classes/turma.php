<?php
/**
 * Created by PhpStorm.
 * User: T-Gamer
 * Date: 25/03/2018
 * Time: 19:00
 */

class turma
{
    private $idTurma;
    private $disciplina;
    private $nome;

    /**
     * turma constructor.
     * @param $idTurma
     * @param $disciplina
     * @param $nome
     */
    public function __construct($idTurma, $disciplina, $nome)
    {
        $this->idTurma = $idTurma;
        $this->disciplina = $disciplina;
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getIdTurma()
    {
        return $this->idTurma;
    }

    /**
     * @param mixed $idTurma
     */
    public function setIdTurma($idTurma): void
    {
        $this->idTurma = $idTurma;
    }

    /**
     * @return mixed
     */
    public function getDisciplina()
    {
        return $this->disciplina;
    }

    /**
     * @param mixed $disciplina
     */
    public function setDisciplina($disciplina): void
    {
        $this->disciplina = $disciplina;
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
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }




}