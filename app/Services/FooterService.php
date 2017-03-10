<?php

namespace App\Services;

use App\Contracts\FooterInterface;
use App\Footer;

class FooterService implements FooterInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->footer = new Footer();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->footer->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->footer->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->footer->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->footer->find($id);
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
        return $this->footer->first();
    }


}