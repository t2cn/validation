<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 *  SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * Exception class for IntType rule.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class IntTypeException extends ValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 必须是integer类型',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能是integer类型',
        ],
    ];
}
