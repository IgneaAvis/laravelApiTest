<?php

namespace App\Models\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Models\Country
 *
 * @property int $id
 * @property string $alias
 * @property string|null $name
 * @property string|null $name_en
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Country create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Country find($id, $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Country update(array $values)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country delete()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNameEn($value)
 * @mixin Eloquent
 * /**
 * @mixin Builder
 */
class Country extends Model
{
    use HasFactory;

    protected $table = 'country';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'alias',
        'name',
        'name_en'
    ];
}
