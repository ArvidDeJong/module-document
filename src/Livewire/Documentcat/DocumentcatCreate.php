<?php

namespace Darvis\ModuleDocument\Livewire\Documentcat;

use Livewire\Component;
use Darvis\ModuleDocument\Models\Documentcat;
use Darvis\ModuleDocument\Models\Documentcatjoin;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DocumentcatCreate extends Component
{
    use MantaTrait;
    use DocumentcatTrait;

    public function mount(Request $request)
    {
        $this->locale = getLocaleManta();
        if ($request->input('locale') && $request->input('pid')) {
            $item = Documentcat::find($request->input('pid'));
            $this->pid = $item->id;
            $this->locale = $request->input('locale');
            $this->itemOrg = $item;
        }

        // $this->fields['item']['options'] = $this->getDocumentcats();


        // $this->author = auth('staff')->user()->name;

        if (class_exists(Faker::class) && env('APP_ENV') == 'local') {
            $faker = Faker::create('NL_nl');
            // Veldwaardes genereren met Faker
            // $this->title = $faker->sentence(4);
            // $this->title_2 = $faker->sentence(4);
            // $this->title_3 = $faker->sentence(4);
            // $this->slug = Str::of($this->title)->slug('-');
            // $this->seo_title = $this->title;
            // $this->seo_description = $faker->sentence(10);
            // $this->tags = $faker->words(5, true); // Een string van 5 willekeurige woorden
            // $this->summary = $faker->paragraph(3); // Een paragraaf met 3 zinnen
            // $this->excerpt = $faker->text(500);
            // $this->content = $faker->text(500);
        }

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('create', [
            'parents' =>
            [
                ['url' => route('document.list'), 'title' => module_config('Document')['module_name']['multiple']]
            ]
        ]);
    }

    public function render()
    {
        return view('manta::default.manta-default-create')->title($this->config['module_name']['single'] . ' toevoegen');
    }

    public function save()
    {
        $this->validate();

        $row = $this->only(
            'item_id',
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

        $row['locale'] = getLocaleManta();
        $row['active'] = (bool) $this->active; // Zorg ervoor dat active een bool is
        $row['created_by'] = auth('staff')->user()->name;
        $row['host'] = request()->host();
        $row['slug'] = $this->slug ? $this->slug : Str::of($this->title)->slug('-');

        Documentcat::create($row);

        return $this->redirect(DocumentcatList::class);
    }
}
