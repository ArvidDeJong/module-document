<?php

namespace Darvis\ModuleDocument\Livewire\Document;

use Livewire\Component;
use Manta\Models\Document;
use Darvis\Manta\Traits\MantaTrait;

class DocumentUpload extends Component
{
    use MantaTrait;
    use DocumentTrait;

    public function mount(Document $document)
    {
        $this->item = $document;
        $this->itemOrg = $document;
        $this->id = $document->id;
        $this->locale = $document->locale;

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('upload');
    }

    public function render()
    {
        return view('manta::default.manta-default-upload')->title($this->config['module_name']['single'] . ' bestanden');
    }
}
