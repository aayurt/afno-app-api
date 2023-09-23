<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/authors') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.author.title') }}</a></li>
           <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/sub-categories') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.sub-category.title') }}</a></li> -->
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/posts') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.post.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tags') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.tag.title') }}</a></li>
           <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/ads') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.ad.title') }}</a></li> -->
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/members') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.member.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/lineages') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.lineage.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/member-categories') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.member-category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/affiliated-groups') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.affiliated-group.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/affiliated-categories') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.affiliated-category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/students') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.student.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/student-classes') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.student-class.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/student-types') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.student-type.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/board-members') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.board-member.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/join-leave-student-histories') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.join-leave-student-history.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/join-leave-member-histories') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.join-leave-member-history.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/member-attendances') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.member-attendance.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/archive-categories') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.archive-category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/archive-subcategories') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.archive-subcategory.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/archives') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.archive.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
