<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 */
class ItemsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'count' => 1,
                'total_price' => 1,
                'send_flag' => 1,
                'created' => '2021-12-02',
            ],
        ];
        parent::init();
    }
}
