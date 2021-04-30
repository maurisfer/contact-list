<?php


namespace Contact\Entity;

use Contact\Db\DataBase;
use \PDO;


class CreateContact
{

    public int $id;
    public string $name;
    public string $email;

    public function createContact()
    {
        $objDatabase = new DataBase('contacts');
        $this->id = $objDatabase->insert([
            'name' => $this ->name,
            'email' => $this->email
        ]);

        //Retornar Sucesso
        return true;
    }


    public function updateContact()
    {
        return (new DataBase('contacts'))->update("id=".$this->id, [
            'name' => $this ->name,
            'email' => $this->email
            ]
        );
    }


    public function deleteContact()
    {
        return (new DataBase('contacts'))->delete('id= '.$this->id);
    }


    public static function getContact($id)
    {
        return (new DataBase('contacts'))->select('id='.$id)
                                                ->fetchObject(self::class);
    }

    public static function getContacts($where = null, $order = null, $limit = null): array
    {
        return (new DataBase('contacts'))->select($where,$order,$limit)
                                               ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



}