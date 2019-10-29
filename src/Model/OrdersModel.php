<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class OrdersModel extends DbEntity
{
    public $SQL = <<<SQL
    SELECT orders.discription, orders.dateStart, orders.time, users.login, users.pass, users.name, users.surname, orders.discription, orders.dateStart, orders.time, user_group.cod, user_group.description FROM orders, users, user_group WHERE orders.users_id = users.id;
SQL;

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("orders.id, orders.discription, orders.dateStart, orders.time, users.name, users.surname")
        ->setFrom("orders, users")
        ->setWhere("orders.users_id = users.id")
        ->setOrderBy("`users`.`id`");

        // echo $this->getSQL();

        return parent::getPage($page);
    }
}