<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Core\Tests\Unit;

use League\Flysystem\Filesystem;
use UserFrosting\Sprinkle\FileManager\Controller\FileManagerController;
use UserFrosting\Tests\TestCase;

class FileManagerControllerTest extends TestCase
{
    /**
     * Create the FileManager instance and test constructor
     */
    public function testClassConstruction()
    {
        // Create a local instance using the dir in testing
        // Force config to Local adapter
        $config = $this->ci->config;
        $config['storage.adapter'] = 'Local';
        $config['storage.local.path'] = \UserFrosting\SPRINKLES_DIR . \UserFrosting\DS . 'FileManager' . \UserFrosting\DS . 'tests' . \UserFrosting\DS . '/storage';

        // Get service with our force config and make sure it works
        $manager = $this->ci->filemanager;
        $this->assertInstanceOf(Filesystem::class, $manager);

        // Get manager and make sure the returned instance works
        $controller = new FileManagerController($this->ci);
        $this->assertInstanceOf(FileManagerController::class, $controller);

        return $controller;
    }

    /**
     * Test Upload Method
     * @param FileManager $manager
     * @depends testClassCreating
     */
    /*public function testUpload(FileManager $manager)
    {

    }*/

    /**
     * Test Download Method
     * @param FileManager $manager
     * @depends testClassCreating
     */
    /*public function testDownload(FileManager $manager)
    {

    }*/
}
