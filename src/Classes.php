<?php
namespace Qithub;

/* =================================================================== [Base] */

abstract class Base
{
    use GetPropertyTrait, GetSelfVersionInfoTrait;

    private $path_dir_command;

    abstract protected function configure();
    abstract protected function execute($message, $context);

    /* ------------------------------------------------------------------ [C] */

    public function checkRequirement()
    {
        $checker = new RequirementChecker();

        return $checker->run();
    }

    /* ------------------------------------------------------------------ [G] */

    public function getPathDirCommand()
    {
        $path_dir = $this->path_dir_command;

        if (dir_exists($path_dir)) {
            return $path_dir;
        }
    }

    /* ------------------------------------------------------------------ [S] */

    public function setPathDirCommand($path_dir_command)
    {
        $path_dir_command = (string) $path_dir_command;

        if (! dir_exists($path_dir_command)) {
            return $this->path_dir_command;
        }

        $path_dir = $this->path_dir_command;
    }

    /* ------------------------------------------------------------------ [Q] */

    public static function qithubEncode($array)
    {
        $array  = (array) $array;
        $json   = json_encode($array);
        $string = urlencode($json);

        return (string) $string;
    }

    public static function qithubDecode($str_enc_qithub)
    {
        $string = (string) $str_enc_qithub;
        $json   = urldecode($string);
        $array  = json_decode($json, JSON_OBJECT_AS_ARRAY);

        return (array) $array;
    }
}

/* ================================================================ [Command] */

class Command extends Base
{
    private $name_command;
    private $path_dir_command;
    private $args;

    /* ------------------------------------------------------------------ [_] */

    public function __construct($array)
    {
        $this->name_command     = getValue('name_command', $array);
        $this->path_dir_command = getValue('path_dir_command', $array);
        $this->args             = getValue('args', $array);
    }

    /* ------------------------------------------------------------------ [R] */

    public function run()
    {
    }
}

/* =================================================================== [Core] */

class Core extends Base
{
    /* ------------------------------------------------------------------ [C] */

    public function configure($array)
    {
        $array = (array) $array;

        $this->path_dir_command = getValue('path_dir_command', $array);
    }

    /* ------------------------------------------------------------------ [E] */

    public fucntion execute($name_command, $string_args)
    {
        $name_command = (string) $name_command;
        $string_args  = (string) $string_args;
        $command      = new Command([
            'name_command'     => $name_command,
            'path_dir_command' => $this->getPathDirCommand(),
            'args'             => $string_args,
        ]);

        return $command->run();
    }
}

/* ===================================================== [RequirementChecker] */

class RequirementChecker
{
    private $errors = null;

    private function checkPhpVersion()
    {
        $ver_php_require = '5.5';
        $ver_php_current = phpversion();

        if (compareVersion($ver_php_current, '<', $ver_php_require)) {
            $msg_error  = 'PHP バージョンが低すぎます。';
            $msg_error .= '現在のバージョン: ' . $ver_php_current;
            $msg_error .= "必要なバージョン: ${ver_php_require} ${ver_operator}";

            throw e($msg_error, $e);
        }

        return true;
    }

    public function run()
    {
        try {
            $this->checkPhpVersion();
        } catch (Exception $e) {
            die(implode("<br />\n", exception_to_array($e)));
        }
    }
}

/* ===================================================== [ServiceInformation] */

class ServiceInformation
{
    use ReadPropertyTrait;

    private $name_service = null;
    private $schema       = null;
    private $host         = null;
    private $port         = null;
    private $endpoint     = null;
    private $args         = null;
    private $acces_token  = null;

    /* ------------------------------------------------------------------ [S] */

    private function setOptions($array)
    {
        $array = (array) $array;

        $this->name_service = getValue('name_service', $array);
        $this->schema       = getValue('schema', $array);
        $this->host         = getValue('host', $array);
        $this->port         = getValue('port', $array);
        $this->endpoint     = getValue('endpoint', $array);
        $this->args         = getValue('args', $array);
        $this->acces_token  = getValue('acces_token', $array);
    }
}
