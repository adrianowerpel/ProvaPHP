<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 09/01/2018
 * Time: 20:02
 */

class instituicao {

    private $idInstituicao;
    private $Nome;
    private $Sigla;

    /**
     * instituicao constructor.
     * @param $idInstituicao
     * @param $Nome
     * @param $Sigla
     */
    public function __construct($idInstituicao, $Nome, $Sigla)
    {
        $this->idInstituicao = $idInstituicao;
        $this->Nome = $Nome;
        $this->Sigla = $Sigla;
    }

    public function getidInstituicao() {
        return $this->idInstituicao;
    }

    public function setidInstituicao($idInstituicao) {
        $this->idInstituicao = $idInstituicao;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function getSigla() {
        return $this->Sigla;
    }

    public function setSigla($Sigla) {
        $this->Sigla = $Sigla;
    }


}


