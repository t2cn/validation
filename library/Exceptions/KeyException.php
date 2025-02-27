<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * Exceptions to be thrown by the Attribute Rule.
 *
 * @author Alexandre Gomes Gaigalas <alganet@gmail.com>
 * @author Emmerson Siqueira <emmersonsiqueira@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class KeyException extends NestedValidationException implements NonOmissibleException
{
    public const string NOT_PRESENT = 'not_present';
    public const string INVALID = 'invalid';

    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NOT_PRESENT => '键 {{name}} 必须存在',
            self::INVALID     => '键 {{name}} 必须有效',
        ],

        self::MODE_NEGATIVE => [
            self::NOT_PRESENT => '键 {{name}} 不能存在',
            self::INVALID     => '键 {{name}} 必须无效',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected function chooseTemplate(): string
    {
        return $this->getParam('hasReference') ? self::INVALID : self::NOT_PRESENT;
    }
}
