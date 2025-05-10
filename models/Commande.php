<?php

class Commande extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "Commande";
    }

    /**
     * @param $data
     * @return bool
     */
    public function insererCommande($data)
    {
        $this->sql = "insert into $this->table(quantite,prix,statut,date_creation,id_utilisateur,mode_paiement) 
                                        values (:quantite,:prix,:statut,:date_creation,:id_utilisateur,:mode_paiement)";
        return $this->getLines($data, null);
    }


    public function getAllCommandes(){
        $this->sql="select * from $this->table";
        return $this->getLines();
    }

    public function findById($data)
    {
        $this->sql = "select * from " . $this->table . " where id_commande = :id_commande";
        return $this->getLines($data, true);
    }

    public function updateById($data)
    {
        $this->sql = "update ". $this->table . " set quantite = :quantite,
         prix = :prix,
         statut = :statut,
         date_creation = :date_creation,
         id_utilisateur = :id_utilisateur,
         mode_paiement=:mode_paiement
         where id_commande = :id_commande
         ";
        return $this->getLines($data, null);
    }
    
    public function deleteById($data)
    {
        $this->sql = "delete from " . $this->table . " 
        where id_commande = :id_commande";
        return $this->getLines($data, null);
    }
    
}