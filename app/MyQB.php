<?php

namespace app;
use PDO;
use Aura\SqlQuery\QueryFactory as QBAura;

class MyQB
{
    private QBAura $qbAura;
    private PDO $pdo;

    public function __construct()
    {
        //Создаём соединение к базе и инициализируем класс
        $this->pdo = new PDO('mysql:dbname=task2;host=localhost', 'mysql', 'mysql');
        $this->qbAura = new QBAura('mysql');
    }

    /**
     * Return one row from database
     * @param string $table
     * Table name in database
     * @param array $selCols
     * array name columns
     * @param int $id
     * id rows in database
     * @return mixed
     */
    public function FindOne(string $table,array $selCols, int $id = 0) {
        $select = $this->qbAura->newSelect();

        $select->cols($selCols)
            ->from($table);

        $select->where('id=:id');

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute(['id'=>$id]);

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Return all rows from database
     * @param string $table
     * Table name in db
     * @param array $selCols
     * list columns in database
     * @return array
     */
    public function getAll(string $table,array $selCols) {
        $select = $this->qbAura->newSelect();

        $select->cols($selCols)
            ->from($table);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Method deleted row from table
     * @param $table
     * Table name
     * @param int $id
     * id rows
     * @return bool
     * true/false
     */
    public function Delete($table, int $id=-1) :bool {

        if(!$id)
            return false;


        $delete = $this->qbAura->newDelete();
        $delete->from($table)
            ->where('id=:id');

        $statement = $this->pdo->prepare($delete->getStatement());
        $statement->execute(['id'=>$id]);

        return true;

    }

    /**
     * Insert data into table
     * @param string $table
     * @param array $data
     * 'name columns' => 'value','next columns'=>'value2', etc.
     * @return void
     */
    public function Insert(string $table,array $data) :void {
        $insert = $this->qbAura->newInsert();
        $insert->into($table)
            ->cols($data);

        $statement = $this->pdo->prepare($insert->getStatement());
        $statement->execute();

    }


    /**
     * Method updating data in table database.
     * @param string $table
     * @param array $data
     * @param int $id
     * @return int
     * Count row update
     */
    public function Update(string $table,array $data, int $id) :int {
        $update = $this->qbAura->newUpdate();
        $update->table($table)
            ->cols($data)
            ->where("id=:id");

        $statement =$this->pdo->prepare($update->getStatement());

        $data = $data + ['id'=>$id];

        $statement->execute($data);

        return $statement->rowCount();

    }
//$insert = $queryFactory->newInsert();
//$update = $queryFactory->newUpdate();
//$delete = $queryFactory->newDelete();

}