<?php

namespace App\Services;

use App\Contracts\NewsInterface;
use App\News;

class NewsService implements NewsInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->news = new News();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->news->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->news->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->news->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->news->find($id);
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