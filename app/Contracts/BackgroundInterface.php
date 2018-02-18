<?php

namespace App\Contracts;

interface BackgroundInterface
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
     * @return mixed
     */
    public function getInYourSpaceBg();

    /**
     * @return mixed
     */
    public function getHomeBg();

    /**
     * @return mixed
     */
    public function getGalleryCategoryImages();

    /**
     * @return mixed
     */
    public function getWorkshopBackgrountImages();

    /**
     * @return mixed
     */
    public function getPhotoTourBackgrountImages();

    /**
     * @return mixed
     */
    public function getConnectBackgroundImages();

    /**
     * @param $id
     * @param $role
     * @return mixed
     */
    public function getCurrenBg($id,$role);
}
