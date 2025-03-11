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
            "required" => false,
        ],
        "documentcat" => [
            "active" => true,
            "type" => "checklist",
            "title" => "Categorieën",
            "options" => [],
            "read" => true,
            "value" => null
        ],
        "author" => [
            "active" => true,
            "type" => "text",
            "title" => "Auteur",
            "read" => true
        ],
        "title" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel",
            "read" => true
        ],
        "title_2" => [
            "active" => false,
            "type" => "text",
            "title" => "Titel 2",
            "read" => true
        ],
        "title_3" => [
            "active" => false,
            "type" => "text",
            "title" => "Titel 3",
            "read" => true
        ],
        "slug" => [
            "active" => false,
            "type" => "text",
            "title" => "Slug",
            "read" => true
        ],
        "seo_title" => [
            "active" => false,
            "type" => "text",
            "title" => "SEO Titel",
            "read" => true
        ],
        "seo_description" => [
            "active" => false,
            "type" => "textarea",
            "title" => "SEO Omschrijving",
            "read" => true
        ],
        "tags" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Tags",
            "read" => true
        ],
        "summary" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Opsomming",
            "read" => true
        ],
        "excerpt" => [
            "active" => false,
            "type" => "textarea",
            "title" => "Inleiding",
            "read" => true
        ],
        "content" => [
            "active" => false,
            "type" => "editor",
            "title" => "Content",
            "read" => true
        ]
    ]
];
