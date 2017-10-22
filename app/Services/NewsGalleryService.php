<?php

namespace App\Services;

use App\Contracts\NewsGalleryInterface;
use App\NewsGallery;

class NewsGalleryService implements NewsGalleryInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->newsgallery = new NewsGallery();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->newsgallery->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->newsgallery->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->newsgallery->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->newsgallery->find($id);
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
     * @param $id
     * @return mixed
     */
    public function newsByGallery($id)
    {
        return $this->newsgallery->where('news_id',$id)->get();
    }

    
}