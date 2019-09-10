<?php

declare( strict_types = 1 );
namespace WaughJ\HTMLTag;

use WaughJ\HTMLAttributeList\HTMLAttributeList;

class HTMLTag
{
	public function __construct( string $tag, array $attributes = [], $content = null )
	{
		$this->tag = $tag;
		$this->attributes = new HTMLAttributeList( $attributes );
		$this->content = $content;
	}

	public function __toString()
	{
		return $this->getHTML();
	}

	public function getHTML() : string
	{
		$content = ( string )( $this->content );
		return $this->hasEmptyTag()
			? "<{$this->tag}{$this->attributes->getAttributesText()} />"
			: "<{$this->tag}{$this->attributes->getAttributesText()}>{$content}</{$this->tag}>";
	}

	public function hasEmptyTag() : bool
	{
		return self::isEmptyTag( $this->tag );
	}

	public static function isEmptyTag( string $tag ) : bool
	{
		return in_array( $tag, self::EMPTY_TAGS );
	}

	private $tag;
	private $attributes;
	private $content;

	private const EMPTY_TAGS =
	[
	    "area",
	    "base",
	    "br",
	    "col",
	    "embed",
	    "hr",
	    "img",
	    "input",
	    "keygen",
	    "link",
	    "meta",
	    "param",
	    "source",
	    "track",
	    "wbr"
	];
}
