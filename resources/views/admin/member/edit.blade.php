@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.member.actions.edit', ['name' => $member->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <member-form
                :action="'{{ $member->resource_url }}'"
                :data="{{ $member->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :memberCategories="{{$memberCategories->toJson()}}" 

                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.member.actions.edit', ['name' => $member->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.member.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </member-form>

        </div>
    
</div>

@endsection