<?php 
function h($string=''){
  return htmlspecialchars($string);
}

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}


// is_blank('abcd')
  // * validate data presence
  // * uses trim() so empty spaces don't count
  // * uses === to avoid false positives
  // * better than empty() which considers "0" to be empty
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  // has_presence('abcd')
  // * validate data presence
  // * reverse of is_blank()
  // * I prefer validation names with "has_"
  function has_presence($value) {
    return !is_blank($value);
  }

  //sanitize_input('abcd')
  // * sanitize input data
 function sanitizeInput($string=''){
  $string = trim($string);
  $string= addslashes($string);
  $string = htmlspecialchars($string);
  return $string;
 }

 //validate the inputted data
 function validateInput(){


 }
?>