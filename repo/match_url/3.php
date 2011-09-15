define('URL_FORMAT','/(?i)b((?:https?:\/\/|wwwd{0,3}[.]|[a-z0-9.-]+[.][a-z]{2,4}\/)(?:[^s()<>]+|(([^s()<>]+|(([^s()<>]+)))*))+(?:(([^s()<>]+|(([^s()<>]+)))*)|[^s`!()[]{};:'".,<>?«»“”‘’]))/');

/**
 * Verify the syntax of the given URL. 
 * 
 * @access public
 * @param $url The URL to verify.
 * @return boolean
 */
function is_valid_url($url) {
  if (str_starts_with(strtolower($url), 'http://localhost')) {
    return true;
  }
  return preg_match(URL_FORMAT, $url);
}


/**
 * String starts with something
 * 
 * This function will return true only if input string starts with
 * niddle
 * 
 * @param string $string Input string
 * @param string $niddle Needle string
 * @return boolean
 */
function str_starts_with($string, $niddle) {
      return substr($string, 0, strlen($niddle)) == $niddle;
}


/**
 * Test a URL for validity and count results.
 * @param url url
 * @param expected expected result (true or false)
 */

$numtests = 0;
$passed = 0;

function test_url($url, $expected) {
  global $numtests, $passed;
  $numtests++;
  $valid = is_valid_url($url);
  echo "URL Valid?: " . ($valid?"yes":"no") . " for URL: $url. Expected: ".($expected?"yes":"no").". ";
  if($valid == $expected) {
    echo "PASSn"; $passed++;
  } else {
    echo "FAILn";
  }
  echo "<br/>";
}

echo "URL Tests:nn";

test_url("http://localserver/projects/public/assets/javascript/widgets/UserBoxMenu/widget.css", true);
test_url("http://www.google.com", true);
test_url("http://www.google.co.uk/projects/my%20folder/test.php", true);
test_url("https://myserver.localdomain", true);
test_url("love is you love is me http://192.168.1.120/projects/index.php", true);
test_url("http://192.168.1.1/projects/index.php", true);
test_url("http://projectpier-server.localdomain/projects/public/assets/javascript/widgets/UserBoxMenu/widget.css", true);
test_url("https://2.4.168.19/project-pier?c=test&a=b", true);
test_url("https://localhost/a/b/c/test.php?c=controller&arg1=20&arg2=20", true);
test_url("http://user:password@localhost/a/b/c/test.php?c=controller&arg1=20&arg2=20", true);

echo "n$passed out of $numtests tests passed.nn";