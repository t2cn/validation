<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Andre Ramaciotti <andre@ramaciotti.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class SpaceException extends FilteredValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 只能包含空格字符',
            self::EXTRA    => '{{name}} 只能包含空格字符和 {{additionalChars}}',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能包含空格字符',
            self::EXTRA    => '{{name}} 不能包含空格字符或 {{additionalChars}}',
        ],
    ];
}
