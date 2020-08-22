<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            
        ],
    ],

    'author' => [
        'title' => 'Authors',

        'actions' => [
            'index' => 'Authors',
            'create' => 'New Author',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'sub-category' => [
        'title' => 'Sub Categories',

        'actions' => [
            'index' => 'Sub Categories',
            'create' => 'New Sub Category',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'sub_title' => 'Sub title',
            'description' => 'Description',
            'category_id' => 'Category',
            
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'export' => 'Export',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'location' => 'Location',
            'body' => 'Body',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            'popularity' => 'Popularity',
            'category_id' => 'Category',
            'author_id' => 'Author',
            
        ],
    ],

    'tag' => [
        'title' => 'Tags',

        'actions' => [
            'index' => 'Tags',
            'create' => 'New Tag',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'export' => 'Export',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'location' => 'Location',
            'body' => 'Body',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            'popularity' => 'Popularity',
            'category_id' => 'Category',
            'author_id' => 'Author',
            'tags_id' => 'Tags',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];