<?php

class  Adresse extends Model
{
    

    public function __construct()
    {
        parent::__construct();
        $this->table = "Adresse";
    }

    public function insererAdresse($data)
    {
        $this->sql = "insert into " . $this->table . "(rue, 
                        ville, 
                        code_postal, province, defaut,id_utilisateur) values (:rue,:ville, 
                        :code_postal, :province, :defaut, 
                        :id_utilisateur)";

        return $this->getLines($data, null);
    }

    public function getOneById($data)
    {
        $this->sql = "select * from  $this->table 
                       where id_utilisateur = :id_utilisateur";
        return $this->getLines($data, true);
    }

    
}
