<?php
/**
 * UF File Manager
 *
 * @link      https://github.com/archey347/uf-filemanager
 * @license   https://github.com/archey347/uf-filemanager/blob/master/LICENSE (MIT License)
 */
namespace UserFrosting\Sprinkle\Files\ServicesProvider;

use UserFrosting\Sprinkle\Files\Files\Files;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
/**
 * Registers services for the Files sprinkle.
 *
 * @author Archey Barrell
 */
class ServicesProvider
{
    /**
     * Register Files' services.
     *
     * @param Container $container A DI container implementing ArrayAccess and container-interop.
     */
    public function register($container)
    {
        /**
         * Files Service
         *
         * Supports uploading and downloading files in categories
         */
        $container['files'] = function ($c) {
            
            // Config for adapter will go here
            $adapter = new Local(\UserFrosting\APP_DIR."/storage");

            return new Files($c, new FileSystem($adapter));
        };

    }
}