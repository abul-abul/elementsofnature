<?php

namespace App\Contracts;

interface FooterInterface
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
    public function getOneRowInYourSpace();

    /**
     * @return mixed
     */
    public function getOneRowGalleryCategory();

    /**
     * @return mixed
     */
    public function getOneRowGalleryCategoryImages();

    /**
     * @return mixed
     */
    public function getOneRowGalleryCategoryImagesInner();

    /**
     * @return mixed
     */
    public function getOneRowWorkShop();

    /**
     * @return mixed
     */
    public function getOneRowPhotoTour();

    /**
     * @return mixed
     */
    public function getOneRowConnect();

    /**
     * @return mixed
     */
    public function getOneRowAbout();

}
