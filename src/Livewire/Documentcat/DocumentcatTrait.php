<?php

namespace Darvis\ModuleDocument\Livewire\Documentcat;

use Darvis\ModuleDocument\Models\Documentcat;
use Darvis\Manta\Services\Openai;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Locked;
use Illuminate\Support\Str;
use Darvis\Manta\Services\Manta;

trait DocumentcatTrait
{

    public function __construct()
    {
        $this->route_name = 'documentcat';
        $this->route_list = route($this->route_name . '.list');
        $this->config = module_config('Documentcat', 'document');
        $this->fields = $this->config['fields'];
        $this->moduleClass = 'Darvis\ModuleDocument\Models\Documentcat';
    }

    public ?Documentcat $item = null;
    public ?Documentcat $itemOrg = null;




    #[Locked]
    public ?string $company_id = null;

    #[Locked]
    public ?string $host = null;

    public ?string $locale = null;
    public ?string $pid = null;

    public ?bool $active = null;
    public ?int $sort = null;
    public ?int $documentcat_id = null;
    public ?string $title = null;
    public ?string $title_2 = null;
    public ?string $title_3 = null;

    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $tags = null;
    public ?string $summary = null;
    public ?string $excerpt = null;
    public ?string $content = null;

    #[Locked]
    public ?string $redirect_url = null;

    public function rules()
    {
        $return = [];
        if ($this->fields['title']) $return['title'] = 'required';
        // if ($this->fields['excerpt']) $return['excerpt'] = 'required';
        return $return;
    }

    public function messages()
    {
        $return = [];
        $return['title.required'] = 'De titel is verplicht';
        $return['excerpt.required'] = 'De inleiding is verplicht';
        return $return;
    }

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query->where(function (Builder $querysub) {
                $querysub->where('title', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%");
            });
    }



    public function getDocumentcats()
    {
        $return = [];

        foreach (Documentcat::whereNull('documentcat_id')->whereNull('pid')->get() as $value) {
            $return[$value->id] = $value->title;
        }

        return $return;
    }
}
