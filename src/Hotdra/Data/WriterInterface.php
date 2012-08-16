<?php

namespace Hotdra\Data;

interface WriterInterface
{
	function writeFile($filename);
	function writeStream($stream);
}
