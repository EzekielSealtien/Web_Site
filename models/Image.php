<?php

class Image extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "Image";
    }

    /**
     * @param $data
     * @return bool
     */
    public function ajouter($data)
    {
        $this->sql = "insert into $this->table(id_telephone,chemin_image) 
                                        values (:id_telephone,:chemin_image)";
        return $this->getLines($data, null);
    }
    public function updateImage($data)
    {
        $this->sql = "update " . $this->table . " set chemin_image= :chemin_image
         where id_telephone = :id_telephone
         ";
        return $this->getLines($data, null);
    }
}
