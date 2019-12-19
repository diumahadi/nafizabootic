<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 09-Jun-19
 * Time: 7:57 AM
 */

class Common_model extends CI_Model
{

    public function getUUID()
    {
        return uniqid();
    }

    public function getDate($param_date)
    {
        //given format: 2017-12-11
        //return format: 11-12-2017
        $date = date_create($param_date);
        return date_format($date, "d-M-Y");//11-12-2017
    }

    public function getCurrentDateTime()
    {
        return date('d/m/Y h:i A');
    }

    public function getCurrentTimestamp()
    {
        return date('Y-m-d H:i:s');
    }


}