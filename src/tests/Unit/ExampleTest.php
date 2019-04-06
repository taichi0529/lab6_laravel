<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


use App\Http\Requests\Upload\Store;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $request = new Store();
        $this->assertTrue($request->authorize());
//        $this->assertFalse($request->authorize());
    }
}
