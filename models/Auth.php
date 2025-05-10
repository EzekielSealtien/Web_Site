<?php

class  Auth extends Model
{
    const ADMIN = 1;
    const CLIENT = 1;

    public function __construct()
    {
        parent::__construct();
        $this->table = "Utilisateur";
    }

    public function inscription($data)
    {
        $this->sql = "insert into " . $this->table . "(nom, 
                        prenom, 
                        email, telephone, date_naissance, 
                        id_role, mot_de_passe) values (:nom,:prenom, 
                        :email, :telephone, :date_naissance, 
                        :id_role, :mot_de_passe) ";

        return $this->getLines($data, null);
    }

    public function findByEmail($data)
    {
        $this->sql = "select f.*,r.description from " . $this->table . " f join Role r on f.id_role = r.id_role where email = :email";
        return $this->getLines($data, true);
    }

    public function findById($data)
    {
        $this->sql = "select f.*,r.description from " . $this->table . " f join Role r on f.id_role = r.id_role where id_utilisateur = :id_utilisateur";
        return $this->getLines($data, true);
    }

    public function updateById($data)
    {
        $this->sql = "update " . $this->table . " set nom = :nom,
         prenom = :prenom,
         email = :email,
         date_naissance = :date_naissance,
         telephone = :telephone
         where id_utilisateur = :id_utilisateur
         ";
        return $this->getLines($data, null);
    }

    public function deleteById($data)
    {

        $this->sql = "delete from " . $this->table . " 
        where id_utilisateur = :id_utilisateur";
        return $this->getLines($data, null);
    }
    public function getAllUsers()
    {
        $this->sql = "select * from utilisateur";
        return $this->getLines();
    }
}
