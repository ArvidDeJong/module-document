<?php

namespace Darvis\ModuleDocument\Livewire\Document;

use Livewire\Component;
use Darvis\ModuleDocument\Models\Document;
use Darvis\ModuleDocument\Models\Documentcatjoin;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;

class DocumentUpdate extends Component
{
    use MantaTrait;
    use DocumentTrait;

    public function mount(Request $request, Document $document)
    {
        $this->item = $document;
        $this->itemOrg = translate($document, 'nl')['org'];
        $this->id = $document->id;
        $this->locale = $document->locale;

        $this->fill(
            $document->only(
                'company_id',
                'pid',
                'locale',
                'author',
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

        $this->fields['documentcat']['options'] = $this->getDocumentcats();

        foreach (Documentcatjoin::where('document_id', $this->id)->get() as $key => $value) {
            $this->documentcat[$value->documentcat_id] = true;
        }

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('update');
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
            'author',
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
        Document::where('id', $this->id)->update($row);

        $ids = [];
        foreach ($this->documentcat as $key => $value) {
            if ($value == true) {
                $item = Documentcatjoin::where(['document_id' => $this->id, 'documentcat_id' => $key])->first();
                $ids[] = $key;
                if (!$item) {
                    Documentcatjoin::create(['document_id' => $this->id, 'documentcat_id' => $key]);
                } else {
                }
            }
        }
        Documentcatjoin::where('document_id', $this->id)->whereNotIn('documentcat_id', $ids)->delete();

        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
        // return redirect()->to(route($this->route_name . '.list'));
    }
}
