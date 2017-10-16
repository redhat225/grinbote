<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeBenefitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeBenefitsTable Test Case
 */
class TypeBenefitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeBenefitsTable
     */
    public $TypeBenefits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_benefits',
        'app.benefits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypeBenefits') ? [] : ['className' => 'App\Model\Table\TypeBenefitsTable'];
        $this->TypeBenefits = TableRegistry::get('TypeBenefits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeBenefits);

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
