<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PollsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PollsTable Test Case
 */
class PollsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PollsTable
     */
    public $Polls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.polls'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Polls') ? [] : ['className' => 'App\Model\Table\PollsTable'];
        $this->Polls = TableRegistry::get('Polls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Polls);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
