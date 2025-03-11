<?php

namespace Darvis\ModuleDocument\Livewire\Document;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Darvis\Manta\Traits\TableRowTrait;

class DocumentListRow extends Component
{
    use DocumentTrait;
    use TableRowTrait;

    public function render(): View
    {
        return view('module-document::livewire.document.document-list-row');
    }
}
