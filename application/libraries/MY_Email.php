<?php

class MY_Email extends CI_Email
{
    public $config;

    public function get_config()
    {
        $this->config = [
            'protocol' => getenv('EMAIL_PROTOCOL'),
            'smtp_host' => getenv('EMAIL_SMTP_HOST'),
            'smtp_user' => getenv('EMAIL_SMTP_USER'),
            'smtp_pass' => getenv('EMAIL_SMTP_PASSWORD'),
            'smtp_port' => getenv('EMAIL_SMTP_PORT'),

            'mailtype' => 'html',
            'newline' => "\r\n",
            'sender_name' => getenv('EMAIL_SENDER_NAME'),
            'starttls'  => true,
        ];

        if (getenv('EMAIL_GMAIL') == true) {
            $this->config['protocol'] = getenv('EMAIL_GMAIL_PROTOCOL');
            $this->config['smtp_host'] = getenv('EMAIL_GMAIL_HOST');
            $this->config['smtp_user'] = getenv('EMAIL_GMAIL_USER');
            $this->config['smtp_pass'] = getenv('EMAIL_GMAIL_PASSWORD');
            $this->config['smtp_port'] = getenv('EMAIL_GMAIL_PORT');
        }

        return $this->config;
    }
}
