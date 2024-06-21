<?php

namespace App\Services;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{

    protected string $queue;

    public function __construct(string $queue)
    {
        $this->queue = $queue;
    }

    public function produce(array $data): void
    {
        $connection = $this->createConnection();
        $channel = $this->createChannel($connection);

        $data = json_encode($data);

        $msg = new AMQPMessage($data);
        $channel->basic_publish($msg, '', "$this->queue");

        $channel->close();
        $connection->close();
    }


    public function consume(callable $rabbit): void
    {
        $connection = $this->createConnection();
        $channel = $this->createChannel($connection);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) use ($rabbit){
            $data = json_decode($msg->body, true);

            $rabbit($data);

            echo ' [x] DONE', "\n";
        };

        $channel->basic_consume("$this->queue", '', false, true, false, false, $callback);

        try {
            $channel->consume();
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }
    }

    public function createConnection(): AMQPStreamConnection
    {
        return new AMQPStreamConnection('rabbitmq', 5672, 'rmuser', 'rmpassword');
    }

    public function createChannel(AMQPStreamConnection $connection): AMQPChannel
    {
        $channel = $connection->channel();
        $channel->queue_declare("$this->queue", false, false, false, false);

        return $channel;
    }
}
