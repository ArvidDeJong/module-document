<?php

namespace Darvis\ModuleDocument\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Darvis\ModuleDocument\Models\Documentcat;
use Darvis\Manta\Traits\HasUploadsTrait;

class Documentcatjoin extends Model
{
    use HasFactory;
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
        'document_id',
        'documentcat_id',
        'data',        // Nieuwe kolom
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * @param mixed $value 
     * @return mixed 
     */
    public function getDataAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }




    public function category(): HasOne
    {
        return $this->hasOne(Documentcatjoin::class, 'documentcat_id')
            ->join('documentcats', 'documentcats.id', '=', 'documentcatjoins.documentcat_id')->whereNull('documentcats.deleted_at')->orderBy('sort', 'ASC');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Documentcatjoin::class)
            ->join('documentcats', 'documentcats.id', '=', 'documentcatjoins.documentcat_id')->whereNull('documentcats.deleted_at')->orderBy('sort', 'ASC');
    }


    public function documents(): HasMany
    {
        return $this->hasMany(Documentcatjoin::class)
            ->join('documents', 'documents.id', '=', 'documentcatjoins.document_id')->whereNull('documents.deleted_at')->orderBy('sort', 'ASC');
    }

    public function document()
    {
        return $this->belongsTo(Document::class)->orderBy('sort', 'ASC');
    }
}
