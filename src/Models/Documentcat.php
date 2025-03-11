<?php

namespace Darvis\ModuleDocument\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Darvis\Manta\Traits\HasUploadsTrait;

class Documentcat extends Model
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
        'active',
        'sort',
        'documentcat_id',
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

    protected $guarded = ['id'];

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

    // Definieer de relatie met child Documentcats
    public function children()
    {
        return $this->hasMany(Documentcat::class, 'pid');
    }

    // Boot method to define model events
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($documentcat) {
            // Verwijder alle child documentcats voordat de parent wordt verwijderd
            $documentcat->children()->each(function ($child) {
                $child->delete();
            });
        });
    }

    public function document(): HasOne
    {
        return $this->hasOne(Documentcatjoin::class)
            ->join('documents', 'documents.id', '=', 'documentcatjoins.document_id')->whereNull('documents.deleted_at')->orderBy('documents.sort', 'ASC');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Documentcatjoin::class)
            ->join('documents', 'documents.id', '=', 'documentcatjoins.document_id')->whereNull('documents.deleted_at')->orderBy('documents.sort', 'ASC');
    }

    public function child(): HasOne
    {
        return $this->hasOne(Documentcat::class, 'pid')->orderBy('sort', 'ASC');
    }

    public function childs(): HasMany
    {
        return $this->hasMany(Documentcat::class, 'pid')->orderBy('sort', 'ASC');
    }



    public static function getItems($menu_id = null, $pid = null)
    {
        $menuItems = Documentcat::where('menu_id', $menu_id)->where('pid', $pid)->orderBy('sort', 'ASC')->get();

        $menuList = [];

        foreach ($menuItems as $menuItem) {
            $node = [
                'name' => $menuItem->title,
                'id' => $menuItem->id,
            ];

            $children = self::getItems($menu_id, $menuItem->id);

            if (!empty($children)) {
                $node['children'] = $children;
            }

            $menuList[] = $node;
        }

        return $menuList;
    }

    public static function updateSortOrder($menuItems)
    {
        foreach ($menuItems as $index => $menuItem) {
            $menu = Documentcat::find($menuItem['id']);
            if ($menu) {
                $menu->sort = $index + 1; // Adding 1 to index because sort starts from 1
                $menu->save();

                // Recursively update children
                if (!empty($menuItem['children'])) {
                    self::updateSortOrder($menuItem['children']);
                }
            }
        }
    }

    public static function updateParent($menuItems, $parentId = null)
    {
        foreach ($menuItems as $menuItem) {
            $menu = Documentcat::find($menuItem['id']);
            if ($menu) {
                $menu->pid = $parentId;
                $menu->save();

                // Recursively update children
                if (!empty($menuItem['children'])) {
                    self::updateParent($menuItem['children'], $menu->id);
                }
            }
        }
    }

    public static function generateNestedMenu($menuItems)
    {
        $html = '<ul class="ml-4 list-disc">';
        foreach ($menuItems as $menuItem) {
            $html .= '<li>';
            $html .= '<span>' . $menuItem['name'] . '</span>';
            if (isset($menuItem['children']) && !empty($menuItem['children'])) {
                $html .= self::generateNestedMenu($menuItem['children']);
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
