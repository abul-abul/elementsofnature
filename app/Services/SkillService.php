<?php

namespace App\Services;

use App\Contracts\SkillInterface;
use App\Skill;

class SkillService implements SkillInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->skill = new Skill();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->skill->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->skill->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->skill->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->skill->find($id);
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
    public function getWorkshopSkiils($id)
    {
        return $this->skill->where('workshop_id',$id)->where('role','workshop')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPhotoTourSkiils($id)
    {
        return $this->skill->where('workshop_id',$id)->where('role','phototour')->get();
    }


}