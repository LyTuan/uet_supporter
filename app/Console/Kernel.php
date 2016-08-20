<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\News;
use App\User;
use Mail;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
     \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //Lấy link học bổng học phí
        $schedule->call(function () {
             $html = file_get_contents("http://uet.vnu.edu.vn/coltech/taxonomy/term/54");
             libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHTML($html);
            $links = $dom->getElementsByTagName('a');
            foreach ($links as $link){
                $nodeValue= $link->nodeValue;

                $atribute = $link->getAttribute('href');
                $findNews = News::where('link',$atribute)->get()->toArray();
                if($findNews==null){
                        $user = new News;
                    $user->title = $nodeValue;
                    $user->link = $atribute;
                    $user->user_id='4';
                    $user->category_id='1';
                    $user->status='2';
                    $user->save();      
                }
            }
            libxml_clear_errors();
        //Lấy dữ liệu thông báo nộp học phí
             
             $html = file_get_contents("http://uet.vnu.edu.vn/coltech/taxonomy/term/56");
             libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHTML($html);
            $links = $dom->getElementsByTagName('a');
            foreach ($links as $link){
                $nodeValue= $link->nodeValue;

                $atribute = $link->getAttribute('href');
                $findNews = News::where('link',$atribute)->get()->toArray();
                if($findNews==null){
                        $user = new News;
                    $user->title = $nodeValue;
                    $user->link = $atribute;
                    $user->user_id='4';
                    $user->category_id='2';
                    $user->status='2';
                    $user->save();      
                }
            }

            libxml_clear_errors();
        //Gửi mail cho toàn bộ sinh viên có mail đã đăng ký.
                    $data = News::where('status','2')->get()->toArray();
                    if($data!=null){
                        Mail::send('emails.notification',[ 'data_news'=>$data], function ($message) {
                        $message->from('supporteruet@gmail.com', 'UET-SUPPORTER');
                        $user = User::select('email')->get()->toArray();
                        foreach($user as $data){
                        if($data['email']!=null){
                        $email = $data['email'];
                        $message->to($email)->subject('Thông báo');        
                        }
                        }                        
                    });
                }
            //Chỉnh lại cờ status từ 2 thành 1.
            News::where('status','2')->update(['status'=>'1']);
        })->everyMinute();
       
    }
}
    