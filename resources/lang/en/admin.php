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

    // 'sub-category' => [
    //     'title' => 'Sub Categories',

    //     'actions' => [
    //         'index' => 'Sub Categories',
    //         'create' => 'New Sub Category',
    //         'edit' => 'Edit :name',
    //         'export' => 'Export',
    //     ],

    //     'columns' => [
    //         'id' => 'ID',
    //         'sub_title' => 'Sub title',
    //         'description' => 'Description',
    //         'category_id' => 'Category',

    //     ],
    // ],

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

    'ad' => [
        'title' => 'Ads',

        'actions' => [
            'index' => 'Ads',
            'create' => 'New Ad',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'page' => 'Page',
            'direction' => 'Direction',
            
        ],
    ],

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

    'post' => [
        'title' => 'Post',

        'actions' => [
            'index' => 'Post',
            'create' => 'New Post',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'tag' => [
        'title' => 'Tag',

        'actions' => [
            'index' => 'Tag',
            'create' => 'New Tag',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'author' => [
        'title' => 'Author',

        'actions' => [
            'index' => 'Author',
            'create' => 'New Author',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

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

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
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

    'post' => [
        'title' => 'Post',

        'actions' => [
            'index' => 'Post',
            'create' => 'New Post',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'tag' => [
        'title' => 'Tags',

        'actions' => [
            'index' => 'Tags',
            'create' => 'New Tag',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
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
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'sub-category' => [
        'title' => 'Subcategories',

        'actions' => [
            'index' => 'Subcategories',
            'create' => 'New Subcategory',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
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

    'sub-category' => [
        'title' => 'Subcategories',

        'actions' => [
            'index' => 'Subcategories',
            'create' => 'New Subcategory',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'sub-category' => [
        'title' => 'Sub Categories',

        'actions' => [
            'index' => 'Sub Categories',
            'create' => 'New Sub Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'sub_title' => 'Sub title',
            'description' => 'Description',
            'category_id' => 'Category',
            
        ],
    ],

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

    'tag' => [
        'title' => 'Tag',

        'actions' => [
            'index' => 'Tag',
            'create' => 'New Tag',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'category' => [
        'title' => 'Category',

        'actions' => [
            'index' => 'Category',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'author' => [
        'title' => 'Author',

        'actions' => [
            'index' => 'Author',
            'create' => 'New Author',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'location' => 'Location',
            'sub_title' => 'Sub title',
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
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
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
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

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

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'location' => 'Location',
            'sub_title' => 'Sub title',
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
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
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
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'location' => 'Location',
            'sub_title' => 'Sub title',
            'body' => 'Body',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            'popularity' => 'Popularity',
            'category_id' => 'Category',
            'author_id' => 'Author',
            
        ],
    ],

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

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'location' => 'Location',
            'sub_title' => 'Sub title',
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
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
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
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
