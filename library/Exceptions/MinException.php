<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Alexandre Gomes Gaigalas <alganet@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class MinException extends ValidationException
{
    public const string INCLUSIVE = 'inclusive';

    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 必须大于或等于 {{compareTo}}',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能大于或等于 {{compareTo}}',
        ],
    ];
}
