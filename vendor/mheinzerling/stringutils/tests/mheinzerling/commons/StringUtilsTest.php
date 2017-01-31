<?php

namespace mheinzerling\commons;


class StringUtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testStartsWith()
    {
        $this->assertEquals(false, StringUtils::startsWith("abcdef", null), "no needle");
        $this->assertEquals(false, StringUtils::startsWith(null, "a"), "no haystack");
        $this->assertEquals(false, StringUtils::startsWith("", "a"), "to long - empty");
        $this->assertEquals(false, StringUtils::startsWith("abcdef", "abcdefg"), "to long - regular");

        $this->assertEquals(true, StringUtils::startsWith("", ""), "both empty");
        $this->assertEquals(true, StringUtils::startsWith("abcdef", ""), "empty needle");
        $this->assertEquals(true, StringUtils::startsWith("abcdef", "a"), "valid - char");
        $this->assertEquals(true, StringUtils::startsWith("abcdef", "abc"), "valid - substr");
        $this->assertEquals(true, StringUtils::startsWith("abcdef", "abcdef"), "valid - full");
    }

    public function testEndsWith()
    {
        $this->assertEquals(false, StringUtils::endsWith("abcdef", null), "no needle");
        $this->assertEquals(false, StringUtils::endsWith(null, "a"), "no haystack");
        $this->assertEquals(false, StringUtils::endsWith("", "a"), "to long - empty");
        $this->assertEquals(false, StringUtils::endsWith("abcdef", "abcdefg"), "to long - regular");

        $this->assertEquals(true, StringUtils::endsWith("", ""), "both empty");
        $this->assertEquals(true, StringUtils::endsWith("abcdef", ""), "empty needle");
        $this->assertEquals(true, StringUtils::endsWith("abcdef", "f"), "valid - char");
        $this->assertEquals(true, StringUtils::endsWith("abcdef", "def"), "valid - substr");
        $this->assertEquals(true, StringUtils::endsWith("abcdef", "abcdef"), "valid - full");
    }

    public function testFirstCharToUpper()
    {
        $this->assertEquals(null, StringUtils::firstCharToUpper(null), "null");
        $this->assertEquals("", StringUtils::firstCharToUpper(""), "empty");
        $this->assertEquals(" f", StringUtils::firstCharToUpper(" f"), "space");
        $this->assertEquals("F", StringUtils::firstCharToUpper("f"), "single letter");
        $this->assertEquals("Foo", StringUtils::firstCharToUpper("foo"), "normal usecase");
        $this->assertEquals("Foo", StringUtils::firstCharToUpper("Foo"), "no effect");
        $this->assertEquals("5foo", StringUtils::firstCharToUpper("5foo"), "numeric");
        //TODO UTF-8 and special character
    }

    public function testIsBlank()
    {
        $this->assertEquals(true, StringUtils::isBlank(null), "null");
        $this->assertEquals(true, StringUtils::isBlank(""), "empty");
        $this->assertEquals(true, StringUtils::isBlank(" "), "space");
        $this->assertEquals(true, StringUtils::isBlank(" \t \r\n \r"), "mixed");
        $this->assertEquals(false, StringUtils::isBlank(" foo "), "non blank");
    }

    public function testTrimExplode()
    {
        $input = "   | foo| bar\n | \thoo ";
        $this->assertEquals(array(), StringUtils::trimExplode(null, null), "nothing");
        $this->assertEquals(array(), StringUtils::trimExplode("|", null), "nothing with delimiter");
        $this->assertEquals(array(""), StringUtils::trimExplode("|", ""), "empty with delimiter");
        $this->assertEquals(array("| foo| bar\n | \thoo"), StringUtils::trimExplode(null, $input), "no delimiter");
        $this->assertEquals(array("| foo| bar\n | \thoo"), StringUtils::trimExplode("", $input), "empty delimiter");
        $this->assertEquals(array("", "foo", "bar", "hoo"), StringUtils::trimExplode("|", $input), "valid");

    }

    public function testContains()
    {
        //TODO special cases
        $this->assertEquals(true, StringUtils::contains("foo", "O"));
        $this->assertEquals(false, StringUtils::contains("foo", "x"));
        $this->assertEquals(false, StringUtils::contains("foo", "O", false));
        $this->assertEquals(true, StringUtils::contains("foo", "o", false));
    }
}

