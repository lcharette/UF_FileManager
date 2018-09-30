<?php
/**
 * UF File Manager
 *
 * @link      https://github.com/archey347/uf-filemanager
 * @license   https://github.com/archey347/uf-filemanager/blob/master/LICENSE (MIT License)
 */
namespace UserFrosting\Sprinkle\FileManager\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Support\Exception\NotFoundException;

/**
 * Controller class that manages file uploads and downloads
 */
class FileManagerController extends SimpleController
{
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

        $this->ci->filesystem->writeStream($filename, $stream);

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
        if(!$this->ci->filesystem->has($file_id)) {
            throw new NotFoundException;
        }

        $mimetype = $this->ci->filesystem->getMimetype($file_id);

        return $response->withHeader('Content-Type', $mimetype)
                        ->write($this->ci->filesystem->read($file_id))
                        ->withHeader('Content-Disposition', 'attachment;filename="'.$file_id.'"');
    }
}
