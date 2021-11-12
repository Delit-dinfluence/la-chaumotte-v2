<?php

namespace Core\Entity;

class Versioning
{
    const MAJOR = 1;
    const MINOR = 2;
    const PATCH = 3;

    private $version;
    private $commit_last_date;
    private $commit_last_object;

    private static $_instance = null;

    private function __construct()
    {
        $this->initialize();
    }

    public function initialize()
    {
        $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));

        exec('git log -1 --pretty=%B', $output);
        $hash = $output[0];

        $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
        $commitDate->setTimezone(new \DateTimeZone('UTC'));

        $this->setVersion($commitHash);
        $this->setCommitLastDate( $commitDate->format('Y-m-d \à H:i'));
        $this->setCommitLastObject($hash);
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version): void
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getCommitLastDate()
    {
        return $this->commit_last_date;
    }

    /**
     * @param mixed $commit_last_date
     */
    public function setCommitLastDate($commit_last_date): void
    {
        $this->commit_last_date = $commit_last_date;
    }

    /**
     * @return mixed
     */
    public function getCommitLastObject()
    {
        return $this->commit_last_object;
    }

    /**
     * @param mixed $commit_last_object
     */
    public function setCommitLastObject($commit_last_object): void
    {
        $this->commit_last_object = $commit_last_object;
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Versioning();
        }

        return self::$_instance;
    }
}
