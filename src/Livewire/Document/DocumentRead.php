<?php

namespace Darvis\ModuleDocument\Livewire\Document;

use Darvis\ModuleDocument\Models\Document;
use Darvis\Manta\Traits\MantaTrait;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class DocumentRead extends Component
{
    use MantaTrait;
    use DocumentTrait;

    public function mount(Request $request, Document $document)
    {
        $this->item = $document;
        $this->itemOrg = $document;
        $this->locale = $document->locale;
        if ($request->input('locale') && $request->input('locale') != getLocaleManta()) {
            $this->pid = $document->id;
            $this->locale = $request->input('locale');
            $item_translate = Document::where(['pid' => $document->id, 'locale' => $request->input('locale')])->first();
            $this->item = $item_translate;
        }

        $this->fields['itemcat']['value'] = $this->itemOrg->getCategoriesList();

        if ($document) {
            $this->id = $document->id;
        }
        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('read');
    }

    public function render()
    {
        return View::make('manta::default.manta-default-read')->title($this->config['module_name']['single'] . ' bekijken');
    }
}
