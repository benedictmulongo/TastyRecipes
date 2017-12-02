<?php
$url = 'dfjkfjdkjkdkjfjkjkfdhttpbjhjhjhhjhjh://username:password@hostname:9090/path?arg=value#anchormbfdmgdfgdsgdf';
$array = parse_url($url);
$var = $array['host'];
$type = gettype($var);
$emptyy = strlen($var);
echo "type is = $type and isEmpty = $emptyy ? ";
echo "$var \n";
var_dump(parse_url($url));
$url1 = "<div id=body><p>The page you are looking at is being generated dynamically by CodeIgniter.</p>";
function is_html($string) {
  // Check if string contains any html tags.
  return preg_match('/<\s?[^\>]*\/?\s?>/i', $string);
}

echo is_html($url1);
?>

