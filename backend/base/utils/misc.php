<?php

/**
 * Remove tags HTML específicas de uma string
 * @param string $string String a ser usada.
 * @param array<int|string,string> $tags_to_remove String a ser usada.
 * @return string HTML sem as tags.
 */
function remove_specific_tags($string, $tags_to_remove)
{
  return preg_replace('/<\/?(' . implode('|', $tags_to_remove) . ')(\s+[^>]*|)>/', '', $string);
}
