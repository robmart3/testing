<?php
$gh_ips = array('171.149.246.236', '95.92.138.4');
if (in_array($_SERVER['REMOTE_ADDR'], $gh_ips) === false) {
    header('Status: 403 Your IP is not on our list; bugger off', true, 403);
    mail('root', 'Unfuddle hook error: bad ip', $_SERVER['REMOTE_ADDR']);
    die(1);
}
$BRANCH = $_GET['branch'];
if (!empty($BRANCH)) {
    $output = shell_exec("cd /home/home1/robm/public_html/tester/; git pull origin {$BRANCH};");
    echo "<pre>$output</pre>";
}
die("done " . mktime()); ?>Hi
