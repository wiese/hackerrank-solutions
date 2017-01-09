<?php
declare(strict_types = 1);

namespace wiese\HackerrankSkeleton;

class HackerrankApplication
{
    public static $template = "%s\n";

    public static function main(array $inputs)
    {
        $solution = new Solution();
        $result = call_user_func_array([$solution, 'implementation'], $inputs);

        if (class_exists('PHPUnit_Framework_TestCase', false)) {
            return;
        }

        echo vsprintf(self::$template, $result);
    }
}
