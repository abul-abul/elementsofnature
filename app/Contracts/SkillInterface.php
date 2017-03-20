<?php

namespace App\Contracts;

interface SkillInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function getAllPaginate();

    /**
     * @param $data
     * @return mixed
     */
    public function createData($data);

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id);

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function getUpdateData($id,$data);


    /**
     * @param $id
     * @return mixed
     */
    public function deleteData($id);

    /**
     * @param $id
     * @return mixed
     */
    public function getWorkshopSkiils($id);

    /**
     * @param $id
     * @return mixed
     */
    public function getPhotoTourSkiils($id);

}
