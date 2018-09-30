<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Sprinkle\Core\Tests\Unit;

use UserFrosting\Tests\TestCase;
use UserFrosting\Sprinkle\FileManager\Manager\FileManager;

class ServiceProviderTest extends TestCase
{

    /**
     * Test if the service provider using the configured adapter
     */
    public function testServiceExist()
    {
        $manager = $this->ci->filemanager;
        $this->assertInstanceOf(FileManager::class, $manager);
    }

    /**
     * Test if the service provider using the Local adapter
     */
    public function testServiceWithLocalAdapter()
    {
        // Force config

        // Resetup service
    }

    /**
     * Test if the service provider throw an error when using an undefined adapter
     */
    public function testServiceWithUndefinedAdapter()
    {
        // Force config

        // Resetup service
    }

    
    protected function runService() {

    }
}
