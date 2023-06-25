@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.affiliated-group.actions.edit', ['name' => $affiliatedGroup->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <affiliated-group-form
                :action="'{{ $affiliatedGroup->resource_url }}'"
                :data="{{ $affiliatedGroup->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
            :affiliatedCategories="{{$affiliatedCategories->toJson()}}" 

                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.affiliated-group.actions.edit', ['name' => $affiliatedGroup->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.affiliated-group.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </affiliated-group-form>

        </div>
    
</div>

@endsection