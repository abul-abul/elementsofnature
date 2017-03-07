<?php

namespace App\Services;

use App\Contracts\PartnersInterface;
use App\Partners;

class PartnersService implements PartnersInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->partners = new Partners();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->partners->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->partners->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->partners->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->partners->find($id);
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