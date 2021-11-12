<?php

namespace Core\Service\FileReaderWriter;

use Core\Service\Session\Session;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FileReaderWriter
{
    private $path;
    private $flag;
    private $is_history;
    private $session;
    private $user;
    private $messages;

    public function __construct(ParameterBagInterface $params, Session $session, TokenStorageInterface $tokenStorage)
    {
        $this->path = $params->get('file_cache_hystory');
        $this->flag = FILE_APPEND;
        $this->is_history = true;
        $this->session = $session;

        if (null != $token = $tokenStorage->getToken()) {
            $this->user = $token->getUser();
        } else {
            $this->user = null;
        }
        $this->messages = new FileMessages();
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    public function setHistory($bool)
    {
        $this->is_history = $bool;
    }

    public function write($content = '', $params = [], $path = null)
    {
        if ($path == null) {
            $path = $this->path;
        }

        if ($content == 'CLEAR_ALL_FILE') {
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }

        $max_lines = 10000;

        if (file_exists($path)) {
            $file = array_filter(array_map("trim", file($path)));
        }else {
            $file = [];
        }

        $file = array_slice($file, 0, $max_lines);


        while(count($file) >= $max_lines){
            array_shift($file);
        }

        if (false != $message = $this->messages->get($content)) {
            $content = $message['code'] . ';' . $message['message'];

            foreach ($params as $key => $value) {
                $content = str_replace($key, $value, $content);
            }
        }

        if ($this->is_history) {
            $content = date('d-m-Y   H:i:s') . ';' . (!is_string($this->user) ? $this->session->getIPAdress() : '') . ';' . (!is_string($this->user) ? $this->user->getEmail() : '') . ';' . $content;
        }

        $content = $content . "\n";

        array_push($file, $content);
        file_put_contents($path, implode(PHP_EOL, array_filter($file)), LOCK_EX);
    }

    public function read($path = null)
    {
        if ($path == null) {
            $path = $this->path;
        }
        if (file_exists($path)) {
            return file_get_contents($path);
        } else {
            return false;
        }
    }
}
