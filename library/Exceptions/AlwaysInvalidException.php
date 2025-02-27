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
 * @author William Espindola <oi@williamespindola.com.br>
 */
final class AlwaysInvalidException extends ValidationException
{
    public const string SIMPLE = 'simple';

    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 始终无效',
            self::SIMPLE   => '{{name}} 无效',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 始终有效',
            self::SIMPLE   => '{{name}} 有效',
        ],
    ];
}
