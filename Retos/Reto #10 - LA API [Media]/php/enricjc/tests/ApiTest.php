<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use App\Api;

#[CoversClass(Api::class)]
final class ApiTest extends TestCase
{

    private $api;

    protected function setUp(): void
    {
        $this->api = new Api();
    }

    public function testIfExistsApiClass(): void
    {
        $this->assertTrue(class_exists(Api::class));
    }

    public function testIfExistsCallMethod(): void
    {
        $this->assertTrue(method_exists(Api::class, 'call'));
    }
    
    public function testIfThrowsExceptionWhenUrlIsNotCorrect(): void
    {
        $this->expectExceptionMessage('Endpoint URL is not correct');
        $result = $this->api->call('https://');
    }
    
    public function testIfNotReturnsAnEmptyArray(): void
    {
        $result = $this->api->call('https://cat-fact.herokuapp.com/facts');
        $this->assertIsArray($result);
        $this->assertTrue(count($result) > 0);
    } 
    
    public function testIfResponseArrayContainsTextProperty(): void
    {
        $result = $this->api->call('https://cat-fact.herokuapp.com/facts');
        foreach ($result as $key => $fact) {
            $this->assertNotNull($fact['text']);
        }
    }

    public function testIfResponseArrayContainsFiveElements(): void
    {
        $result = $this->api->call('https://cat-fact.herokuapp.com/facts');
        $this->assertCount(5, $result);
    }    
       
    public function testIfPrintFactCats(): void
    {
        $facts = $this->api->call('https://cat-fact.herokuapp.com/facts');
        $this->api->print($facts);
        $this->expectOutputString(
            'Owning a cat can reduce the risk of stroke and heart attack by a third.' . PHP_EOL .
            'Most cats are lactose intolerant, and milk can cause painful stomach cramps and diarrhea. It\'s best to forego the milk and just give your cat the standard: clean, cool drinking water.' . PHP_EOL . 
            'Domestic cats spend about 70 percent of the day sleeping and 15 percent of the day grooming.' . PHP_EOL . 
            'The frequency of a domestic cat\'s purr is the same at which muscles and bones repair themselves.' . PHP_EOL . 
            'Cats are the most popular pet in the United States: There are 88 million pet cats and 74 million dogs.' . PHP_EOL
        );
    }    
}
