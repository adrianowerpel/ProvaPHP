<?php
/**
 * Created by PhpStorm.
 * User: T-Gamer
 * Date: 25/03/2018
 * Time: 18:58
 */

class disciplina
{
    private $idDisciplina;
    private $professor;
    private $nome;
    private $sigla;
    private $cargaHoraria;

    /**
     * disciplina constructor.
     * @param $idDisciplina
     * @param $professor
     * @param $nome
     * @param $sigla
     * @param $cargaHoraria
     */
    public function __construct($idDisciplina, $professor, $nome, $sigla, $cargaHoraria)
    {
        $this->idDisciplina = $idDisciplina;
        $this->professor = $professor;
        $this->nome = $nome;
        $this->sigla = $sigla;
        $this->cargaHoraria = $cargaHoraria;
    }

    /**
     * @return mixed
     */
    public function getIdDisciplina()
    {
        return $this->idDisciplina;
    }

    /**
     * @param mixed $idDisciplina
     */
    public function setIdDisciplina($idDisciplina)
    {
        $this->idDisciplina = $idDisciplina;
    }

    /**
     * @return mixed
     */
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * @param mixed $professor
     */
    public function setProfessor($professor)
    {
        $this->professor = $professor;
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
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * @param mixed $sigla
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }

    /**
     * @return mixed
     */
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }

    /**
     * @param mixed $cargaHoraria
     */
    public function setCargaHoraria($cargaHoraria)
    {
        $this->cargaHoraria = $cargaHoraria;
    }


}