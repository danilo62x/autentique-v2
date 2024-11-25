<?php

namespace danilo62x\Autentique\tests;

use danilo62x\Autentique\tests\_Base;

use danilo62x\Autentique\Utils\Query;
use danilo62x\Autentique\Enums\ResourcesEnum;

class QueryTest extends _Base
{
    public function testFileIsNotFound()
    {
        // Arrange
        $fileName = "file-not-found";
        $query = new Query(ResourcesEnum::DOCUMENTS);

        // Assert
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage("File '$fileName' is not found");

        // Act
        $query->query($fileName);
    }
}
