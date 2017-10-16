<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BasketsFixture
 *
 */
class BasketsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sale_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'benefit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'qte' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'saleId' => ['type' => 'index', 'columns' => ['sale_id'], 'length' => []],
            'benefitId' => ['type' => 'index', 'columns' => ['benefit_id'], 'length' => []],
            'saleId_2' => ['type' => 'index', 'columns' => ['sale_id'], 'length' => []],
            'sale_id' => ['type' => 'index', 'columns' => ['sale_id'], 'length' => []],
            'benefit_id' => ['type' => 'index', 'columns' => ['benefit_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'baskets_ibfk_1' => ['type' => 'foreign', 'columns' => ['sale_id'], 'references' => ['sales', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'baskets_ibfk_2' => ['type' => 'foreign', 'columns' => ['benefit_id'], 'references' => ['benefits', 'id'], 'update' => 'noAction', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'sale_id' => 1,
            'benefit_id' => 1,
            'price' => 1,
            'qte' => 1
        ],
    ];
}
