<?php

namespace App\Services;

use App\Contracts\GalleryInterface;
use App\Gallery;

class GalleryService implements GalleryInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->gallery = new Gallery();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->gallery->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->gallery->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->gallery->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->gallery->find($id);
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
        return $this->gallery->first();
    }

    /**
     * @return mixed
     */
    public function getHomeRoleGallery()
    {
        return $this->gallery->where('role','home')->get();
    }

    

}