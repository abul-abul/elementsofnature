<?php

namespace App\Services;

use App\Contracts\HomeBgInterface;
use App\HomeBg;

class HomeBgService implements HomeBgInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->homebg = new HomeBg();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->homebg->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->homebg->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->homebg->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->homebg->find($id);
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
        return $this->homebg->first();
    }


}