<?php
/**
 * @author Alexander Korzhavin <san_rrz@mail.ru>
 * Date: 24.10.2017
 * Time: 8:32
 */

namespace App;

class Alert
{
    private $message;
//    private $status;
    private $reload;

    /**
     * Alert constructor.
     */
    public function __construct()
    {
        $this->message = '';
//        $this->status = false;
        $this->reload = false;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function message(string $message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param bool $status
     * @return $this
     */
//    public function status(bool $status)
//    {
//        $this->status = $status;
//        return $this;
//    }

    /**
     * @param bool $reload
     */
    public function reload(bool $reload)
    {
        $this->reload = $reload;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode([
           'message' => $this->message,
//           'status' => $this->status,
           'reload' => $this->reload,
        ]);
    }
}