<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/09/2018
 * Time: 21:31
 */

class professor
{
    private $idProfessor;
    private $nome;
    private $cargo;

    /**
     * professor constructor.
     * @param $idProfessor
     * @param $nome
     * @param $cargo
     */
    public function __construct($idProfessor, $nome, $cargo)
    {
        $this->idProfessor = $idProfessor;
        $this->nome = $nome;
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getIdProfessor()
    {
        return $this->idProfessor;
    }

    /**
     * @param mixed $idProfessor
     */
    public function setIdProfessor($idProfessor)
    {
        $this->idProfessor = $idProfessor;
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

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
}