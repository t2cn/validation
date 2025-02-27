<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

/**
 * Exceptions thrown by Uploaded rule.
 *
 * @author Fajar Khairil <fajar.khairil@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Paul Karikari <paulkarikari1@gmail.com>
 */
final class UploadedException extends ValidationException
{
    /**
     * {@inheritDoc}
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 必须是上传的文件',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能是上传的文件',
        ],
    ];
}
