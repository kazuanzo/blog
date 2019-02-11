<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuanzo
 * Date: 2019/02/01
 * Time: 午前0:04
 */

/*require '../config/database.php';*/

use \Mockery as M;

class TestInfo extends PHPUnit_Framework_TestCase
{
    private $target;


    public function setUp()
    {
        /*        $this->target = m::mock('overload:Info');*/
        // 引数がhogeだったら"mock : hoge"を返す
        /*        Log::info('A');*/


    }


    public function test_doSomeThing_チェックOK()
    {

        $info = new InfoUse();

        /*      $this->target->shouldReceive('getInfo')->andReturn('成功');

              $this->target->shouldReceive('num')->andReturn(5);*/


        $this->assertEquals('成功5', $info->useInfo());

    }

    /**
     * @test
     */
    public function checkNumberOwnTestExcept()
    {
        $result = 'MyException';



        try {
            $info = new InfoUse();
            $info->useInfo();
            $this->fail('例外発生なし');

        } catch (Exception $e) {
            $this->assertEquals(111, $e->getCode());
            $this->assertEquals('MyException', $e->getMessage());


        }

    }


}