<?php

namespace Darvis\ModuleDocument\Livewire\Document;

use Livewire\Component;
use Darvis\ModuleDocument\Models\Document;
use Darvis\ModuleDocument\Models\Documentcatjoin;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DocumentCreate extends Component
{
    use MantaTrait;
    use DocumentTrait;

    public function mount(Request $request)
    {
        $this->locale = getLocaleManta();
        if ($request->input('locale') && $request->input('pid')) {
            $item = Document::find($request->input('pid'));
            $this->pid = $item->id;
            $this->locale = $request->input('locale');
            $this->itemOrg = $item;
        }

        $this->fields['documentcat']['options'] = $this->getDocumentcats();


        $this->author = auth('staff')->user()->name;

        if (class_exists(Faker::class) && env('APP_ENV') == 'local') {
            $faker = Faker::create('NL_nl');
            // $this->title = $faker->sentence(4);
            // $this->title_2 = $faker->sentence(4);
            // $this->excerpt = $faker->text(500);
            // $this->slug = Str::of($this->title)->slug('-');
            // $this->seo_title = $this->title;
            // $this->content = $faker->text(500);
        }

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('create');
    }

    public function render()
    {
        return view('manta::default.manta-default-create')->title($this->config['module_name']['single'] . ' toevoegen');
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
        $row['created_by'] = auth('staff')->user()->name;
        $row['host'] = request()->host();
        $row['slug'] = $this->slug ? $this->slug : Str::of($this->title)->slug('-');
        $document = Document::create($row);

        foreach ($this->documentcat as $key => $value) {
            if ($value == true) {
                Documentcatjoin::create(['document_id' => $document->id, 'documentcat_id' => $key]);
            }
        }

        return $this->redirect(DocumentList::class);
    }
}
