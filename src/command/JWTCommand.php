<?php
/**
 * @time 17:29 2020/7/21
 * @author loster
 */

namespace aibayanyu\JWT\command;


use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\helper\Str;

class JWTCommand extends Command
{
    protected function configure()
    {
        $this->setName("jwt:init")
            ->setDescription("init jwt data");
    }

    protected function execute(Input $input, Output $output)
    {
        $path = $this->app->getAppPath()."..".DIRECTORY_SEPARATOR.'.env';
        if (file_exists($path) && strpos(file_get_contents($path),'[JWT]')){
            $output->writeln("JWT config is exit");
        }else{
            // 不存在
            file_put_contents($path,
            PHP_EOL."[JWT]".PHP_EOL."SECRET=".Str::random(32).PHP_EOL.
            "TTL=7200".PHP_EOL,FILE_APPEND
            );
            $output->writeln("create finish JWT to env");
        }
    }
}