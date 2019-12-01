<?php

namespace App\Http\Controllers\Home;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersInfos;
use Hash;
use Mail;
use Cookie;
use Gregwar\Captcha\CaptchaBuilder;//引入第三方验证码类库
use App\Services\OSS;//导入阿里 oss类

class RegisterController extends Controller
{
    public function code()
    {
        ob_clean();
        //清除操作
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session(['vcode' => $phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        //die;
    }

    public function index()
    {
        return view('home.register.index');
    }

    //token验证
    public function changeStatus($id, $token)
    {
        $user = Users::find($id);
        if ($user->token != $token) {
            echo "<script>alert('链接失效');</script>";
        }
        $user->status = 1;
        $user->token = str_random(30);
        $res = $user->save();
        if ($res) {
            echo "<script>alert('激活成功');</script>";
        } else {
            echo "<script>alert('激活失败');</script>";
        }

    }

    public function insert(Request $request)
    {
        $upwd = $request->input('eupwd');
        $pwd = $request->input('epwd');
        $email = $request->input('email');

        //验证码
        $codes = $request->input('codes');
        $vcode = session('vcode');
        //dd($codes,$vcode);exit;
        if ($vcode != $codes) {
            return back()->with('cerror', '验证码输入错误');
            exit;
        }
        //验证密码
        if ($upwd != $pwd) {
            return back()->with('err', '两次密码输入不一致');
            exit;
        }
        $token = str_random(30);
        $user = new Users;
        $user->password = Hash::make($pwd);
        $user->email = $email;
        $user->token = $token;

        $rand = str_random(5);
        $user-> uname = "新用户" . $rand;

        $res1 = $user->save();
        //往users_infos表压入uid和默认头像

        $data1 = new UsersInfos;
        $data1->uid = $user->id;
        //压入默认头像
        $data1->profile = "pic/pic.jpg";
        $res = $data1->save();


        if ($res1 && $res) {
            //发送邮箱
            Mail::send('home.register.mail', ['id' => $user->id, 'token' => $token], function ($m) use ($email) {//use 在关联函数内调用外部变量
                $s = $m->to($email)->subject('E-shop提醒邮件!');
                if ($s) {
                    echo "<script>alert('您已注册成功,请尽快激活');location.href='/home/index';</script>";
                }
            });
        }
    }

    //手机注册
    public function store(Request $request)
    {
        //验证手机验证码
        $phone = $request->input('phone', 0);
        $code = $request->input('code');
        $upwd = $request->input('upwd');
        $pwd = $request->input('pwd');
        if ($upwd != $pwd) {
            return back()->with('err', '两次密码输入不一致');
            exit;
        }
        //获取发送到手机上的验证码
        $k = $phone . '_code';

        $phone_code = session($k);
        if ($phone_code != $code) {
            echo "<script>alert('验证码错误');location.href='/home/register';</script>";
            exit;
        }
        $data = $request->all();
        $user = new Users;

        $rand = str_random(5);
        $user->uname = "新用户" . $rand;

        $user->password = Hash::make($data['pwd']);
        $user->phone = $data['phone'];
        $res = $user->save();

        //往users_infos表压入uid和默认头像

        $data1 = new UsersInfos;
        $data1->uid = $user->id;
        //压入默认头像
        $data1->profile = "pic/pic.jpg";
        $res1 = $data1->save();
        if ($res && $res1) {
            echo "<script>location.href='/home/index';alert('注册成功');</script>";
        }


    }

    public function sendPhone(Request $request)
    {
        $phone = $request->input('phone');

        header('content-type:text/html;charset=utf-8');

        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
        $code = rand(1234, 6543);
        //把发送的验证码存入cookie中
        Cookie::queue('pcode', $code, 1);
        $k = $phone . '_code';
        session([$k => $code]);
        $smsConf = array(
            'key' => 'c1d5754db0565a339cd976ae7cdb66cd', //您申请的APPKEY
            'mobile' => $phone, //接受短信的用户手机号码
            'tpl_id' => '190330', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' => '#code#=' . $code,//您设置的模板变量，根据实际情况修改
            'dtype' => 'json'
        );

        $content = self::juhecurl($sendUrl, $smsConf, 1); //请求发送短信

        echo $content;
    }


    /**
     * 请求接口返回内容
     * @param string $url [请求的URL地址]
     * @param string $params [请求的参数]
     * @param int $ipost [是否采用POST形式]
     * @return  string
     */
    public static function juhecurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }

    //测试第三方类 发送验证码
    public function sendp(Request $request)
    {
        $p = '18686766897';
        phone($p);
    }

    public function checkphone(Request $request)
    {
        $phone = $request->input('phone');
        //echo $phone;
        $arr = Users::pluck('phone')->toArray();
        if (in_array($phone, $arr)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function checkemail(Request $request)
    {
        $email = $request->input('email');
        //echo $phone;
        $arr = Users::pluck('email')->toArray();
        if (in_array($email, $arr)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function checkcode(Request $request)
    {
        $code = $request->input('code');
        if (isset($_COOKIE['pcode']) && !empty($code)) {
            $pcode = $request->cookie('pcode');
            if ($code == $pcode) {
                echo 1;//一致
            } else {
                echo 2;//不一致
            }
        } else if (empty($code)) {
            echo 3;//输入验证码为空
        } else {
            echo 4;//过期
        }
    }

    public function checkcodes(Request $request)
    {
        $codes = $request->input('codes');
        if (session('vcode') == $codes) {
            echo 1;
        } else {
            echo 2;
        }
    }
}
