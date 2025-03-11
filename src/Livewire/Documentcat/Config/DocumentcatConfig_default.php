<?php

return [
    "module_name" => [
        "single" => "Document categorie",
        "multiple" => "Document categorieen"
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
        "locale" => [
            "active" => true,
            "type" => "text",
            "title" => "Taal",
            "read" => true,
            "required" => true,
            "edit" => false
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
            "title" => "Subtitel",
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
        ],
        "content_wysiwyg" => [
            "active" => false,
            "type" => "editor",
            "title" => "Content",
            "read" => true,
            "required" => true,
            "edit" => true
        ]
    ]
];
