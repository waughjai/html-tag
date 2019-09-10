<?php

declare( strict_types = 1 );

use PHPUnit\Framework\TestCase;
use WaughJ\HTMLTag\HTMLTag;

class HTMLTagTest extends TestCase
{
	public function testBasicTag() : void
	{
		$html = new HTMLTag( 'div', [ 'class' => 'main body', 'width' => '100%', 'id' => 'main' ], 'Hello.' );
		$this->assertStringContainsString( '<div', $html->getHTML() );
		$this->assertStringContainsString( '</div>', $html->getHTML() );
		$this->assertStringContainsString( '>Hello.</div>', $html->getHTML() );
		$this->assertStringContainsString( ' class="main body"', $html->getHTML() );
		$this->assertStringContainsString( ' width="100%"', $html->getHTML() );
		$this->assertStringContainsString( ' id="main"', $html->getHTML() );
	}

	public function testEmptyTag() : void
	{
		$html = new HTMLTag( 'img', [ 'src' => 'image.gif', 'width' => '448', 'alt' => '' ] );
		$this->assertStringContainsString( '<img', $html->getHTML() );
		$this->assertStringContainsString( ' />', $html->getHTML() );
		$this->assertStringNotContainsString( '</img>', $html->getHTML() );
		$this->assertStringContainsString( ' src="image.gif"', $html->getHTML() );
		$this->assertStringContainsString( ' width="448"', $html->getHTML() );
		$this->assertStringContainsString( ' alt=""', $html->getHTML() );
	}

	public function testTagInsideOtherTag() : void
	{
		$image = new HTMLTag( 'img', [ 'src' => 'image.gif' ] );
		$div = new HTMLTag( 'div', [ 'class' => 'main' ], $image );
		$this->assertEquals( '<div class="main"><img src="image.gif" /></div>', $div->getHTML() );
	}
}
