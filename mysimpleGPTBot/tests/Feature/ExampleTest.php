<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Mockery;
use App\Services\PdfConverterService;
#use Spatie\PdfToImage\Pdf as PdfToImage;
#use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\BotmanController;
use Illuminate\Http\UploadedFile;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected $container = [];
    protected $pdfToImageMock;
    protected $fakePdfFilePath;
    
    #use RefreshDatabase;
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;


    /**
     * Setting up --> Always runs before tests
     */

    public function setUp(): void
    {
        parent::setUp();

    }

    /**
     * Mock the Guzzle client.
     */
    protected function getMockedGuzzleClient()
    {

        // Create a mock and queue two responses.
        $mock = new MockHandler([
             new Response(200, ['accept' => 'application/json','content-type' => 'application/x-www-form-urlencoded'], '{"message":"This is a test response."}'),
             new Response(202, ['Content-Length' => 0]),
             new RequestException('Error Communicating with Server', new Request('POST', 'test'))
         ]);
        $stack = HandlerStack::create($mock);
        $history = Middleware::history($this->container);
        $stack->push($history);

        $client = new Client(['handler' => $stack]);

        return $client;
    }

    
    protected function generateFakePdfFile()
    {
        // Use TCPDF to generate a simple fake PDF file
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(40, 10, 'Fake PDF Content');
        $pdf->Output($this->fakePdfFilePath, 'F');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * Test `freegpt_API_Availability`.
     */
    public function testApiAvailability()
    {
        $url = 'http://localhost:8001/post/gpt4?prompt=""';
        $response = Http::post($url);
        $this->assertEquals(200,$response->status()); 
    } 
    

    /**
     * Test `communicateGPT4` functionality .
     */
    public function testCommunicateGpt4()
    {
        $botmanController = new BotmanController();
        $query = "This is a test query to bot.";
        $url = 'http://localhost:8001/post/gpt4';

        $guzzleClient = $this->getMockedGuzzleClient();

        $response = $botmanController->communicateGPT4($guzzleClient,$query);
        
        $history = array_pop($this->container);
        $requestUri = $history['request']->getUri();

        // Assert the content of the received response/ Validate Response
        $this->assertEquals($response->getStatusCode(),$history['response']->getStatusCode());
        $this->assertEquals(200,$response->getStatusCode());
        $this->assertJsonStringEqualsJsonString('{"message":"This is a test response."}', $response->getBody());

        // Assert Request 
        $this->assertEquals('POST', $history['request']->getMethod());
        $this->assertEquals($query, str_replace('%20',' ',explode('=',$requestUri->getQuery())[1]));
        $this->assertEquals($url,$requestUri->composeComponents(
                $requestUri->getScheme(),
                $requestUri->getAuthority(),
                $requestUri->getPath(),
                '',
                ''
            ));
      

    }

    
     /**
     * Test `convertPdfToImage` functionality .
     */
    public function testConvertPdfToImage()
    {
        $pdfPath = storage_path('app/public/fake_test.pdf');
        $outputImagePath = storage_path('app/public/fake_test.png');

        $controller = new BotmanController();

        // Mock PdfConverterService class
        $pdfConverterServiceMock = Mockery::mock(PdfConverterService::class);
        $pdfConverterServiceMock->shouldReceive('convertToImage')->once();

        $this->app->instance(PdfConverterService::class, $pdfConverterServiceMock);

        // Set up the fake storage
        Storage::fake('public');

        // Generate a fake PDF file path to simulate uploading file
        $this->fakePdfFilePath = storage_path('app/public/fake_test.pdf');
        $this->generateFakePdfFile();

        $controller->convertPdfToImage($outputImagePath, $pdfConverterServiceMock);        
 
        Storage::delete('public/fake_test.pdf');
        $this->assertTrue(true);
    }


    public function testExtractTextFromImage()
    {
        $imagePath = storage_path('app/public/fake_test.png');

        $controller = new BotmanController();

        $result = $controller->extractTextFromImage($imagePath);

        $this->assertNotEmpty($result);
        $this->assertStringContainsString('Fake', $result);
    }

   /**
     * Execute After Tests End
     * 
     * @return void
     */ 
   protected function tearDown(): void
   {
        parent::tearDown();
        Mockery::close();
   }   


}
