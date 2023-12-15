<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\BotmanController;
use Illuminate\Support\Facades\Log;

class ExampleTest extends TestCase
{

    public function stringProvider()
    {
        return [
            ['"\u00e4","\u00f6","\u00fc","\u00df","\u00c4","\u00d6","\u00dc"',true],
            ['This is a test',false],
        ];
    }

    public function pathProvider()
    {
        return [
            ['/home/dandelion/Desktop/test','world.txt',true],
            ['/home/dandelion/Desktop/test','hello.txt',false]
        ];
    }
    
    private function isEqual($first, $second)
    {
       if($first === $second){return true;}
       return false;
    }

    private function containsAnySubstring($haystack, array $needles)
    {
        foreach ($needles as $needle) {
            if (strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * test for hex2Umlaub function.
     * @dataProvider stringProvider
     * @return void
     */
    public function testHex2Umlaub($targetedString,$expectedResult)
    {
        $controller = new BotmanController(); 
        $substringsToCheck = ["ä","ö","ü","ß","Ä","Ö","Ü"];
        $result = $controller->hex2Umlaub($targetedString);
        $this->assertEquals($expectedResult,
            $this->containsAnySubstring($result, $substringsToCheck),
        );
    }

    /**
     * test for retrieveImageFilename function.
     * @dataProvider pathProvider
     * @return void
     */
    public function testRetrieveImageFilename($dir,$topFilename,$expectedResult)
    {
       
        Log::shouldReceive('debug')->andReturnNull();

        $controller = new BotmanController();

        $targetFile = $controller->retrieveImageFilename($dir);

        $this->assertNotEmpty($targetFile);
        $this->assertFileExists($dir . '/' . $targetFile);
        $this->assertEquals($expectedResult,$this->isEqual($topFilename,$targetFile));
    }
    
}
