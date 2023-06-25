@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.affiliated-category.actions.edit', ['name' => $affiliatedCategory->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <affiliated-category-form
                :action="'{{ $affiliatedCategory->resource_url }}'"
                :data="{{ $affiliatedCategory->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.affiliated-category.actions.edit', ['name' => $affiliatedCategory->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.affiliated-category.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </affiliated-category-form>

        </div>
    
</div>

@endsection