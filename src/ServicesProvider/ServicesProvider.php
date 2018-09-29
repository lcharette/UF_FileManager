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
use League\Flysystem\FileSystem;
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
         */
        $container['files'] = function ($c) {

            /** @var \UserFrosting\Support\Repository\Repository $config */
            $config = $c->config;

            // Creates the adapter
            switch ($config['storage.adapter']) {
                case 'local':
                    $adapter = new Local($config['storage.local.path']);
                    return new Files($c, new FileSystem($adapter));
                break;
                default:
                    throw new \Exception("Filesystem adapter {$config['storage.adapter']} not found");
                break;
            }
        };
    }
}