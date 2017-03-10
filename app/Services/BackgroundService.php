<?php

namespace App\Services;

use App\Contracts\BackgroundInterface;
use App\Background;

class BackgroundService implements BackgroundInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->background = new Background();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->background->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->background->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->background->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->background->find($id);
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
        return $this->background->first();
    }

    /**
     * @return mixed
     */
    public function getInYourSpaceBg()
    {
        return $this->background->where('role','inyourspace')->first();
    }

    /**
     * @return mixed
     */
    public function getHomeBg()
    {
        return $this->background->where('role','home')->first();
    }

}