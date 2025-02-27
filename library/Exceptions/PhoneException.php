<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

use Respect\Validation\Helpers\CountryInfo;

/**
 * @author Danilo Correa <danilosilva87@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Michael Firsikov <michael.firsikov@gmail.com>
 */
final class PhoneException extends ValidationException
{
    public const string FOR_COUNTRY = 'for_country';
    public const string INTERNATIONAL = 'international';

    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::INTERNATIONAL => '{{name}} 必须是有效的电话号码',
            self::FOR_COUNTRY   => '{{name}} 必须是 {{countryName}} 的有效电话号码',
        ],

        self::MODE_NEGATIVE => [
            self::INTERNATIONAL => '{{name}} 不能是有效的电话号码',
            self::FOR_COUNTRY   => '{{name}} 必须是 {{countryName}} 的有效电话号码',

        ],
    ];

    /**
     * {@inheritDoc}
     * @return string
     * @throws ComponentException
     */
    protected function chooseTemplate(): string
    {
        $countryCode = $this->getParam('countryCode');

        if (!$countryCode) {
            return self::INTERNATIONAL;
        }

        $countryInfo = new CountryInfo($countryCode);
        $this->setParam('countryName', $countryInfo->getCountry());

        return self::FOR_COUNTRY;
    }
}
