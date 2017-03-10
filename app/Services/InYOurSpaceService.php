<?php

namespace App\Services;

use App\Contracts\InYOurSpaceInterface;
use App\InYourSpace;

class InYOurSpaceService implements InYOurSpaceInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->inyourspace = new InYourSpace();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->inyourspace->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->inyourspace->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->inyourspace->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->inyourspace->find($id);
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
        return $this->inyourspace->first();
    }


}