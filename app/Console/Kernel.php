<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\News;
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
        // $schedule->command('inspire')
        //          ->hourly();
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
                    $user->save();    
                }
                // else{
                    // $user = new News;
                    // $user->title = 'Thong tin title';
                    // $user->link = 'Thong tin link';
                    // $user->user_id='4';
                    // $user->category_id='1';
                    // $user->save();     
                // }
                
            }
            libxml_clear_errors();
                    $data=['lytuan'];
            Mail::send('emails.welcome', $data, function ($message) {
            $message->from('supporteruet@gmail.com', 'UET-SUPPORTER');

            $message->to('lytuanwork@gmail.com')->subject('Introduction');
             });
        })->everyMinute();
       
    }
}
    