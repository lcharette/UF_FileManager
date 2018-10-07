<?php
/**
 * UF File Manager
 *
 * @link      https://github.com/archey347/uf-filemanager
 * @license   https://github.com/archey347/uf-filemanager/blob/master/LICENSE (MIT License)
 */
namespace UserFrosting\Sprinkle\FileManager\ServicesProvider;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
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
     * Register services.
     *
     * @param ContainerInterface $container A DI container implementing ArrayAccess and container-interop.
     */
    public function register(ContainerInterface $container)
    {
        /**
         * Files Service
         *
         * Supports uploading and downloading files in categories
         * @return Filesystem
         */
        $container['filemanager'] = function ($c) {

            /** @var \UserFrosting\Support\Repository\Repository $config */
            $config = $c->config;

            // Creates the adapter
            switch (strtolower($config['storage.default_adapter'])) {
                case 'local':
                    $adapter = new Local($config['storage.local.path']);
                break;
                case 'google':
                    $client = new \Google_Client();
                    $client->setClientId($config['storage.google.clientID']);
                    $client->setClientSecret($config['storage.google.clientSecret']);
                    $client->refreshToken($config['storage.google.refreshToken']);

                    $driveRoot = $config['storage.google.rootPath'] ?: '';

                    $service = new \Google_Service_Drive($client);

                    $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, $driveRoot);
                break;
                case 's3':
                    $client = new S3Client([
                        'credentials' => [
                            'key'    => $config['storage.s3.key'],
                            'secret' => $config['storage.s3.secret']
                        ],
                        'region' => $config['storage.s3.region'],
                        'version' => 'latest',
                    ]);

                    $adapter = new AwsS3Adapter($client, $config['storage.s3.bucket']);
                break;
                default:
                    throw new \Exception("Filesystem adapter {$config['storage.default_adapter']} not found");
                break;
            }

            return new Filesystem($adapter);
        };
    }
}
