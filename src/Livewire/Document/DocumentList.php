<?php

namespace Darvis\ModuleDocument\Livewire\Document;

use Livewire\Component;
use Darvis\ModuleDocument\Models\Document;
use Darvis\ModuleDocument\Models\Documentcat;
use Darvis\Manta\Traits\MantaTrait;
use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Livewire\WithPagination;
use Darvis\Manta\Services\Manta;

class DocumentList extends Component
{
    use DocumentTrait;
    use WithPagination;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;

    public function mount()
    {
        $this->getBreadcrumb();

        $this->sortBy = 'title';
    }

    public function render()
    {
        $this->trashed = count(Document::whereNull('pid')->onlyTrashed()->get());

        $obj = Document::whereNull('pid');
        if ($this->tablistShow == 'trashed') {
            $obj->onlyTrashed();
        }
        $obj = $this->applySorting($obj);
        $obj = $this->applySearch($obj);
        $items = $obj->paginate(50);
        return view('module-document::livewire.document.document-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
