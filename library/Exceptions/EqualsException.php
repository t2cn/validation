<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 *  SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Alexandre Gomes Gaigalas <alganet@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Ian Nisbet <ian@glutenite.co.uk>
 */
final class EqualsException extends ValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT  => [
            self::STANDARD => '{{name}} 必须等于 {{compareTo}}',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能等于 {{compareTo}}',
        ],
    ];
}
