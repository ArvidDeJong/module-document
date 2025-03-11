<?php

namespace Darvis\ModuleDocument\Livewire\Documentcat;

use Livewire\Component;
use Darvis\ModuleDocument\Models\Documentcat;
use Darvis\Manta\Traits\MantaTrait;
use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Livewire\WithPagination;
use Darvis\Manta\Services\Manta;

class DocumentcatList extends Component
{
    use DocumentcatTrait;
    use WithPagination;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;

    public function mount()
    {
        $this->getBreadcrumb('list', [
            'parents' =>
            [
                ['url' => route('document.list'), 'title' => module_config('Document')['module_name']['multiple']]
            ]
        ]);
        $this->sortBy = 'sort';
        $this->sortDirection = 'asc';
    }

    public function render()
    {
        $this->trashed = count(Documentcat::whereNull('pid')->onlyTrashed()->get());

        $obj = Documentcat::whereNull('pid');
        if ($this->tablistShow == 'trashed') {
            $obj->onlyTrashed();
        }
        $obj = $this->applySorting($obj);
        $obj = $this->applySearch($obj);
        $items = $obj->paginate(50);
        return view('module-document::livewire.documentcat.documentcat-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
