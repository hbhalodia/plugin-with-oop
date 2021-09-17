<?php 
use PHPUnit\Framework\TestCase;

final class NameTest extends TestCase {


	public function testCannotBeCreatedFromInvalidEmailAddress1(): void {
		$this->expectException( InvalidArgumentException::class );

		Email::fromString( 'invalid' );
	}

	public function testCanBeUsedAsString1(): void {
		$this->assertEquals(
			'user@example.com',
			Email::fromString( 'user@example.com' )
		);
	}

}
