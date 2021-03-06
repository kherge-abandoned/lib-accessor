<?php

namespace Phine\Accessor\Tests\Type;

use Phine\Accessor\Type\ObjectType;
use Phine\Test\Method;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link ObjectType} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class ObjectTypeTest extends TestCase
{
    /**
     * The type instance being tested.
     *
     * @var ObjectType
     */
    private $type;

    /**
     * Make sure the type returns the expected name.
     */
    public function testGetName()
    {
        $this->assertEquals(
            'object',
            $this->type->getName(),
            'The name "object" should be returned.'
        );
    }

    /**
     * Make sure the type check is correct.
     */
    public function testIsValidType()
    {
        $this->assertFalse(
            Method::invoke($this->type, 'isValidType', $this, 'test'),
            'The value should not be valid.'
        );

        $this->assertTrue(
            Method::invoke($this->type, 'isValidType', $this, $this),
            'The value should be valid.'
        );
    }

    /**
     * Creates a new instance of the type.
     */
    protected function setUp()
    {
        $this->type = new ObjectType();
    }
}
