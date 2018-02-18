<?php

namespace App\Services;

use App\Contracts\WorkShopRequestInterface;
use App\WorkShopRequest;

class WorkShopRequestService implements WorkShopRequestInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->workshoprequets = new WorkShopRequest();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->workshoprequets->get();
    }


    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->workshoprequets->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->workshoprequets->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->workshoprequets->find($id);
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