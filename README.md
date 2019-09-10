HTML Tag
=========================

Simple class for generating HTML tag.

## Use

This class's constructor takes 3 arguments, 2 of which are optional:
1. The tag name (string)
2. A list of attributes (associative array)
3. Content (anything that can be converted into a string, including other HTMLTag instances)

## Example

    use WaughJ\HTMLTag\HTMLTag;

    echo new HTMLTag
    (
        'div',
        [ 'class' => 'main' ],
        new HTMLTag
        (
            'img',
            [ 'src' => 'image.gif' ]
        )
    );

will generate:

    <div class="main">
        <img src="image.gif" />
    </div>

## Changelog

### 0.1.0
* Initial Release
