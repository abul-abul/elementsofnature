<?php

namespace App\Services;

use App\Contracts\GalleryCategoryImagesInnerTopInterface;
use App\GalleryCategoryImagesInnerTop;

class GalleryCategoryImagesInnerTopService implements GalleryCategoryImagesInnerTopInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->gallerycategoryimagesinnertop = new GalleryCategoryImagesInnerTop();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->gallerycategoryimagesinnertop->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->gallerycategoryimagesinnertop->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->gallerycategoryimagesinnertop->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->gallerycategoryimagesinnertop->find($id);
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

    /**
     * @return mixed
     */
    public function getFirstRow()
    {
        return $this->gallerycategoryimagesinnertop->first();
    }


}