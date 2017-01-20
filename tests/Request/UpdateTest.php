<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\SObjectType;

class UpdateTest extends TestCase
{
    public function testUpdateRequest()
    {
        $params = ['Name' => 'name'];
        $request = new Update(SObjectType::ACCOUNT(), 'id', $params);

        $this->assertSame('/sobjects/Account/id/', $request->getEndpoint());
        $this->assertSame(RequestInterface::METHOD_PATCH, $request->getMethod());
        $this->assertSame($params, json_decode($request->getParams(), true));
        $this->assertSame(RequestInterface::TYPE_JSON, $request->getMediaType());
    }
}
