<?hh

namespace Fib;

function fibonacci(int $number): int {
  return \intval(\round(\pow((\sqrt(5) + 1) / 2, $number) / \sqrt(5)));
}
