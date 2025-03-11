
<?php

return [
    "module_name" => [
        "single" => "Documentatie",
        "multiple" => "Documentatie"
    ],
    "fields" => [
        "uploads" => [
            "active" => false,
            "type" => "",
            "title" => "Uploads",
            "read" => false,
            "required" => true,
            "edit" => true
        ],
        "documentcat" => [
            "active" => true,
            "type" => "checklist",
            "title" => "Categorieën",
            "options" => [],
            "read" => true,
            "value" => null,
            "required" => true,
            "edit" => true
        ],
        "locale" => [
            "active" => true,
            "type" => "locale",
            "title" => "Taalinstelling",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "author" => [
            "active" => true,
            "type" => "text",
            "title" => "Auteur",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "title" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "title_2" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel 2",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "title_3" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel 3",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "slug" => [
            "active" => true,
            "type" => "text",
            "title" => "Slug",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "seo_title" => [
            "active" => true,
            "type" => "text",
            "title" => "SEO Titel",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "seo_description" => [
            "active" => true,
            "type" => "textarea",
            "title" => "SEO Omschrijving",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "tags" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Tags",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "summary" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Opsomming",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "excerpt" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Inleiding",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "content" => [
            "active" => true,
            "type" => "editor",
            "title" => "Content",
            "read" => true,
            "required" => true,
            "edit" => true
        ]
    ]
];
