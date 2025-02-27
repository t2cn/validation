<?php
/**
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Respect\Validation\Exceptions;

use InvalidArgumentException;
use Respect\Validation\Message\Formatter;

use function key;

/**
 * Default exception class for rule validations.
 * @author Alexandre Gomes Gaigalas <alganet@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class ValidationException extends InvalidArgumentException implements Exception
{
    public const string MODE_DEFAULT = 'default';
    public const string MODE_NEGATIVE = 'negative';
    public const string STANDARD = 'standard';

    /**
     * Contains the default templates for exception message.
     *
     * @var string[][]
     */
    protected array $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} 必须有效',
        ],

        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} 不能有效',
        ],
    ];

    /**
     * @var mixed
     */
    private $input;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $mode = self::MODE_DEFAULT;

    /**
     * @var mixed[]
     */
    private $params = [];

    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * @var string
     */
    private $template;

    /**
     * @param mixed $input
     * @param mixed[] $params
     */
    public function __construct($input, string $id, array $params, Formatter $formatter)
    {
        $this->input     = $input;
        $this->id        = $id;
        $this->params    = $params;
        $this->formatter = $formatter;
        $this->template  = $this->chooseTemplate();

        parent::__construct($this->createMessage());
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return mixed[]
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return mixed|null
     */
    public function getParam(string $name)
    {
        return $this->params[$name] ?? null;
    }

    public function setParam(string $name, mixed $value): void
    {
        $this->params[$name] = $value;
    }

    public function updateMode(string $mode): void
    {
        $this->mode    = $mode;
        $this->message = $this->createMessage();
    }

    public function updateTemplate(string $template): void
    {
        $this->template = $template;
        $this->message  = $this->createMessage();
    }

    /**
     * @param mixed[] $params
     */
    public function updateParams(array $params): void
    {
        $this->params  = $params;
        $this->message = $this->createMessage();
    }

    public function hasCustomTemplate(): bool
    {
        return isset($this->defaultTemplates[$this->mode][$this->template]) === false;
    }

    /**
     * @return string
     */
    protected function chooseTemplate(): string
    {
        return (string)key($this->defaultTemplates[$this->mode]);
    }

    private function createMessage(): string
    {
        return $this->formatter->format(
            $this->defaultTemplates[$this->mode][$this->template] ?? $this->template,
            $this->input,
            $this->params
        );
    }

    public function __toString(): string
    {
        return $this->getMessage();
    }
}
