echo "please work<br>ok i think this is finally going to work<Br><br>";

$lines = file('../repo/file_php_example/meta.lu');

//just adding a comment
// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($lines as $line_num => $line) {
    echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}