<?php
/**
 * UF File Manager
 *
 * @link      https://github.com/archey347/uf-filemanager
 * @license   https://github.com/archey347/uf-filemanager/blob/master/LICENSE (MIT License)
 */
namespace UserFrosting\Sprinkle\FileManager\ServicesProvider;

use UserFrosting\Sprinkle\FileManager\Manager\FileManager;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Interop\Container\ContainerInterface;

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
     * @param ContainerInterface $container A DI container implementing ArrayAccess and container-interop.
     */
    public function register(ContainerInterface $container)
    {
        /**
         * Files Service
         *
         * Supports uploading and downloading files in categories
         * @return \UserFrosting\Sprinkle\FileManager\Manager\FileManager
         */
        $container['filemanager'] = function ($c) {

            /** @var \UserFrosting\Support\Repository\Repository $config */
            $config = $c->config;

            // Creates the adapter
            switch ($config['storage.adapter']) {
                case 'local':
                    $adapter = new Local($config['storage.local.path']);
                break;
                default:
                    throw new \Exception("Filesystem adapter {$config['storage.adapter']} not found");
                break;
            }

            return new FileManager($c, new Filesystem($adapter));
        };
    }
}
