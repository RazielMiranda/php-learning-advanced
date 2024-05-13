<?php
// this demonstrates using the Iterator pattern for pagination
// 1. run this command: `php -S localhost:9999 using_iterator_pattern.php`
// 2. from a browser: `http://localhost:9999`
define('LINES_PER_PAGE', 5);
define('SESS_DATA_1', __DIR__ . '/sess_data_1.txt');
define('SESS_DATA_2', __DIR__ . '/sess_data_2.txt');
$iterate = function () {
	// grab page number and calc offset
    $page_num = (int) file_get_contents(SESS_DATA_2);
    $offset = $page_num * LINES_PER_PAGE;
	// get ipsum
    $contents = file(SESS_DATA_1);
    $iterator = new ArrayIterator($contents);
    $infinite = new InfiniteIterator($iterator);
    $limit    = new LimitIterator($infinite, $offset, LINES_PER_PAGE);
    // paginate using LimitIterator
    foreach ($limit as $line) echo $line . '<br />' . PHP_EOL;
    // update page number
	file_put_contents(SESS_DATA_2, ++$page_num);
};
if (isset($_GET['next_page'])) {
    $iterate();
    exit;
}
// get content from Lorem Ipsum
$url = 'https://loripsum.net/api/10/short/paragraphs/plaintext';
// store content and page number
file_put_contents(SESS_DATA_1, file_get_contents($url));
file_put_contents(SESS_DATA_2, 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PHP Objects: OOP Software Design Patterns: Iterator Pattern</title>
</head>
<body>
<h1>PHP Objects: OOP Software Design Patterns: Iterator Pattern</h1>
<div id="content" style="height:300px;">
<?php $iterate(); ?>
<input type="hidden" name="page_num" id="page_num" value="0" />
</div>
<button onclick="next_page()" id="next">NEXT</button>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
function next_page()
{
	console.log('next_page');
	$.ajax({
		url: '?next_page=Y',
		success: function(text) {
			$('#content').html(text);
		}
	});
}
</script>
</body>
</html>
