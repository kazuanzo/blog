<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuanzo
 * Date: 2019/01/31
 * Time: 午後11:00
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Info
{

    public function getInfo(){
        /*$result =DB::connection('mysql_one')
            ->table('Info')
            ->leftJoin('migrations AS sti', function($join)
            {
                $join->on('Info.id', '=', 'sti.id')
                    ->where('sti.migration', '=', '1');
            })
            ->select('*')->toSql();*/
        $result='';

        throw new Exception('MyException', 111);

        Log::debug('デバッグメッセージ');



        return $result;

    }

    public function num(){
        $num = 5+2;


        return $num;

    }

}