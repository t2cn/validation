<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * @author Danilo Correa <danilosilva87@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Tomasz Regdos <tomek@regdos.com>
 */
final class PeselException extends ValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT  => [
            self::STANDARD => '{{name}} 必须是有效的比索',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能是有效的比索',
        ],
    ];
}
