<?php

namespace Darvis\ModuleDocument\Livewire\Documentcat;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Darvis\Manta\Traits\TableRowTrait;

class DocumentcatListRow extends Component
{
    use DocumentcatTrait;
    use TableRowTrait;

    public function render(): View
    {
        return view('module-document::livewire.documentcat.documentcat-list-row');
    }
}
