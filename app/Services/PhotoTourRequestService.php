<?php

namespace App\Services;

use App\Contracts\PhotoTourRequestInterface;
use App\PhotoTourRequest;

class PhotoTourRequestService implements PhotoTourRequestInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->phototourrequest = new PhotoTourRequest();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->phototourrequest->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->phototourrequest->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->phototourrequest->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->phototourrequest->find($id);
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