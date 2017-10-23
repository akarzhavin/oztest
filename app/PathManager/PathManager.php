<?php
/**
 * @author Alexander Korzhavin <san_rrz@mail.ru>
 * Date: 23.07.2017
 * Time: 16:26
 */

namespace App\PathManager;

use App\PathManager\PathManagerInterface;

class PathManager implements PathManagerInterface
{
    /**
     * @param \string[] ...$path
     * @return string
     */
    public function publicReference(string ...$path)
    {
        return '/' . $this->getPath($path);
    }

    /**
     * @param \string[] ...$path
     * @return string
     */
    public function publicPath(string ...$path)
    {
        $path = implode('/', $path);
        return public_path($path);
    }

    /**
     * Return file name by path
     *
     * @param string $filepath
     * @return mixed
     */
    public function getFileNameByPath(string $filepath)
    {
        $separator = '/';
        $explode = explode($separator, $filepath);
        return end($explode);
    }

    /**
     * Get name with parameters
     *
     * @param string $fileName
     * @param array $params
     * @return string
     */
    public function getNameWithParams(string $fileName, array $params)
    {
        list($name, $extension) = explode('.', $fileName);
        $params = implode('-', $params);

        return sprintf("%s-params(%s).%s",$name, $params, $extension);
    }

    /**
     * Return path to cached image
     *
     * @param string $fileName
     * @param array $params
     * @return string
     */
    public function getCachePath(string $fileName, array $params)
    {
        $cachedFileName = PathManager::getNameWithParams($fileName, $params);
        $cachedFileName = explode('/', $cachedFileName);
//        array_unshift($cachedFileName, 'cache');
        return $this->getPath($cachedFileName);
    }

    /**
     * @param string $path
     * @return string
     */
    public function getDirByPath(string $path)
    {
        $pathArray = explode('/', $path);
        array_pop($pathArray);
        return $this->getPath($pathArray);
    }

    /**
     * @param array $path
     * @return string
     */
    private function getPath(array $path)
    {
        $path = array_filter($path);
        if(!empty($path)){
            return implode('/' , $path);
        }

        return '';
    }
}