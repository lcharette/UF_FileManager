<?php
/**
 * UF File Manager
 *
 * @link      https://github.com/archey347/uf-filemanager
 * @license   https://github.com/archey347/uf-filemanager/blob/master/LICENSE (MIT License)
 */
namespace UserFrosting\Sprinkle\FileManager;

use Interop\Container\ContainerInterface;

/**
 * Files class that manages file uploads and downloads between the file storage and controllers
 * 
 * @author Archey Barrell
 */
class Files
{
    /**
     * @var ContainerInterface The global container object, which holds all your services.
     */
    protected $ci;

    /**
     * Create a new Files object.
     *
     */
    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    
}