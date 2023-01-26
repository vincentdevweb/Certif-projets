<?php

/*
 * Modèle Questions
 */
class QuestionModel
{
    private int $id;
    private string $libelle_q;
    private string $code_q;

    public function __construct($QuestionInfos) {
        $this->id = $QuestionInfos['id'];
        $this->libelle_q = $QuestionInfos['libelle_q'];
        $this->code_q = $QuestionInfos['code_q'];
        return $this;
    }

}
