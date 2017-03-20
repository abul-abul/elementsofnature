<?php

namespace App\Services;

use App\Contracts\PhotoTourInterface;
use App\PhotoTour;

class PhotoTourService implements PhotoTourInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->phototour = new PhotoTour();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->phototour->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->phototour->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->phototour->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->phototour->find($id);
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