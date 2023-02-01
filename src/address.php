<?php
namespace Killworm737\Twaddress;

class Address {

    public function get( $address ,$result=[] ){

        $address = str_replace('巿', '市', $address);
        $address = str_replace('褔', '福', $address);
        #以正則式分割地址
        $re = '/\w+?[縣市鄉鎮市區村里道鄰路街道段巷弄衖號樓]/u';

        preg_match_all($re, $address, $matches, PREG_SET_ORDER, 0);

        foreach ($matches as $key => $value) {
            $address = $value[0];

            $result = $this->preg($address,$result);

        }
        #將[號]的文字與數字分割
        $re = '/(?<str>\D*)?(?<num>\w*)/u';
        preg_match_all($re, $result['number'], $matches, PREG_SET_ORDER, 0);

        $result['road'] .= $matches[0]['str'];
        $result['number'] = $matches[0]['num'];

        return $result;

    }


    private function preg( $address,$result=[] ){

        $re = '/(?<county>\w+?[縣])?(?<city>\w+?[市])?(?<town>\D+?[鄉鎮區])?(?<village>\w+?[里])?(?<neig>\w+?[鄰])?(?<road>\w+?[路街道])?(?<sec>\w+?[段])?(?<lane>\w+?[巷])?(?<non>\w+?[弄])?(?<hon>\w+?[衖])?(?<number>\w+?[號])?(?<floor>\w+?[樓])?(?<other>.*)/u';

        preg_match_all($re, $address, $match, PREG_SET_ORDER, 0);

        $result['county']   = empty($result['county'])?$match[0]['county']:$result['county'];
        $result['city']     = empty($result['city'])?$match[0]['city']:$result['city'];
        $result['town']     = empty($result['town'])?$match[0]['town']:$result['town'];
        $result['neig']     = empty($result['neig'])?$match[0]['neig']:$result['neig'];
        $result['village']  = empty($result['village'])?$match[0]['village']:$result['village'];
        $result['road']     = empty($result['road'])?$match[0]['road']:$result['road'];
        $result['sec']      = empty($result['sec'])?$match[0]['sec']:$result['sec'];
        $result['lane']     = empty($result['lane'])?$match[0]['lane']:$result['lane'];
        $result['non']      = empty($result['non'])?$match[0]['non']:$result['non'];
        $result['hon']      = empty($result['hon'])?$match[0]['hon']:$result['hon'];
        $result['areaname'] = empty($result['areaname'])?'':$result['areaname'];
        $result['number']   = empty($result['number'])?$match[0]['number']:$result['number'];
        $result['floor']    = empty($result['floor'])?$match[0]['floor']:$result['floor'];
        $result['other']    = empty($result['other'])?$match[0]['other']:$result['other'];

        // 判斷村的先後順序
        if (!empty($result['other']) ) {
            if (empty($result['road']) ) {
                $result['village'] = $result['other'];
                $result['other'] = '';
            } else {
                $result['areaname'] = $result['other'];
                $result['other'] = '';
            }
        }

        return $result;
    }
}

