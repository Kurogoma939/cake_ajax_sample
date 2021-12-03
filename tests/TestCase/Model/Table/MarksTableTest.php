<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MarksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MarksTable Test Case
 */
class MarksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MarksTable
     */
    protected $Marks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Marks',
        'app.Trumps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Marks') ? [] : ['className' => MarksTable::class];
        $this->Marks = $this->getTableLocator()->get('Marks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Marks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MarksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MarksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
