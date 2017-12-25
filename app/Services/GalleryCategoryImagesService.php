<?php

namespace App\Services;

use App\Contracts\GalleryCategoryImagesInterface;
use App\GalleryCategoryImages;

class GalleryCategoryImagesService implements GalleryCategoryImagesInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->gallerycategoryimages = new GalleryCategoryImages();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->gallerycategoryimages->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->gallerycategoryimages->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->gallerycategoryimages->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->gallerycategoryimages->find($id);
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
        return $this->gallerycategoryimages->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSelectGalleryCatImages($id)
    {
        return $this->gallerycategoryimages->where('gallery_category_id',$id)->get();
    }

    /**
     * @return mixed
     */
    public function getHomeFeaturesImages()
    {
        return $this->gallerycategoryimages->where('featured_images',1)->orderBy('id', 'desc')->take(9)->get();
    }

    /**
     * @return mixed
     */
    public function getLastRow()
    {
        return $this->gallerycategoryimages->latest()->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function lastPic($id)
    {
        return $this->gallerycategoryimages->where('id','<',$id)->orderby('ID', 'ASC')->limit(1)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function nextPic($id)
    {
        return $this->gallerycategoryimages->where('id','>',$id)->orderby('ID', 'ASC')->limit(1)->get();
    }

}