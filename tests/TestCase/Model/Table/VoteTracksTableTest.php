<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VoteTracksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VoteTracksTable Test Case
 */
class VoteTracksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VoteTracksTable
     */
    public $VoteTracks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vote_tracks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VoteTracks') ? [] : ['className' => 'App\Model\Table\VoteTracksTable'];
        $this->VoteTracks = TableRegistry::get('VoteTracks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VoteTracks);

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
