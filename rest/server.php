<?php
/**
 * Rest 101, a perfomance between soap and rest
 * Copyright (C) 2015  Ignacio R. Galieri
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP VERSION 5.4
 *
 * This server is for development only. It is not recommended to use it in production
 *
 * @category  Rundeable
 * @package   Main
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2015 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/markdownblog
 */

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$array = explode('/', $_SERVER['REQUEST_URI']);

if (!isset($array[1]) || $array[1] != "saludo") {
    header('Status: 404');
    header('Content-type: text/json');
    echo json_encode(
        array(
            "status" => 404,
            "message" => "Operation not found."
        )
    );

} else {
    header('Status: 200');
    header('Content-type: text/json');
    echo json_encode(
        array(
            "status" => 200,
            "greeting" => "Hello ".$array[2]
        )
    );
}
