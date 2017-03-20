<?php

namespace App\Services;

use App\Contracts\ConnectInterface;
use App\Connect;

class ConnectService implements ConnectInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->connect = new Connect();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->connect->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->connect->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->connect->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->connect->find($id);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function getUpdateData($id,$data)
    {
        return $this->getOne($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteData($id)
    {
        return $this->getOne($id)->delete();
    }



}