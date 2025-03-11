
<?php

return [
    "module_name" => [
        "single" => "Documentatie",
        "multiple" => "Documentatie"
    ],
    "fields" => [
        "uploads" => [
            "active" => true,
            "type" => "",
            "title" => "Uploads",
            "read" => false,
            "required" => true,
            "edit" => true
        ],
        "documentcat" => [
            "active" => false,
            "type" => "checklist",
            "title" => "Categorieën",
            "options" => [],
            "read" => true,
            "value" => null,
            "required" => true,
            "edit" => true
        ],
        "locale" => [
            "active" => false,
            "type" => "locale",
            "title" => "Taalinstelling",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "author" => [
            "active" => false,
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
            "active" => false,
            "type" => "text",
            "title" => "Titel 2",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "title_3" => [
            "active" => false,
            "type" => "text",
            "title" => "Titel 3",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "slug" => [
            "active" => false,
            "type" => "text",
            "title" => "Slug",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "seo_title" => [
            "active" => false,
            "type" => "text",
            "title" => "SEO Titel",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "seo_description" => [
            "active" => false,
            "type" => "textarea",
            "title" => "SEO Omschrijving",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "tags" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Tags",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "summary" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Opsomming",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "excerpt" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Inleiding",
            "read" => true,
            "required" => true,
            "edit" => true
        ],
        "content" => [
            "active" => false,
            "type" => "editor",
            "title" => "Content",
            "read" => true,
            "required" => true,
            "edit" => true
        ]
    ]
];
