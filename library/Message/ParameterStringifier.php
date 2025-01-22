<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Message;

interface ParameterStringifier
{
    /**
     * @param string $name
     * @param mixed $value
     * @return string
     */
    public function stringify(string $name, mixed $value): string;
}
