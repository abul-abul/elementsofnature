<?php

namespace App\Services;

use App\Contracts\PaymentInterface;
use App\PayUser;

class PaymentService implements PaymentInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->payuser = new PayUser();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->payuser->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->payuser->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->payuser->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->payuser->find($id);
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