<?php

namespace Nadeera\Facades;

/**
 * Represents handing the response genereated at the controller/action
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class Response
{
    /**
     * This is a facade/helper used to render the view
     *
     * @param string $file
     * @param mix $data
     * @return void
     */
    public static function view(string $file, $data)
    {
        $fileLocationParts = explode(".", $file);
        $fileLocationParts[] = array_pop($fileLocationParts) . ".php";
        $filePath = implode("/", $fileLocationParts);

        if (is_array($data)) {
            foreach ($data as $key => $item) {
                $$key = $item;
            }
        } else {
            $data = $data;
        }
        include "./config.php";
        include $filePath;
    }

    /**
     * Response will be renderd as array. Can be used when creating APIs
     *
     * @param array $data
     * @return string
     */
    public static function json(array $data): string
    {
        return json_encode($data);
    }
}
