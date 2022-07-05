<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;
class TestCrom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   $data= array('data'=>'messageovertime');
        Mail::send('mail',$data,function($message){
            $message->from('noreply@messageovertime.com');
            $message->to("16bscs19138@gmail.com")
            ->subject('messageovertime');
        });
    }
}
