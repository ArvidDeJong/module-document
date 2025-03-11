<?php

namespace Darvis\ModuleDocument\Livewire\Documentcat;

use Livewire\Component;
use Darvis\ModuleDocument\Models\Documentcat;
use Darvis\Manta\Traits\MantaTrait;

class DocumentcatUpload extends Component
{
    use MantaTrait;
    use DocumentcatTrait;

    public function mount(Documentcat $documentcat)
    {
        $this->item = $documentcat;
        $this->itemOrg = $documentcat;
        $this->id = $documentcat->id;
        $this->locale = $documentcat->locale;

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('upload', [
            'parents' =>
            [
                ['url' => route('document.list'), 'title' => module_config('Document')['module_name']['multiple']]
            ]
        ]);
    }

    public function render()
    {
        return view('manta::default.manta-default-upload')->title($this->config['module_name']['single'] . ' bestanden');
    }
}
