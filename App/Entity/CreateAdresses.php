<?php


namespace Contact\Entity;

use Contact\Db\DataBase;
use \PDO;


class CreateAdresses
{
    public $id;
    public $id_contact;
    public string $street= '';
    public string $number='';
    public string $district='';
    public string $city='';
    public string $state='';
    public $zipcode;


    public function createAdress()
    {
        $objDatabase = new DataBase('adresses');
        $this->id = $objDatabase->insert([
            'id_contact' => $this->id_contact,
            'street' => $this->street,
            'number' => $this->number,
            'district' => $this->district,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
        ]);

        return true;
    }

    public function deleteAdress()
    {
        return (new DataBase('adresses'))->delete('id= '.$this->id);
    }

    public function updateAdress()
    {
        return (new DataBase('adresses'))->update("id=".$this->id, [
                'street' => $this->street,
                'number' => $this->number,
                'district' => $this->district,
                'city' => $this->city,
                'state' => $this->state,
                'zipcode' => $this->zipcode
            ]
        );
    }

    public static function getAdress($id)
    {
        return (new DataBase('adresses'))->select('id='.$id)
            ->fetchObject(self::class);
    }

    public static function getAdresses($where = null, $order = null, $limit = null)
    {
        return (new DataBase('adresses'))->select($where,$order,$limit)
                                               ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}