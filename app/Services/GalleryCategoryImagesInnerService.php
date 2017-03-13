<?php

namespace App\Services;

use App\Contracts\GalleryCategoryImagesInnerInterface;
use App\GalleryCategoryImagesInner;

class GalleryCategoryImagesInnerService implements GalleryCategoryImagesInnerInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->gallerycategoryimagesinner = new GalleryCategoryImagesInner();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->gallerycategoryimagesinner->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->gallerycategoryimagesinner->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->gallerycategoryimagesinner->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->gallerycategoryimagesinner->find($id);
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
        return $this->gallerycategoryimagesinner->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getImageFrame($id)
    {
        return $this->gallerycategoryimagesinner->where('gallery_category_images_id',$id)->get();
    }

}