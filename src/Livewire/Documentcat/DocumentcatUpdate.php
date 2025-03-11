<?php

namespace Darvis\ModuleDocument\Livewire\Documentcat;

use Livewire\Component;
use Darvis\ModuleDocument\Models\Documentcat;
use Darvis\ModuleDocument\Models\Documentcatjoin;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentcatUpdate extends Component
{
    use MantaTrait;
    use DocumentcatTrait;

    public function mount(Documentcat $documentcat)
    {
        $this->item = $documentcat;
        $this->itemOrg = translate($documentcat, 'nl')['org'];
        $this->id = $documentcat->id;
        $this->locale = $documentcat->locale;

        $this->fill(
            $documentcat->only(
                'company_id',
                'pid',
                'locale',
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
            ),
        );

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('update', [
            'parents' =>
            [
                ['url' => route('document.list'), 'title' => module_config('Document')['module_name']['multiple']]
            ]
        ]);
    }

    public function render()
    {
        return view('manta::default.manta-default-update')->title($this->config['module_name']['single'] . ' aanpassen');
    }


    public function save()
    {
        $this->validate();

        $row = $this->only(
            'company_id',
            'pid',
            'locale',
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
        );
        $row['updated_by'] = auth('staff')->user()->name;
        Documentcat::where('id', $this->id)->update($row);

        // $ids = [];
        // foreach ($this->documentcat as $key => $value) {
        //     $item = Documentcatjoin::where(['documentcat_id' => $this->id, 'documentcat_id' => $key])->first();
        //     $ids[] = $key;
        //     if (!$item) {
        //         Documentcatjoin::create(['documentcat_id' => $this->id, 'documentcat_id' => $key]);
        //     }
        // }
        // Documentcatjoin::where('documentcat_id', $this->id)->whereNotIn('id', $ids)->delete();


        // return redirect()->to(route('documentcat.list'));
        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
    }
}
