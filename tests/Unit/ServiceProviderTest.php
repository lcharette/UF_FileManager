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

class ServiceProviderTest extends TestCase
{

    /**
     * Test if the service provider using the configured adapter
     */
    public function testServiceExist()
    {
        $manager = $this->ci->filemanager;
        $this->assertInstanceOf(Filesystem::class, $manager);
    }

    /**
     * Test if the service provider using the Local adapter
     */
    public function testServiceWithLocalAdapter()
    {
        // Force config to Local adapter
        $config = $this->ci->config;
        $config['storage.adapter'] = 'Local';

        // Get service
        $manager = $this->ci->filemanager;
        $this->assertInstanceOf(Filesystem::class, $manager);

        $adapter = $manager->getAdapter();
        $this->assertInstanceOf(Local::class, $adapter);
    }

    // !TODO :: Allow to change adapter once we're setup

    /**
     * Test if the service provider throw an error when using an undefined adapter
     * @expectedException Exception
     * @expectedExceptionMessage Filesystem adapter Foo not found
     */
    public function testServiceWithUndefinedAdapter()
    {
        // Force config to Foo adapter
        $config = $this->ci->config;
        $config['storage.adapter'] = 'Foo';

        // Get service
        $manager = $this->ci->filemanager;
    }
}
