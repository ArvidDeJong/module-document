<?php

namespace Darvis\ModuleDocument\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Darvis\Manta\Traits\HasUploadsTrait;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUploadsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'created_by',
        'updated_by',
        'deleted_by',
        'company_id',
        'host',
        'pid',
        'locale',
        'author',
        'title',
        'title_2',
        'title_3',
        'slug',
        'seo_title',
        'seo_description',
        'tags',
        'summary',
        'excerpt',
        'content',
        'data',        // Nieuwe kolom
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    /**
     * @param mixed $value 
     * @return mixed 
     */
    public function getDataAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public array $upload_cats = ['datasheet' => 'Document datasheet'];

    public function category(): HasOne
    {
        return $this->hasOne(Documentcatjoin::class)
            ->join('documentcats', 'documentcats.id', '=', 'documentcatjoins.documentcat_id')->whereNull('documentcats.deleted_at')->orderBy('documentcats.sort', 'ASC');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Documentcatjoin::class)
            ->join('documentcats', 'documentcats.id', '=', 'documentcatjoins.documentcat_id')->whereNull('documentcats.deleted_at')->orderBy('documentcats.sort', 'ASC');
    }

    public function documentcatjoins()
    {
        return $this->hasMany(Documentcatjoin::class);
    }

    public function getCategoriesList()
    {
        $return = [];

        foreach ($this->categories as $value) {
            $return[] = $value->title;
        }

        return $return;
    }
}
