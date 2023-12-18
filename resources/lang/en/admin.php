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

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',

        ],
    ],

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',

        ],
    ],

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'member_category_id' => 'Member category',

        ],
    ],

    'lineage' => [
        'title' => 'Lineages',

        'actions' => [
            'index' => 'Lineages',
            'create' => 'New Lineage',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',

        ],
    ],

    'member-category' => [
        'title' => 'Member Categories',

        'actions' => [
            'index' => 'Member Categories',
            'create' => 'New Member Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',

        ],
    ],

    'affiliated-group' => [
        'title' => 'Affiliated Groups',

        'actions' => [
            'index' => 'Affiliated Groups',
            'create' => 'New Affiliated Group',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'affiliated_group_category_id' => 'Affiliated group category',

        ],
    ],

    'affiliated-category' => [
        'title' => 'Affiliated Categories',

        'actions' => [
            'index' => 'Affiliated Categories',
            'create' => 'New Affiliated Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',

        ],
    ],

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'member_category_id' => 'Member category',

        ],
    ],

    'student' => [
        'title' => 'Students',

        'actions' => [
            'index' => 'Students',
            'create' => 'New Student',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',

        ],
    ],

    'student' => [
        'title' => 'Students',

        'actions' => [
            'index' => 'Students',
            'create' => 'New Student',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'student-class' => [
        'title' => 'Student Classes',

        'actions' => [
            'index' => 'Student Classes',
            'create' => 'New Student Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',

        ],
    ],

    'student-type' => [
        'title' => 'Student Types',

        'actions' => [
            'index' => 'Student Types',
            'create' => 'New Student Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',

        ],
    ],

    'student' => [
        'title' => 'Students',

        'actions' => [
            'index' => 'Students',
            'create' => 'New Student',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'ordination_name' => 'Ordination name',
            'address' => 'Address',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'email' => 'Email',
            'phone_no' => 'Phone no',
            'roll_no' => 'Roll no',
            'student_type_id' => 'Student type',
            'student_class_id' => 'Student class',

        ],
    ],

    'student-class' => [
        'title' => 'Student Classes',

        'actions' => [
            'index' => 'Student Classes',
            'create' => 'New Student Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',

        ],
    ],

    'student-type' => [
        'title' => 'Student Types',

        'actions' => [
            'index' => 'Student Types',
            'create' => 'New Student Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',

        ],
    ],

    'board-member' => [
        'title' => 'Board Members',

        'actions' => [
            'index' => 'Board Members',
            'create' => 'New Board Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'board-member' => [
        'title' => 'Board Members',

        'actions' => [
            'index' => 'Board Members',
            'create' => 'New Board Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'designation' => 'Designation',
            'member_id' => 'Member',

        ],
    ],

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'member_category_id' => 'Member category',

        ],
    ],

    'member' => [
        'title' => 'Members',

        'actions' => [
            'index' => 'Members',
            'create' => 'New Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'short_description' => 'Short description',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'member_category_id' => 'Member category',
            'msg' => 'Msg',
            'name' => 'Name',
            'ordination_name' => 'Ordination name',
            'address' => 'Address',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'email' => 'Email',
            'phone_no' => 'Phone no',

        ],
    ],

    'join-leave-student-history' => [
        'title' => 'Join Leave Student Histories',

        'actions' => [
            'index' => 'Join Leave Student Histories',
            'create' => 'New Join Leave Student History',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'status' => 'Status',
            'joining_date' => 'Joining date',
            'leaving_date' => 'Leaving date',
            'student_id' => 'Student',

        ],
    ],

    'join-leave-member-history' => [
        'title' => 'Join Leave Member Histories',

        'actions' => [
            'index' => 'Join Leave Member Histories',
            'create' => 'New Join Leave Member History',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'status' => 'Status',
            'joining_date' => 'Joining date',
            'leaving_date' => 'Leaving date',
            'member_id' => 'Member',

        ],
    ],

    'member-attendance' => [
        'title' => 'Member Attendances',

        'actions' => [
            'index' => 'Member Attendances',
            'create' => 'New Member Attendance',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'member-attendance' => [
        'title' => 'Member Attendances',

        'actions' => [
            'index' => 'Member Attendances',
            'create' => 'New Member Attendance',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'date' => 'Date',
            'clock_in' => 'Clock in',
            'clock_out' => 'Clock out',
            'member_id' => 'Member',

        ],
    ],

    'member-attendance' => [
        'title' => 'Member Attendances',

        'actions' => [
            'index' => 'Member Attendances',
            'create' => 'New Member Attendance',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'member-attendance' => [
        'title' => 'Member Attendances',

        'actions' => [
            'index' => 'Member Attendances',
            'create' => 'New Member Attendance',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'date' => 'Date',
            'clock_in' => 'Clock in',
            'clock_out' => 'Clock out',
            'early' => 'Early',
            'must_cin' => 'Must cin',
            'must_cout' => 'Must cout',
            'att_time' => 'Att time',
            'member_id' => 'Member',

        ],
    ],

    'archive-category' => [
        'title' => 'Archive Categories',

        'actions' => [
            'index' => 'Archive Categories',
            'create' => 'New Archive Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',

        ],
    ],

    'archive-category' => [
        'title' => 'Archive Categories',

        'actions' => [
            'index' => 'Archive Categories',
            'create' => 'New Archive Category',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',

        ],
    ],

    'archive-subcategory' => [
        'title' => 'Archive Subcategories',

        'actions' => [
            'index' => 'Archive Subcategories',
            'create' => 'New Archive Subcategory',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'archive_category_id' => 'Archive category',

        ],
    ],

    'archive' => [
        'title' => 'Archives',

        'actions' => [
            'index' => 'Archives',
            'create' => 'New Archive',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'body' => 'Body',
            'archive_subcategory_id' => 'Archive subcategory',
            'enabled' => 'Enabled',
            'public' => 'Public',

        ],
    ],

    'archive-category' => [
        'title' => 'Archive Categories',

        'actions' => [
            'index' => 'Archive Categories',
            'create' => 'New Archive Category',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',

        ],
    ],

    'archive-subcategory' => [
        'title' => 'Archive Subcategories',

        'actions' => [
            'index' => 'Archive Subcategories',
            'create' => 'New Archive Subcategory',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'archive_category_id' => 'Archive category',

        ],
    ],

    'archive' => [
        'title' => 'Archives',

        'actions' => [
            'index' => 'Archives',
            'create' => 'New Archive',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'body' => 'Body',
            'archive_subcategory_id' => 'Archive subcategory',
            'enabled' => 'Enabled',
            'public' => 'Public',

        ],
    ],

    'archive-category' => [
        'title' => 'Archive Categories',

        'actions' => [
            'index' => 'Archive Categories',
            'create' => 'New Archive Category',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',

        ],
    ],

    'archive-subcategory' => [
        'title' => 'Archive Subcategories',

        'actions' => [
            'index' => 'Archive Subcategories',
            'create' => 'New Archive Subcategory',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'archive_category_id' => 'Archive category',

        ],
    ],

    'archive' => [
        'title' => 'Archives',

        'actions' => [
            'index' => 'Archives',
            'create' => 'New Archive',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'archive_subcategory_id' => 'Archive subcategory',
            'enabled' => 'Enabled',
            'public' => 'Public',

        ],
    ],

    'activity' => [
        'title' => 'Activities',

        'actions' => [
            'index' => 'Activities',
            'create' => 'New Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'body' => 'Body',
            'link' => 'Link',
            'fullWidth' => 'FullWidth',
            'enabled' => 'Enabled',
            
        ],
    ],

    'sub-activity' => [
        'title' => 'Sub Activities',

        'actions' => [
            'index' => 'Sub Activities',
            'create' => 'New Sub Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activity_id' => 'Activity',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'body' => 'Body',
            'link' => 'Link',
            'enabled' => 'Enabled',
            
        ],
    ],

    'activity' => [
        'title' => 'Activities',

        'actions' => [
            'index' => 'Activities',
            'create' => 'New Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'activity' => [
        'title' => 'Activities',

        'actions' => [
            'index' => 'Activities',
            'create' => 'New Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'body' => 'Body',
            'link' => 'Link',
            'fullWidth' => 'FullWidth',
            'enabled' => 'Enabled',
            
        ],
    ],

    'activity' => [
        'title' => 'Activities',

        'actions' => [
            'index' => 'Activities',
            'create' => 'New Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'activity' => [
        'title' => 'Activities',

        'actions' => [
            'index' => 'Activities',
            'create' => 'New Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'body' => 'Body',
            'link' => 'Link',
            'fullWidth' => 'FullWidth',
            'enabled' => 'Enabled',
            'textTop' => 'TextTop',
            'textDark' => 'TextDark',
            
        ],
    ],

    'sub-activity' => [
        'title' => 'Subactivities',

        'actions' => [
            'index' => 'Subactivities',
            'create' => 'New Subactivity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'sub-activity' => [
        'title' => 'Sub Activities',

        'actions' => [
            'index' => 'Sub Activities',
            'create' => 'New Sub Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'activity_id' => 'Activity',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'body' => 'Body',
            'link' => 'Link',
            'fullWidth' => 'FullWidth',
            'enabled' => 'Enabled',
            'textTop' => 'TextTop',
            'textDark' => 'TextDark',
            
        ],
    ],

    'activity' => [
        'title' => 'Activities',

        'actions' => [
            'index' => 'Activities',
            'create' => 'New Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'activity' => [
        'title' => 'Activities',

        'actions' => [
            'index' => 'Activities',
            'create' => 'New Activity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'body' => 'Body',
            'sortNumber' => 'SortNumber',
            'link' => 'Link',
            'fullWidth' => 'FullWidth',
            'enabled' => 'Enabled',
            'textTop' => 'TextTop',
            'textDark' => 'TextDark',
            
        ],
    ],

    'branch' => [
        'title' => 'Branches',

        'actions' => [
            'index' => 'Branches',
            'create' => 'New Branch',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'branch' => [
        'title' => 'Branches',

        'actions' => [
            'index' => 'Branches',
            'create' => 'New Branch',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            
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

    'restaurant' => [
        'title' => 'Restaurants',

        'actions' => [
            'index' => 'Restaurants',
            'create' => 'New Restaurant',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'restaurant' => [
        'title' => 'Restaurants',

        'actions' => [
            'index' => 'Restaurants',
            'create' => 'New Restaurant',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'sub_title' => 'Sub title',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'phone_number' => 'Phone number',
            'alternate_phone_number' => 'Alternate phone number',
            'link' => 'Link',
            'email' => 'Email',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'youtube' => 'Youtube',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'monday_open_time' => 'Monday open time',
            'monday_close_time' => 'Monday close time',
            'tuesday_open_time' => 'Tuesday open time',
            'tuesday_close_time' => 'Tuesday close time',
            'wednesday_open_time' => 'Wednesday open time',
            'wednesday_close_time' => 'Wednesday close time',
            'thursday_open_time' => 'Thursday open time',
            'thursday_close_time' => 'Thursday close time',
            'friday_open_time' => 'Friday open time',
            'friday_close_time' => 'Friday close time',
            'saturday_open_time' => 'Saturday open time',
            'saturday_close_time' => 'Saturday close time',
            'sunday_open_time' => 'Sunday open time',
            'sunday_close_time' => 'Sunday close time',
            
        ],
    ],

    'restaurant' => [
        'title' => 'Restaurant',

        'actions' => [
            'index' => 'Restaurant',
            'create' => 'New Restaurant',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'restaurant' => [
        'title' => 'Restaurants',

        'actions' => [
            'index' => 'Restaurants',
            'create' => 'New Restaurant',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];