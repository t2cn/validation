<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 *  SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

use function count;

/**
 * @author Alexandre Gomes Gaigalas <alganet@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class GroupedValidationException extends NestedValidationException
{
    public const string NONE = 'none';
    public const string SOME = 'some';

    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => '所有必需的规则都必须传递给 {{name}}',
            self::SOME => '这些规则必须传递给 {{name}}',
        ],

        self::MODE_NEGATIVE => [
            self::NONE => '所有规则都不能传递给 {{name}}',
            self::SOME => '这些规则不能传递给 {{name}}',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        $numRules  = $this->getParam('passed');
        $numFailed = count($this->getChildren());

        return $numRules === $numFailed ? self::NONE : self::SOME;
    }
}
