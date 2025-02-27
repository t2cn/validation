<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Andre Ramaciotti <andre@ramaciotti.com>
 * @author Danilo Correa <danilosilva87@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class PunctException extends FilteredValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 只能包含标点符号',
            self::EXTRA    => '{{name}} 只能包含标点符号和 {{additionalChars}}',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能包含标点符号',
            self::EXTRA    => '{{name}} 不能包含标点符号或 {{additionalChars}}',
        ],
    ];
}
