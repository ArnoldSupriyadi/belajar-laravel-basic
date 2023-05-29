<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStorage()
    {
        $filesystem = Storage::disk("local");

        $filesystem->put("file.txt", "Arnold Supriyadi");

        $content = $filesystem->get("file.txt");

        self::assertEquals("Arnold Supriyadi", $content);
    }
}
