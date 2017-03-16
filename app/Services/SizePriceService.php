<?php

namespace App\Services;

use App\Contracts\SizePriceInterface;
use App\SizePrice;

class SizePriceService implements SizePriceInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->size_price = new SizePrice();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->size_price->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->size_price->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->size_price->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->size_price->find($id);
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