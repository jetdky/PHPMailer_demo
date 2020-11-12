<?php

namespace Email;

require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/SMTP.php';
require_once './PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Email
{

    public $email = '416833546@qq.com';
    public $stmpCode = 'fefoyszycuidbhij';
    public $content = '测试内容';
    public $username = '姓名';
    public $title = '主题';
    public $host126 = 'smtp.126.com';
    public $host163 = 'smtp.163.com';
    public $hostQQ = 'smtp.qq.com';
    public $debug = 0;
    public function send()
    {
        //邮箱基本设置

        /*************************发送邮件 */
        $mail = new PHPMailer();
        $mail->SMTPDebug = $this->debug;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = $this->hostQQ;;

        //linux下注意端口是都被占用问题

        // 设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;      //具体邮箱具体设置
        $mail->CharSet = 'UTF-8';

        // 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = $this->username;

        // smtp登录的账号
        $mail->Username = $this->email;
        // smtp授权码
        $mail->Password = $this->stmpCode;

        // 设置发件人邮箱地址 同登录账号
        $mail->From = $this->email;

        // 邮件正文是否为html编码 注意此处是一个方法
        $mail->isHTML(true);

        // 设置收件人邮箱地址
        $mail->addAddress($this->email);
        // 添加多个收件人 则多次调用方法即可
        // $mail->addAddress('totel_cn@126.com');

        // 添加该邮件的主题
        $mail->Subject = $this->title;

        // 添加邮件正文
        $mail->Body = $this->content;
        // 为该邮件添加附件
        // $mail->addAttachment('./example.pdf');

        // 发送邮件 返回状态
        return $mail->send();
        /*************************发送邮件 */
    }
}
