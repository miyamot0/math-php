<?php

namespace Math\Functions;

class PolynomialTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForString
     */
    public function testString(array $coefficients, string $expected)
    {
        // p(x) = x² + 2x + 3

        $polynomial = new Polynomial($coefficients);
        $string     = strval($polynomial);
        $this->assertEquals($expected, $string);
    }

    public function dataProviderForString()
    {
        return [
            [
                [1, 2, 3],       // p(x) = x² + 2x + 3
                'x² + 2x + 3',
            ],
            [
                [2, 3, 4],       // p(x) = 2x² + 3x + 4
                '2x² + 3x + 4',
            ],
            [
                [-1, -2, -3],       // p(x) = -x² - 2x - 3
                '-x² - 2x - 3',
            ],
            [
                [-2, -3, -4],       // p(x) = -2x² - 3x - 4
                '-2x² - 3x - 4',
            ],
            [
                [0, 2, 3],       // p(x) = 2x + 3
                '2x + 3',
            ],
            [
                [1, 0, 3],       // p(x) = x² + 3
                'x² + 3',
            ],
            [
                [1, 2, 0],       // p(x) = x² + 2x
                'x² + 2x',
            ],
            [
                [0, 0, 3],       // p(x) = 3
                '3',
            ],
            [
                [1, 0, 0],       // p(x) = x²
                'x²',
            ],
            [
                [0, 2, 0],       // p(x) = 2x
                '2x',
            ],

            [
                [0, -2, 3],       // p(x) = -2x + 3
                '-2x + 3',
            ],
            [
                [-1, 0, 3],       // p(x) = -x² + 3
                '-x² + 3',
            ],
            [
                [1, -2, 0],       // p(x) = x² - 2x
                'x² - 2x',
            ],
            [
                [0, 0, -3],       // p(x) = -3
                '-3',
            ],
            [
                [-1, 0, 0],       // p(x) = -x²
                '-x²',
            ],
            [
                [0, -2, 0],       // p(x) = -2x
                '-2x',
            ],
            [
                [0, 0, 0],       // p(x) = ''
                '',
            ],
            [
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],       // p(x) = x¹¹ + 2x¹⁰ + 3x⁹ + 4x⁸ + 5x⁷ + 6x⁶ + 7x⁵ + 8x⁴ + 9x³ + 10x² + 11x + 12
                'x¹¹ + 2x¹⁰ + 3x⁹ + 4x⁸ + 5x⁷ + 6x⁶ + 7x⁵ + 8x⁴ + 9x³ + 10x² + 11x + 12',
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForEval
     */
    public function testEval(array $coefficients, $x, $expected)
    {
        $polynomial = new Polynomial($coefficients);
        $evaluated  = $polynomial($x);
        $this->assertEquals($expected, $evaluated);
    }

    public function dataProviderForEval()
    {
        return [
            [
                [1, 2, 3], // p(x) = x² + 2x + 3
                0, 3       // p(0) = 3
            ],
            [
                [1, 2, 3], // p(x) = x² + 2x + 3
                1, 6       // p(1) = 6
            ],
            [
                [1, 2, 3], // p(x) = x² + 2x + 3
                2, 11      // p(2) = 11
            ],
            [
                [1, 2, 3], // p(x) = x² + 2x + 3
                3, 18      // p(3) = 18
            ],
            [
                [1, 2, 3], // p(x) = x² + 2x + 3
                4, 27      // p(4) = 27
            ],
            [
                [1, 2, 3], // p(x) = x² + 2x + 3
                -1, 2     // p(-1) = 2
            ],
        ];
    }
}