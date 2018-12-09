<?php

namespace Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class SupportTask extends Model
{
    private const TIME_ACTUAL_TASK = 1;

    public $timestamps = false;

    protected $fillable = ['title', 'body'];

    public const NAME = 'support_task';

    public const PROPERTY_ID = 'id';
    public const PROPERTY_BODY = 'body';
    public const PROPERTY_TITLE = 'title';
    public const PROPERTY_MODIFIED = 'modified';
    public const PROPERTY_CREATED = 'created';
    public const PROPERTY_DELETED = 'deleted';

    protected $table = self::NAME;

    /**
     * Активнве задачи для саппорта
     * @return mixed
     * @throws \Exception
     */
    public static function getActive(): Collection
    {
        return static::where([
            [static::PROPERTY_DELETED, '=', 0],
            [static::PROPERTY_CREATED, '>', static::getActualTime()]
        ])->get();
    }

    /**
     * @param $id
     * @return SupportTask|null
     * @throws \Exception
     */
    public static function findActive($id): ?SupportTask
    {
        return static::where([
            [static::PROPERTY_DELETED, '=', 0],
            [static::PROPERTY_CREATED, '>', static::getActualTime()]
        ])->find($id);
    }

    /**
     * Создание новой задачи для саппорта
     * @param string|null $title
     * @param string|null $body
     */
    public function newTask(?string $title, ?string $body): void
    {
        $this->title = $title;
        $this->body = $body;
        $date = date('Y-m-d H:i:s');
        $this->created = $date;
        $this->modified = $date;
    }

    /**
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(array $attributes = [], array $options = []): bool
    {
        $this->modified = date('Y-m-d H:i:s');
        return parent::update($attributes, $options);
    }

    /**
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function delete(array $attributes = [], array $options = []): bool
    {
        $this->modified = date('Y-m-d H:i:s');
        $this->deleted = true;
        return parent::update($attributes, $options);
    }

    /**
     * @return false|string
     * @throws \Exception
     */
    private static function getActualTime(): string
    {
        return Carbon::now()->sub(new \DateInterval('PT' . static::TIME_ACTUAL_TASK . 'H'))->format('Y-m-d H:i:s');
    }
}
