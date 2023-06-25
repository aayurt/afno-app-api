@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.member-category.actions.edit', ['name' => $memberCategory->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <member-category-form
                :action="'{{ $memberCategory->resource_url }}'"
                :data="{{ $memberCategory->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.member-category.actions.edit', ['name' => $memberCategory->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.member-category.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </member-category-form>

        </div>
    
</div>

@endsection