<?hh

namespace App;

require "fib.php";

function main(array<string> $argv) {
  echo 'The ' . $argv[1] . ' number in fibonacci is: '
      . \Fib\fibonacci((int) $argv[1]) . \PHP_EOL;
}

main($argv);
