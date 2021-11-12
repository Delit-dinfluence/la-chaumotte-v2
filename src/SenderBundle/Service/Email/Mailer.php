<?php

namespace Sender\Service\Email;

use Doctrine\ORM\EntityManagerInterface;
use Sender\Entity\EmailApplication;
use Swift_Mailer;
use Swift_SmtpTransport;

class Mailer
{
    private $em;
    private $configuration;
    private $mailer;
    private $templating;
    private $message;


    public function __construct(EntityManagerInterface $entityManager, \Twig_Environment $templating)
    {
        $this->em = $entityManager;
        $this->templating = $templating;
    }

    public function initialize($key = null)
    {
        $this->configuration = $this->em->getRepository(EmailApplication::class)->findByKey($key);
        $email = $this->configuration->getEmail();

        $transport = (new Swift_SmtpTransport($email->getHost(), $email->getPort(), $email->getEncryption()))
            ->setUsername($email->getUsername())
            ->setPassword($email->getPassword());

        $this->mailer = new Swift_Mailer($transport);
    }

    public function compose($to, $content, $params = [])
    {
        (key_exists('subject', $params) ? $subject = $params['subject'] : $subject = $this->configuration->getSubject());
        (key_exists('from', $params) ? $from = $params['from'] : $from = $this->configuration->getEmail()->getUsername());
        (key_exists('sender', $params) ? $sender = $params['sender'] : $sender = $this->configuration->getSender());

        $this->message = (new \Swift_Message($subject))
            ->setFrom([$from => $sender])
            ->setTo($to)
            ->setBody(str_replace('\\n', '<br />', $content), 'text/html');

        return $this;
    }

    public function send()
    {
        $this->mailer->send($this->message);
    }

}
