<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Core\Tests\Unit;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use UserFrosting\Tests\TestCase;
use UserFrosting\Sprinkle\FileManager\Files\Files;

class FilesTest extends TestCase
{
    public function testClassCreating()
    {
        $adapter = new Local('app/sprinkles/FileManager/tests/storage');
        $files = new Files($this->ci, new Filesystem($adapter));

        $this->assertInstanceOf(Files::class, $files);
    }
}
