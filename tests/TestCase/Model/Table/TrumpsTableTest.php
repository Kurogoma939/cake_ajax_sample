<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrumpsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrumpsTable Test Case
 */
class TrumpsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrumpsTable
     */
    protected $Trumps;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Trumps',
        'app.Marks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Trumps') ? [] : ['className' => TrumpsTable::class];
        $this->Trumps = $this->getTableLocator()->get('Trumps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Trumps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TrumpsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TrumpsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
