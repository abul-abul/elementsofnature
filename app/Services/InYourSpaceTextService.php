<?php

namespace App\Services;

use App\Contracts\InYourSpaceTextInterface;
use App\InYourSpaceText;

class InYourSpaceTextService implements InYourSpaceTextInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->inyourspacetext = new InYourSpaceText();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->inyourspacetext->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->inyourspacetext->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->inyourspacetext->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->inyourspacetext->find($id);
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
        return $this->inyourspacetext->first();
    }


}