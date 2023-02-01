<?php

namespace Killworm737\Twaddress\Tests;

use PHPUnit\Framework\TestCase;
use Killworm737\Twaddress\Address;

class RuleTest extends TestCase {
    public function testRule1() {
        $rule = new Address();
        $str = '桃園市龜山區山頂里2鄰正興街10巷5號';

        $arr = array_values($rule->get($str));

        $_t = ["","桃園市","龜山區","2鄰","山頂里","正興街","","10巷","","","","5號","",""];
        $this->assertSame($_t, $arr);

    }
    public function testRule2() {
        $rule = new Address();
        $str = '桃園市龍潭區中豐路533巷3弄1衖1號5樓';

        $arr = array_values($rule->get($str));

        $_t = ["","桃園市","龍潭區","","","中豐路","","533巷","3弄","1衖","","1號","5樓",""];

        $this->assertSame($_t, $arr);
    }

    public function testRule3() {
        $rule = new Address();
        $str = '宜蘭縣三星鄉三星路八段長埤236巷18號';

        $arr = array_values($rule->get($str));

        $_t = ["宜蘭縣","","三星鄉","","","三星路","八段","長埤236巷","","","","18號","",""];
        $this->assertSame($_t, $arr);
    }

    public function testRule4() {
        $rule = new Address();
        $str = '新北市瑞芳區建基路一段弘祥新村1號';

        $arr = array_values($rule->get($str));

        $_t = ["","新北市","瑞芳區","","","建基路","一段","","","","弘祥新村","1號","",""];
        $this->assertSame($_t, $arr);
    }

    public function testRule5() {
        $rule = new Address();
        $str = '彰化縣秀水鄉鶴鳴村彰鹿路139號';

        $arr = array_values($rule->get($str));

        $_t = ["彰化縣","","秀水鄉","","鶴鳴村","彰鹿路","","","","","","139號","",""];
        $this->assertSame($_t, $arr);
    }

}
