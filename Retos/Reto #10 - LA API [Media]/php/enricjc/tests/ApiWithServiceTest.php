<?php declare(strict_types=1);

use App\CatService;
use App\ApiWithService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ApiWithService::class)]
final class ApiWithServiceTest extends TestCase
{
    private CatService $catSrv;
    private ApiWithService $apiWithService;

    protected function setUp(): void
    {
        $this->catSrv = $this->createMock(CatService::class);
    }

    public function testIfExistsApiClass(): void
    {
        $this->assertTrue(class_exists(ApiWithService::class));
    }

    public function testIfCallMethod(): void
    {
        $this->assertTrue(method_exists(ApiWithService::class, 'call'));
    }

    public function testIfNotReturnsAnEmptyArray(): void
    {
        $this->apiWithService = new ApiWithService($this->catSrv);
        $this->catSrv->method('call')->willReturn(['Not empty array']);


        $result = $this->apiWithService->call();
        $this->assertNotEmpty($result);
    }

    public function testIfResponseArrayContainsTextProperty(): void
    {
        $this->apiWithService = new ApiWithService($this->catSrv);
        $this->catSrv->method('call')->willReturn(array(
            0 => array('id' => 0, 'text' => 'Fact #1 about Cats'),
            1 => array('id' => 1, 'text' => 'Fact #2 about Cats'),
            2 => array('id' => 2, 'text' => 'Fact #3 about Cats'),
            3 => array('id' => 3, 'text' => 'Fact #4 about Cats'),            
            4 => array('id' => 4, 'text' => 'Fact #5 about Cats'),            
        ));

        $result = $this->apiWithService->call();
        foreach ($result as $key => $fact) {
            $this->assertNotNull($fact['text']);
        }
    }

    public function testIfResponseArrayContainsFiveElements(): void
    {
        $this->apiWithService = new ApiWithService($this->catSrv);
        $this->catSrv->method('call')->willReturn(array(
            0 => array('id' => 0, 'text' => 'Fact #1 about Cats'),
            1 => array('id' => 1, 'text' => 'Fact #2 about Cats'),
            2 => array('id' => 2, 'text' => 'Fact #3 about Cats'),
            3 => array('id' => 3, 'text' => 'Fact #4 about Cats'),            
            4 => array('id' => 4, 'text' => 'Fact #5 about Cats'),            
        ));

        $result = $this->apiWithService->call();
        $this->assertCount(5, $result);      
    }

    public function testIfPrintFactCats(): void
    {
        $this->apiWithService = new ApiWithService($this->catSrv);
        $this->catSrv->method('call')->willReturn(array(
            0 => array('id' => 0, 'text' => 'Fact #1 about Cats'),
            1 => array('id' => 1, 'text' => 'Fact #2 about Cats'),
            2 => array('id' => 2, 'text' => 'Fact #3 about Cats'),
            3 => array('id' => 3, 'text' => 'Fact #4 about Cats'),            
            4 => array('id' => 4, 'text' => 'Fact #5 about Cats'),            
        ));

        $facts = $this->apiWithService->call();
        $this->apiWithService->print($facts);

        $this->expectOutputString(
            'Fact #1 about Cats' . PHP_EOL .
            'Fact #2 about Cats' . PHP_EOL . 
            'Fact #3 about Cats' . PHP_EOL . 
            'Fact #4 about Cats' . PHP_EOL . 
            'Fact #5 about Cats' . PHP_EOL
        );
    }    

}