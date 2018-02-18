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

    /**
     * @return mixed
     */
    public function getOneRowInYourSpace()
    {
        return $this->footer->where('role','inyourspace')->first();
    }

    /**
     * @return mixed
     */
    public function getOneRowGalleryCategory()
    {
        return $this->footer->where('role','gallery_category')->first();
    }

    /**
     * @return mixed
     */
    public function getOneRowGalleryCategoryImages()
    {
        return $this->footer->where('role','gallery_category_images')->first();
    }

    /**
     * @return mixed
     */
    public function getOneRowGalleryCategoryImagesInner()
    {
        return $this->footer->where('role','gallery_category_images_inner')->first();
    }

    /**
     * @return mixed
     */
    public function getOneRowWorkShop()
    {
        return $this->footer->where('role','workshop')->first();
    }

    /**
     * @return mixed
     */
    public function getOneRowPhotoTour()
    {
        return $this->footer->where('role','phototour')->first();
    }

    /**
     * @return mixed
     */
    public function getOneRowConnect()
    {
        return $this->footer->where('role','connect')->first();
    }

    /**
     * @return mixed
     */
    public function getOneRowAbout()
    {
        return $this->footer->where('role','about')->first();
    }

    /**
     * @param $id
     * @param $role
     * @return mixed
     */
    public function getFotterBg($id,$role)
    {
        return $this->footer->where('role',$role)->where('page_id',$id)->first();
    }

}