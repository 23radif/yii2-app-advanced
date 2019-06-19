<?php namespace frontend\tests;

use frontend\components\SearchService;

class SearchServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFind()
    {
        $searchServ = new SearchService();

        $secondName = $searchServ->find('Nikolay');

        expect($secondName)->notNull();

        expect($secondName)->equals('Zatonski');
    }
}