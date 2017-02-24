<?php
class Fibonacci
{
    /**
     * @var int[]
     */
    private $fibonacciSequence = [0, 1];
    public function __construct(int $endPos)
    {
        $this->generateFibonacciSequence($endPos);
    }
    public function getFibonacciRange(int $startPos, int $endPos)
    {
        return array_slice($this->fibonacciSequence, $startPos, $endPos);
    }
    private function generateFibonacciSequence(int $endPos)
    {
        for ($i = 2; $i < $endPos; $i++) {
            $a = $this->fibonacciSequence[$i - 2];
            $b = $this->fibonacciSequence[$i - 1];
            $this->fibonacciSequence[] = $a + $b;
        }
    }
}
$start = intval(trim(fgets(STDIN)));
$end = intval(trim(fgets(STDIN)));
$fib = new Fibonacci($end);
echo implode(", ", $fib->getFibonacciRange($start, $end));