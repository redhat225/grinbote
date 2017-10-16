<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BenefitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BenefitsTable Test Case
 */
class BenefitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BenefitsTable
     */
    public $Benefits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.benefits',
        'app.type_benefits',
        'app.baskets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Benefits') ? [] : ['className' => 'App\Model\Table\BenefitsTable'];
        $this->Benefits = TableRegistry::get('Benefits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Benefits);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
