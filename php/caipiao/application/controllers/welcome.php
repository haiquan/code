<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model('caipiao');
        $data['redIndex'] = array_fill(1, 33, 'red');
        $data['blueIndex'] = array_fill(1, 16, 'blue');
        $data['result'] = $this->caipiao->getResults(1,50, Caipiao::ASC);//var_dump($data['result']);
        $this->config->load('rules', true);
        $rules = $this->config->item('rules');
        //$this->caipiao->guessCalculateFormula($rules, $data['result']);
        $this->caipiao->calculateMethod2($data['result']);
        
        /*
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][6-1] - $data[$i]["red"][1-1]', 
                        'log' => "一，当期开奖号码大小顺序第一位与第六位的差，计算的结果在下一期有可能不出。（有误）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        */
        /*
        $rule = array('method' => 'sub', 'operand' => array('first'=> 1, 'second' => 6));
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][6-1] - $data[$i]["red"][1-1]', 
                        'log' => "一，当期开奖号码大小顺序第一位与第六位的差，计算的结果在下一期有可能不出。（有误）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        $rule = array('method' => 'sub', 'operand' => array('first'=> 2, 'second' => 3));
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][3-1] - $data[$i]["red"][2-1]', 
                        'log' => "二，当期开奖号码大小顺序第二位与第三位的差，计算的结果在下一期有可能不出。（有误）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        $rule = array('method' => 'sub', 'operand' => array('first'=> 2, 'second' => 5));
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][5-1] - $data[$i]["red"][2-1]', 
                        'log' => "三，当期开奖号码大小顺序第二位与第五位的差，计算的结果在下一期有可能不出。（67期错杀21）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        $rule = array('method' => 'add', 'operand' => array('goal'=> 1, 'num' => 9));
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][1-1] + 9', 
                        'log' => "六，当期开奖号码大小顺序第一位加09，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        $rule = array('method' => 'add', 'operand' => array('goal'=> 2, 'num' => 5));
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][2-1] + 5', 
                        'log' => "七，当期开奖号码大小顺序第二位加05，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        $rule = array('method' => 'add', 'operand' => array('goal'=> 3, 'num' => 4));
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][3-1] + 4', 
                        'log' => "八，当期开奖号码大小顺序第三位加04，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        $rule = array('method' => 'add', 'operand' => array('goal'=> 3, 'num' => 7));
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][3-1] + 7', 
                        'log' => "九，当期开奖号码大小顺序第三位加07，计算的结果在下一期有可能不出。（67期杀错23）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][6-1] + 4', 
                        'log' => "十，当期开奖号码大小顺序第六位加04，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][1-1] * 4 - 2', 
                        'log' => "当期开奖号码大小顺序第一位乘4再减掉2，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '($data[$i]["red"][1-1] + $data[$i]["blue"])* 3', 
                        'log' => "当期开奖号码大小顺序第一位加当期开奖的兰号，计算的结果再乘3后，所得的号码在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);

        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][5-1] - $data[$i]["red"][4-1] + $data[$i]["blue"] + 1', 
                        'log' => "当期开奖号码大小顺序第四位与第五位的差，加当期的兰号，再加01，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][1-1] + $data[$i]["red"][2-1]', 
                        'log' => "当期开奖号码出号顺序第一位与第二位的和，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][3-1] - $data[$i]["red"][2-1]', 
                        'log' => "当期开奖号码出号顺序第二位与第三位的差，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][6-1] - $data[$i]["red"][1-1] + $data[$i]["blue"] - 3', 
                        'log' => "当期开奖号码出号顺序首尾的差，加当期开奖的兰号，再减去03，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][3-1] - $data[$i]["red"][1-1] + $data[$i]["blue"] + 2', 
                        'log' => "当期开奖号码出号顺序首尾的差，加当期开奖的兰号，再减去03，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][1-1] + $data[$i]["blue"]', 
                        'log' => "十八，当期开奖的兰号，加当期开奖号码大小顺序第一位，计算的结果在下一期有可能不出。（备注：如遇兰号重复，重复的兰号再另外减去01）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["red"][2-1] + $data[$i]["blue"] - 1', 
                        'log' => "十九，当期开奖的兰号，加当期开奖号码大小顺序第二位，再减去01，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["blue"] - $data[$i]["red"][4-1] + 1', 
                        'log' => "二十，当期开奖的兰号，减当期开奖号码大小顺序第四位，再加上01，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["blue"] - $data[$i]["red"][5-1]', 
                        'log' => "二一，当期开奖的兰号，减当期开奖号码大小顺序第五位，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["blue"] * $data[$i]["red"][1-1]', 
                        'log' => "二二，当期开奖的兰号，乘当期开奖号码大小顺序第一位，计算的结果在下一期有可能不出。",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["blue"] + 7', 
                        'log' => "二三，当期开奖的兰号，加+07，计算的结果在下一期有可能不出。 （68期错杀18）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["blue"] + 9', 
                        'log' => "二四，当期开奖的兰号，加+09，计算的结果在下一期有可能不出。（67期杀错17）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        
        $rule = array(
            'method' => 'operate', 
            'operand' => array(
                        'Formula'=> '$data[$i]["blue"] + 9', 
                        'log' => "二四，当期开奖的兰号，加+09，计算的结果在下一期有可能不出。（67期杀错17）",
                        )
                );
        $this->caipiao->calculateFormula($rule, $data['result']);
        */
        
        /*
        $data['statistics'] = $this->caipiao->getCounts($data['result']);
        $data['rand'] = $this->caipiao->giveRandomResult();
        //var_dump($data['result']);
        $data['pastPrice'] = $this->caipiao->judgeResult($data['rand'], $data['result']);
        //var_dump($data['pastPrice']);
		$this->load->view('caipiao', $data);
        */
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */