<?php

class Telephone extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "Telephone";
    }

    public function ajouter($data)
    {
        $this->sql = "insert into " . $this->table . "(
                 nom, 
                 prix,
                 description, 
                 courte_description,
                 quantite) VALUE ( :nom, 
                 :prix,
                 :description, 
                 :courte_description,
                 :quantite)";
        return $this->getLines($data, null);
    }

    public function getAllTelephones()
    {
        $this->sql = "select t.*,i.chemin_image from  $this->table 
                      t left join Image i  on t.id_telephone = i.id_telephone";
        return $this->getLines();
    }

    public function supprimer($data)
    {
        $this->sql = "delete from $this->table where id_telephone=:id_telephone";
        return $this->getLines($data, null);
    }

    public function getOneById($data)
    {
        $this->sql = "select t.*,i.chemin_image from  $this->table 
                      t left join Image i  on t.id_telephone = i.id_telephone where t.id_telephone = :id_telephone";
        return $this->getLines($data, true);
    }
    public function updateTelById($data)
    {
        $this->sql = "update " . $this->table . " set nom = :nom,
         prix = :prix,
         quantite = :quantite,
         description = :description,
         courte_description = :courte_description
         where id_telephone = :id_telephone
         ";
        return $this->getLines($data, null);
    }
    public function getTelephoneByRecherche($recherche)
    {
        $this->sql = "select t.*,i.chemin_image from  $this->table 
        t left join Image i  on t.id_telephone = i.id_telephone
        WHERE t.nom LIKE :recherche OR t.description LIKE :recherche";
        return $this->getLines(['recherche' => '%' . $recherche . '%']);
    }
}
