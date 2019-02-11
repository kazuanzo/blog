<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuanzo
 * Date: 2019/02/05
 * Time: 午後11:24
 */

class InfoUse
{


    public function useInfo(){

     /*   try{*/
            $info = new Info();


            $result = $info->getInfo();




     /*   } catch(Exception $e) {

            $e->getCode();


        }*/

        $result = $result . $info->num();




        return  $result;
    }


}