<?php

namespace App\Services;

use App\Contracts\AboutInterface;
use App\About;

class AboutService implements AboutInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->about = new About();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->about->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->about->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->about->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->about->find($id);
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