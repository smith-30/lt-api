<?php

namespace AppBundle\Services;

use Maknz\Slack\Client;

class Slack
{
    /** @var Client  */
    private $client;

    /**
     * Slack constructor.
     *
     * @param string $slackName
     * @param string $slackChannel
     * @param string $webhookUrl
     */
    public function __construct(
        string $slackName,
        string $slackChannel,
        string $webhookUrl
    )
    {
        $settings = [
            'username' => $slackName,
            'channel' => $slackChannel,
            'link_names' => true
        ];

        $this->client = new Client($webhookUrl, $settings);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function send(string $message)
    {
        return $this->client->send($message);
    }
}