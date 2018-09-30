<?php
/**
 * UF File Manager
 *
 * @link      https://github.com/archey347/uf-filemanager
 * @license   https://github.com/archey347/uf-filemanager/blob/master/LICENSE (MIT License)
 */
namespace UserFrosting\Sprinkle\FileManager\Manager;

use Interop\Container\ContainerInterface;
use League\Flysystem\Filesystem;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;
use UserFrosting\Support\Exception\NotFoundException;

/**
 * Files class that manages file uploads and downloads between the file storage and controllers
 *
 * @author Archey Barrell
 */
class FileManager
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
     * @param UploadedFile $file
     * @param string $category
     * @return $file_id
     *
     */
    public function upload(UploadedFile $file, $category)
    {
        $filename = time();

        $stream = fopen($file->file, "r+");

        $this->filesystem->writeStream($filename, $stream);

        fclose($stream);
    }

    /**
     * Download a file
     *
     * @param Response $response
     * @param string $file_id
     * @return $file
     *
     */
    public function download(Response $response, $file_id)
    {
        if(!$this->filesystem->has($file_id)) {
            throw new NotFoundException;
        }

        $mimetype = $this->filesystem->getMimetype($file_id);

        return $response->withHeader('Content-Type', $mimetype)
                        ->write($this->filesystem->read($file_id))
                        ->withHeader('Content-Disposition', 'attachment;filename="'.$file_id.'"');
    }
}
