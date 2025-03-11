<?php

return [
    "module_name" => [
        "single" => "Document categorie",
        "multiple" => "Document categorieen"
    ],
    "fields" => [
        "uploads" => [
            "active" => false,
            "type" => "",
            "title" => "Uploads",
            "read" => false,
            "required" => false,
        ],
        "locale" => [
            "active" => true,
            "type" => "text",
            "title" => "Taal",
            "read" => true,
            "required" => false,
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
            "title" => "Subtitel",
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
            "active" => false,
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
        ],
        "content_wysiwyg" => [
            "active" => false,
            "type" => "editor",
            "title" => "Content",
            "read" => true
        ]
    ]
];
