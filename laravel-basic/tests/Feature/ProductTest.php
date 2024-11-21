<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Vendor;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_product_can_be_created() {
        // 予め仕入先のデータを用意しておく
        $vendor = new Vendor();
        $vendor->vendor_code = 1111;
        $vendor->vendor_name = 'SAMURAI商店';
        $vendor->save();
    }
}
