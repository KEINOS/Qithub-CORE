<?php
namespace Qithub;

trait GetPropertyTrait
{
    public function __get($name)
    {
        return $this->$name;
    }
    public function __isset($name)
    {
        return isset($this->$name);
    }
}

trait GetSelfVersionInfoTrait
{
    public static function getVersion()
    {
        return $this->getVersions(false);
    }

    public static function getVersions(bool $showAll = true)
    {
        $result = '';

        if (! isPhar()) {
            return 'Develop';
        }

        if ($showAll) {
            $version = [
                "Version"         => VER_APP,
                "Commit_ID_long"  => COMMIT_LONG,
                "Commit_ID_short" => COMMIT_SHORT,
                "Tag"             => GIT_TAG,
                "Date_build"      => DATE_BUILD,
            ];

            return json_encode($version, JSON_PRETTY_PRINT);
        }

        $versionRaw = '@' . 'git_version' . '@';

        return (VER_APP === $versionRaw) ? 'Develop' : VER_APP;
    }
}