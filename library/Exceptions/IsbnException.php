<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Moritz Fromm <moritzgitfromm@gmail.com>
 */
final class IsbnException extends ValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 必须是ISBN',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能是ISBN',
        ],
    ];
}
