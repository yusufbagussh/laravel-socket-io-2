<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EveryoneEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Nama koneksi antrian yang digunakan saat menyiarkan event.
     *
     * @var string
     */
    public $connection = 'redis';

    /**
     * Nama antrian tempat pekerjaan siaran ditempatkan.
     *
     * @var string
     */
    public $queue = 'default';

    /**
     * Membuat instance event baru.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Mendapatkan channel yang harus disiarkan event.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('EveryoneChannel');
    }

    /**
     * Nama siaran event.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'EveryoneMessage';
    }

    /**
     * Mendapatkan data yang akan disiarkan.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'message' => 'Hello!'
        ];
    }
}
