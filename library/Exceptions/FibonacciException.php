<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 *  SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Danilo Correa <danilosilva87@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Samuel Heinzmann <samuel.heinzmann@swisscom.com>
 */
final class FibonacciException extends ValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 必须是有效的斐波纳契数',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能是有效的斐波纳契数',
        ],
    ];
}
