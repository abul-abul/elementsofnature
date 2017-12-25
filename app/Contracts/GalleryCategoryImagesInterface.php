<?php

namespace App\Contracts;

interface GalleryCategoryImagesInterface
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
     * @return mixed
     */
    public function getFirstRow();

    /**
     * @param $id
     * @return mixed
     */
    public function getSelectGalleryCatImages($id);

    /**
     * @return mixed
     */
    public function getHomeFeaturesImages();

    /**
     * @return mixed
     */
    public function getLastRow();

    /**
     * @param $id
     * @return mixed
     */
    public function lastPic($id);

    /**
     * @param $id
     * @return mixed
     */
    public function nextPic($id);
}
