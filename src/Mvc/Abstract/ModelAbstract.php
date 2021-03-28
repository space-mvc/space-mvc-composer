<?php

namespace SpaceMvc\Framework\Mvc\Abstract;

use SpaceMvc\Framework\Database\Mysql\Resource\Item;

/**
 * Class ModelAbstract
 * @package SpaceMvc\Framework\Mvc\Abstract
 */
abstract class ModelAbstract
{
    /** @var string $table */
    protected string $table = '';

    /** @var array $table */
    protected array $fillable = [];

    /** @var array $attributes */
    protected array $attributes = [];

    /** @var bool $saved */
    protected bool $saved = false;

}
