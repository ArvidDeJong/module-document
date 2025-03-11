<?php

namespace App\Livewire\Manta\Documentcat;

use Manta\Models\Documentcat;
use Darvis\Manta\Traits\MantaTrait;
use Livewire\Component;
use Illuminate\Http\Request;

class DocumentcatRead extends Component
{
    use MantaTrait;
    use DocumentcatTrait;

    public function mount(Request $request, Documentcat $documentcat)
    {
        $this->item = $documentcat;
        $this->itemOrg = $documentcat;
        $this->locale = $documentcat->locale;
        if ($request->input('locale') && $request->input('locale') != getLocaleManta()) {
            $this->pid = $documentcat->id;
            $this->locale = $request->input('locale');
            $item_translate = Documentcat::where(['pid' => $documentcat->id, 'locale' => $request->input('locale')])->first();
            $this->item = $item_translate;
        }

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('read', [
            'parents' =>
            [
                ['url' => route('document.list'), 'title' => module_config('Document')['module_name']['multiple']]
            ]
        ]);
    }

    public function render()
    {
        return view('manta::default.manta-default-read')->title($this->config['module_name']['single'] . ' bekijken');
    }
}
