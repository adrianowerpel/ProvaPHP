<?php
/**
 * Created by PhpStorm.
 * User: T-Gamer
 * Date: 25/03/2018
 * Time: 18:51
 */

class curso
{
    private $idCurso;
    private $instituicao;
    private $nome;
    private $sigla;

    /**
     * curso constructor.
     * @param $idCurso
     * @param $instituicao
     * @param $nome
     * @param $sigla
     */
    public function __construct($idCurso, $instituicao, $nome, $sigla)
    {
        $this->idCurso = $idCurso;
        $this->instituicao = $instituicao;
        $this->nome = $nome;
        $this->sigla = $sigla;
    }


    /**
     * @return mixed
     */
    public function getIdCurso()
    {
        return $this->idCurso;
    }

    /**
     * @param mixed $idCurso
     */
    public function setIdCurso($idCurso): void
    {
        $this->idCurso = $idCurso;
    }

    /**
     * @return mixed
     */
    public function getInstituicao()
    {
        return $this->instituicao;
    }

    /**
     * @param mixed $instituicao
     */
    public function setInstituicao($instituicao): void
    {
        $this->instituicao = $instituicao;
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
    public function setSigla($sigla): void
    {
        $this->sigla = $sigla;
    }


}