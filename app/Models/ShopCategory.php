<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\ShopCategory
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereSlug($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\ShopProduct|null $product
 * @method static \Illuminate\Database\Query\Builder|ShopCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ShopCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ShopCategory withoutTrashed()
 * @property-read int|null $product_count
 */
class ShopCategory extends Model
{
    use HasSlug, SoftDeletes;

    protected $fillable = ['name', 'description', 'img'];

    protected $dates = ['deleted_at'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function product() {
        return $this->hasMany('App\Models\ShopProduct');
    }
}
