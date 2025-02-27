<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * Exception class for Size rule.
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class SizeException extends NestedValidationException
{
    public const string BOTH = 'both';
    public const string LOWER = 'lower';
    public const string GREATER = 'greater';

    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::BOTH    => '{{name}} 必须介于 {{minSize}} 和 {{maxSize}} 之间',
            self::LOWER   => '{{name}} 必须大于 {{minSize}}',
            self::GREATER => '{{name}} 必须小于 {{maxSize}}',
        ],

        self::MODE_NEGATIVE => [
            self::BOTH    => '{{name}} 不能介于 {{minSize}} 和 {{maxSize}} 之间',
            self::LOWER   => '{{name}} 不能大于 {{minSize}}',
            self::GREATER => '{{name}} 不能小于 {{maxSize}}',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        if (!$this->getParam('minValue')) {
            return self::GREATER;
        }

        if (!$this->getParam('maxValue')) {
            return self::LOWER;
        }

        return self::BOTH;
    }
}
