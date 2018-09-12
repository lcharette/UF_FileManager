<?php
/**
 * UF File Manager
 *
 * @link      https://github.com/archey347/uf-filemanager
 * @license   https://github.com/archey347/uf-filemanager/blob/master/LICENSE (MIT License)
 */
namespace UserFrosting\Sprinkle\Files;

use Interop\Container\ContainerInterface;
use League\Flysystem\Filesystem;

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
     * @var Filesystem The filesystem object used for creating and reading files
     */
    protected $filesystem;

    /**
     * Create a new Files object.
     *
     */
    public function __construct(ContainerInterface $ci, Filesystem $filesystem)
    {
        $this->ci = $ci;

        $this->filesystem = $filesystem;
    }

    /**
     * Upload file
     * 
     * @access public
     * @param string $file
     * @param string $category
     * @return $file_id
     * 
     */
    public function upload($file, $category)
    {

    }

    /**
     * Download a file
     * 
     * @access public
     * @param integer $file_id
     * @return $file
     * 
     */
    public function download($file_id)
    {
        
    }


}