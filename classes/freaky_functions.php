<?php
/**
 * Some usefull functions
 * @author SmO
 * @since 20.04.2012
 */

/**
 * dump - gibt den var_dump lesbar aus
 * 
 * @param $var_to_dump string, array, was man will
 */
function dump($var_to_dump)
{
	echo "<pre>";
	var_dump($var_to_dump);
	echo "</pre>";
}

/**
 * get an array of found items by a given keyname
 *
 * method flats a given multi dimensional array into
 * a one dimensional array
 *
 * @param mixed $needle   string/integer keyname for search, null for complete flatt
 * @param array $haystack array for search
 * @return array found items
 */
function flatArray($needle = null, $haystack = array())
{
    $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($haystack));
    $elements = array();

    foreach($iterator as $element) {    

        if(is_null($needle) || $iterator->key() == $needle) {
            $elements[] = $element;
        }
    }

    return $elements;
}

/**
 * erzeugt einen '<br />'
 */
function nl($text = '')
{
	if($text != '')
	{
		echo "<br />";
		echo $text;
		echo "<br />";
	}
	else 
	{
		echo "<br />";	
	}
}
