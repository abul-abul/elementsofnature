<?php

namespace App\Services;

use App\Contracts\GalleryCategoryInterface;
use App\GalleryCategory;

class GalleryCategoryService implements GalleryCategoryInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->gallerycategory = new GalleryCategory();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->gallerycategory->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->gallerycategory->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->gallerycategory->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->gallerycategory->find($id);
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
        return $this->gallerycategory->first();
    }


}