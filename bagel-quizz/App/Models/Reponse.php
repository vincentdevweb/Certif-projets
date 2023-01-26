<?php

namespace PALLAS\AutoEncheres\Models;

/*
 * Modèle Reponse
 */

class ReponseModel
{
    private int $id;
    private string $libelle_rep;
    private int $id_question;
    private string $code_r;
    private bool $bonne_rep;


    public function __construct($ReponseInfos)
    {
        $this->id = $ReponseInfos['id'];
        $this->libelle_rep = $ReponseInfos['libelle_rep'];
        $this->id_question = $ReponseInfos['id_question'];
        $this->code_r = $ReponseInfos['code_r'];
        $this->bonne_rep = $ReponseInfos['bonne_rep'];
        return $this;
    }


}
