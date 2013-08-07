<?php 

class Caipiao extends CI_Model {
    
    CONST KEY_PREFIX = 'caipiao_';
    CONST RED_COUNT = 6;
    CONST DESC = 'desc';
    CONST ASC = 'asc';
    
    public function __construct(){
        //$this->load->driver('cache');
    }
    
    public function getAllInfos($page=1, $pagesize=-1, $order='desc'){
        $this->load->database();
        //var_dump($this->cache->memcached);
        //$re = $this->cache->memcached->get(self::KEY_PREFIX . 'all');
        //if(!empty($re)){
        //    echo "read from the cache\n";
        //    return $re;
        //}
        $this->db->select();
        if($pagesize > 0){
            $this->db->limit($pagesize, ($page-1) * $pagesize);
        }
        $this->db->from('caipiao');
        $this->db->order_by("id", $order);
        $query = $this->db->get();
        $result = $query->result();
        //echo "read from the db\n";
        //$this->cache->memcached->set(self::KEY_PREFIX . 'all', $result);
        return $result;
    }
    
    public function getResults($page=1 , $pagesize=-1, $asc=true){
        $data = $this->getAllInfos($page, $pagesize);
        function sortById($a, $b){return $a->id > $b->id ? 1:-1;}
        usort($data, 'sortById');
        $result = array();
        foreach ($data as $row) {
            $balls = explode(',', $row->result);
            //var_dump($balls);
            $tmp = array();
            $tmp['id'] = $row->id;
            $tmp['blue'] = $balls[self::RED_COUNT];
            unset($balls[self::RED_COUNT]);
            $tmp['red'] = $balls;
            $tmp['date'] = $row->date;
            $result[] = $tmp;
        } 
        unset($data);
        unset($balls);
        return $result;
    }
    
    private function sortById($a, $b){
        return $a['id'] < $b['id'] ? 1:-1;
    }
    
    // 统计各个红/蓝球出现次数
    public function getCounts($data, $maxRedLength=33, $maxBlueLength=16){
        $result['red'] = array_fill(1, $maxRedLength, 0);
        $result['blue'] = array_fill(1, $maxBlueLength, 0);
        foreach($data as $row){
            foreach ($row['red'] as $value) {
                $result['red'][(int)$value]++;
            } 
            $result['blue'][(int)$row['blue']]++;
        }
        $statistics['red'] = $this->caipiao->sortArray($result['red']);
        $statistics['blue'] = $this->caipiao->sortArray($result['blue']);
        return $statistics;
    }
    
    // 统计各个蓝球出现次数
    public function getBlueCounts($data, $maxLength=16){
        $result = array_fill(1, $maxLength, 0);
        foreach($data as $row){
            $result[$row['blue']]++;
        }
        $statistics = $this->caipiao->sortArray($result);
        return $statistics;
    }
    
    // 按照key对数组进行排序
    // $maxLength key的最大值
    public function sortArray($data, $maxLength=16){
        $result = array_fill(1, $maxLength, 0);
        foreach ($data as $key => $value) {
            $result[$key] = $value;
        }
        return $result;
    }
    
    // 随机给出一组结果
    public function giveRandomResult($redNeed=6, $blueNeed=1, $maxRedLength=33, $maxBlueLength=16){
        // 抽红球
        $result = array();
        $result = $this->getRands($redNeed, $maxRedLength);
        $result = array_merge($result, $this->getRands($blueNeed, $maxBlueLength));
        return $result;
    }
    
    // 随机抽球
    private function getRands($need, $maxLength){
        // 初始化数组
        $balls = array();
        for($i=1; $i <=$maxLength; $i++ ){
            $balls[$i] = sprintf("%02d", $i);
        }
        
        // 抽球
        $result = array();
        $length = $maxLength;
        for($i=1; $i <=$need; $i++ ){
            $index = rand(1, $length);
            $result[] = $balls[$index];
            $balls[$index] = $balls[$length];
            unset($balls[$length--]);
        }
        
        sort($result);
        return $result;
    }
    
    // 判断newRow的命中率
    public function judgeResult($newRow, $data){
        $result = array();
        $blue = $newRow[self::RED_COUNT];
        unset($newRow[self::RED_COUNT]);
        $red = $newRow;
        foreach ($data as $row) {
            $tmp = array_intersect($red, $row['red']);
            if($blue == $row['blue'] || count($tmp) >=4){
                $one['red'] = $tmp;
                $one['blue'] = $blue;
                $one['old'] = $row;
                $result[] = $one;
            }
        } 
        return $result;
    }
    
    public function calculateFormula($rule, $data){
        $newMethod = $rule['method'] . 'CalculateFormula';
        var_dump("-----------------------start---------------------------");
        $result = self::$newMethod($rule['operand'], $data);
        //var_dump("------------------------end----------------------------");
    }
    
    // $operand = array('Formula' => 'XXX+XXX', 'log' => 'XXXXXX');  $i * 4 - 2
    public function operateCalculateFormula($operand, $data){        
        $num = count($data);
        $counter = 0;
        for($i=0;$i < $num-1;$i++){
            $str = "return " . $operand['Formula'] . ";";
            //var_dump($str);
            $tmp = eval($str);
            if(!in_array($tmp, $data[$i+1]['red'])){
                $counter++;
                var_dump('本期', $tmp);
                var_dump('下一期', $data[$i+1]);
                var_dump('************************************');
            }
        }
        var_dump("{$operand['log']}");
        var_dump('总共组数：'. $num);
        var_dump('满足这个条件的组数：'. $counter);
        var_dump('准确率', $counter / $num);
        
    }
    
    // 统计各种规则的正确率  config['rules']
    public function statisticsCalculateFormula($rules, $datas){
        foreach($rules as $rule){
            $counter = 0;
            foreach($datas as $i => $data){
                if(!isset($datas[$i+1]))break;
                $num = count($datas);
                $str = "return " . $rule['operand']['Formula'] . ";";
                $tmp = eval($str);
                if(!in_array($tmp, $datas[$i+1]['red'])){
                    $counter++;
                }
            }
            var_dump("{$rule['operand']['log']}");
            var_dump('总共组数：'. $num);
            var_dump('满足这个条件的组数：'. $counter);
            var_dump('准确率', $counter / $num);
        }
    }
    
    // 根据某一期的结果利用所有规则，推测下一期的结果 config['rules']
    public function guessCalculateFormula($rules, $datas){
        $redIndex = array_fill(1, 33, 'red');
        foreach($redIndex as $key => $value){
            $redIndex[$key] = $key;
        }
        //var_dump($redIndex);
        foreach($datas as $i => $data){
            if(!isset($datas[$i+1]))break;
            $tmpIndex = $redIndex;
            foreach($rules as $rule){
                $num = count($datas);
                $str = "return " . $rule['operand']['Formula'] . ";";
                $tmp = eval($str);
                if(in_array($tmp, $tmpIndex)){
                    unset($tmpIndex[$tmp]);
                }
            }
            var_dump("猜测结果",$tmpIndex);
            var_dump("真正结果",$datas[$i+1]);
            // 准确率不行
        }
    }
    
    public function calculateMethod2($data){
        foreach ($data as $value) {
            $sum = array_sum($value['red']); // loop through values 
            $result = array();
            foreach ($value['red'] as $ball) {
                $result[] = floor(($sum - $ball) / $ball) % 10;
            }
            var_dump($value, $result);
            array_unique($result);
            $re = array();
            foreach ($result as $value) {
                // loop through values 
                $tmp0 = 0 + $value;
                if($tmp0 <= 33 && $tmp0 > 0)
                    array_unshift($re,$tmp0);
                $tmp10 = 10 + $value;
                if($tmp10 <= 33 && $tmp10 > 0)
                    array_unshift($re,$tmp10);
                $tmp20 = 20 + $value;
                if($tmp20 <= 33 && $tmp20 > 0)
                    array_unshift($re,$tmp20);
                $tmp30 = 30 + $value;
                if($tmp30 <= 33 && $tmp30 > 0)
                    array_unshift($re,$tmp30);
            } 
            $re = array_unique($re);
            sort($re);
            var_dump($re);
        } 
    }
}