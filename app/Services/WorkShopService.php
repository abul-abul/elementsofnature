<?php

namespace App\Services;

use App\Contracts\WorkShopInterface;
use App\WorkShop;

class WorkShopService implements WorkShopInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->workshop = new WorkShop();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->workshop->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->workshop->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->workshop->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->workshop->find($id);
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