<?php

namespace App\Domains\Email;

use Illuminate\Support\Facades\Mail;
use Lucid\Foundation\QueueableJob;

/**
 * Class SendMailJob
 *
 * @purpose : This job ise used to send mail using queues
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Domains\Email
 */
class SendMailJob extends QueueableJob
{
    protected $email_data;
    protected $email_view;

    /**
     * SendMailJob constructor.
     *
     * @purpose : This job ise used to send mail using queues
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param array $email_data
     * @param string $email_view
     */
    public function __construct(array $email_data,string $email_view)
    {
        $this->email_data=$email_data;
        $this->email_view=$email_view;
    }

    /**
     * handle()
     * Execute the job.
     *
     * @purpose : This job ise used to send mail using queues
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return void
     */
    public function handle()
    {
        $is_sent = false;
        $email_data=$this->email_data;

        if(!empty($email_data['to']))
        {
            Mail::send($this->email_view, ['email_data'=>$this->email_data], function ($message) use ($email_data) {

                $message->to($email_data['to'])->subject($email_data['subject']);
                if(!empty($email_data['cc']))
                {
                    $message->cc($email_data['cc']);
                }
            });
        }
    }
}
