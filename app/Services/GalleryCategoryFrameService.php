<?php

namespace App\Services;

use App\Contracts\GalleryCategoryFrameInterface;
use App\GalleryCategoryFrame;

class GalleryCategoryFrameService implements GalleryCategoryFrameInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->frame = new GalleryCategoryFrame();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->frame->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->frame->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->frame->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->frame->find($id);
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
     * @param $id
     * @return mixed
     */
    public function getDeleteNullFids($id)
    {
        return $this->frame->where('gallery_category_frame_id',$id)->where('size',null)->where('frame',null)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAllCanvas($id)
    {
        return $this->frame->where('gallery_category_frame_id',$id)->get();

    }

}