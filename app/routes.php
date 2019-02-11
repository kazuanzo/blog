<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{


    Log::info('A');

    $info = new InfoUse();
    $info->useInfo();


});


Route::get('/test', function()
{

    $result = DB::connection('mysql_one')
        ->table('title AS t')
        ->leftJoin('title_delivery AS td', 't.full_title_id', '=', 'td.full_title_id')
        ->leftJoin('appli_title_subscription AS ats', 't.full_title_id', '=', 'ats.full_title_id')
        ->leftJoin('title_rating AS tr', 't.full_title_id', '=', 'tr.full_title_id')
        ->leftJoin('subscription_title_info AS sti', function($join)
        {
            $join->on('t.full_title_id', '=', 'sti.full_title_id')
                ->where('sti.publish_from_datetime', '<', date("Y-m-d H:i:s"))
                ->where('sti.publish_to_datetime', '>', date("Y-m-d H:i:s"));
        })
        ->select(
            'td.vm_cc',
            'td.vm_fullhd',
            'sti.subscription_type',
            'ats.publish_from_datetime AS subs_publish_from_datetime',
            \DB::raw('IFNULL(ats.publish_to_datetime,"2999-12-31 23:59:59") AS subs_publish_to_datetime')
        )
        ->where('t.delete_flag', 0)
        ->where('t.full_title_id', '1111111')
        // ペアレンタルコントロール(セッションには "0" or "99"の数値が格納)
        ->whereRaw('IFNULL(tr.parental_age_limit, 0) <= '.Session::get('user.parental_age'))
        ->first()->toSql();
    var_dump($result);


    return View::make('hello');
});
